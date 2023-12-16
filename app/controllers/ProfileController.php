<?php
//ProfilesController Controller
class ProfileController extends Controller
{
    public $data = [], $model = [], $wishlist, $users, $addresses, $orders, $payments;

    public function __construct(){
        //construct
        $this->users = $this->model('UsersModel');
        $this->wishlist = $this->model('WishListModel');
        $this->addresses = $this->model('AddressesModel');
        $this->orders = $this->model('OrdersModel');
        $this->payments = $this->model('PaymentsModel');

    }

    public function uploadAvatar($data)
    {
        $response = new Response();
        $file = $data['image'];
        $target_directory = 'public/uploads/avatars/';

        if (!is_dir($target_directory)) {
            try {
                mkdir($target_directory, 0755, true);
            } catch (\Exception $e) {
                Session::flash('errors', 'Tải lên không thành công');
            }
        }

        $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $new_file_name = time() . '_' . uniqid() . '.' . $file_extension;
        $new_file_path = $target_directory . $new_file_name;

        while (file_exists($new_file_path)) {
            $new_file_name = time() . '_' . uniqid() . '.' . $file_extension;
            $new_file_path = $target_directory . $new_file_name;
        }

        if (!move_uploaded_file($file['tmp_name'], $new_file_path)) {
            Session::flash('errors', 'Tải lên không thành công');
        }


        return $new_file_path;
    }

    public function updateProfile()
    {
        $id = Session::data('user')['id'];
        $request = new Request();
        if ($request->isPost()) {
            $data = $request->getFields();
            $checkImage = $this->users->getProfile($id);
            $updateSlug = $this->uploadAvatar($data);
            $updateUser = array(
                'name' => "'" . $data['name'] . "'",
                'email' => $data['email'],
                'sex' => $data['sex'],
                'birthdate' => $data['birthdate'],
                'avatar' => $updateSlug
            );

            if ($data['image']['name'] === '') {
                $updateUser['avatar'] = $checkImage['avatar'];
            }


            $updateAddress = array(
                'address' => $data['address'],
                'tel' => $data['tel'],
                'specific_address' => $data['specific_address'],
                'zip_code' => $data['zip_code'],
                'user_id' => $id
            );

            $user = $this->users->updateUser($updateUser, $id);
            $checkAddress = $this->addresses->getAddresbyId($id);

            if (empty($checkAddress)) {
                $address = $this->addresses->insertAddress($updateAddress, $id);
            } else {
                $address = $this->addresses->updateAddress($updateAddress, $id);
            }
            Session::flash('msg', 'Thay đổi thông tin người dùng thành công!');
            $response  = new Response();
            $response->redirect('cai-dat');
        }
    }

    public function updatePassword()
    {
        $id = Session::data('user')['id'];
        $request = new Request();
        $data = $request->getFields();
        $dataPassword = [
            'password' => password_hash($data['new_password'], PASSWORD_BCRYPT),
        ];
        $password = $this->users->findUserById($id);
        if (password_verify($data['old_password'], $password['password'])) {
            $result = $this->users->updateUser($dataPassword, $id);
            if (!$result) {
                Session::flash('msg', 'Thay đổi thông tin người dùng thành công!');
                $response  = new Response();
                $response->redirect('cai-dat');
            }
        } else {
            Session::flash('msg', 'Mật khẩu không chinh xác!');
            $response  = new Response();
            $response->redirect('cai-dat');
        }
    }


    public function main()
    {
        $id = Session::data('user')['id'];
        $checkAddress = $this->addresses->getAddresbyId($id);
        if (empty($checkAddress)) {
            // The array has values
            $this->data['sub_content']['pf'] = $this->users->showProfile($id);
        } else {
            // The array is empty or not set
            $this->data['sub_content']['pf'] = $this->users->getProfile($id);
        }

        $this->data['content'] = 'client/profile/profile_main';
        $this->render('layouts/client_layout', $this->data);
    }
    // Show đơn hàng
    public function showAllOrder()
    {
        $id = Session::data('user')['id'];
        $showAll = array();
        $result = $this->users->showAll($id);
        foreach ($result as $row) {
            $showAll[] = array(
                'book_name' => $row['book_name'] ?? null,
                'slug' => $row['slug'] ?? null,
                'order_date' => $row['order_date'] ?? null,
                'order_id' => $row['order_id'] ?? null,
                'order_status' => $row['order_status'] ?? null,
                'quantity_product' => $row['quantity_product'] ?? null,
                'user_id' => $row['user_id'] ?? null,
            );
        }

        $output = array(
            'viewAll' => $showAll
        );
        echo json_encode($output);
    }

    public function address(){
        $id = Session::data('user')['id'];
        $this->data['sub_content']['data'] = $this->addresses->getListAddresses($id);
        $this->data['content'] = 'client/profile/profile_address';
        $this->render('layouts/client_layout', $this->data);
    }

    public function addAddress()
    {
        $request = new Request();
        $data = $request->getFields();
        $address = $data['wards'] . ', ' . $data['district'] . ', ' . $data['city'];
        $id = Session::data('user')['id'];
        if ($request->isPost()) {
            $dataAddress = [
                'address' => $address,
                'specific_address' => $data['address'],
                'tel' => $data['number_phone'],
                'zip_code' => $data['zip_code'],
                'user_id' => $id
            ];

            $result = $this->addresses->insertAddress($dataAddress, $id);

            if (!$result) {
                $response  = new Response();
                $response->redirect('dia-chi');

            }
        }

    }

    public function updateAddress()
    {
        $request = new Request();
        $id = $_GET['id'];
        $data = $request->getFields();
        $address = "'" . $data['wards'] . ', ' . $data['district'] . ', ' . $data['city'] . "'";
        $id_user = Session::data('user')['id'];
        if ($request->isPost()) {
            $convertedData = array(
                'address' => $address,
                'specific_address' =>  "'" . $data['address']  . "'",
                'tel' => $data['number_phone'],
                'zip_code' => $data['zip_code'],
                'user_id' => $id_user
            );

            $result = $this->addresses->updateAddress($convertedData, $id);

            if (!$result) {
                Session::flash('msg', 'Sửa sản địa chỉ thành công');
                $response = new Response();
                $response->redirect('dia-chi');
            }
        } else {
            Session::flash('msg', 'Sửa sản địa chỉ không thành công');
            $response = new Response();
            $response->redirect('dia-chi');
        }
    }

    public function deleteAddress()
    {
        $response = new Response();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->addresses->deleteAddress($id);
            $responseData = [
                'success' => true,
                'message' => 'Xóa địa chỉ thành công',
                'id' => $id
            ];
            $response->setStatusCode(200);
            $response->send(json_encode($responseData));
        } else {
            // Trả về phản hồi lỗi nếu không có id
            $responseData = [
                'success' => false,
                'message' => 'Không tìm thấy địa chỉ'
            ];
            $response->setStatusCode(400);
            $response->send(json_encode($responseData));
        }
    }

    public function setting()
    {
        $id = Session::data('user')['id'];
        $checkAddress = $this->addresses->getAddresbyId($id);

        if (empty($checkAddress)) {
            // The array has values
            $this->data['sub_content']['pf'] = $this->users->showProfile($id);
        } else {
            // The array is empty or not set
            $this->data['sub_content']['pf'] = $this->users->getProfile($id);
        }

        $this->data['content'] = 'client/profile/profile_setting';
        $this->render('layouts/client_layout', $this->data);
    }

    public function orders(){
       if(isset($_GET['id'])) {
            $this->data['sub_content']['order'] = $this->orders->getOrderById($_GET['id']);
       } else {
            $this->data['sub_content']['order'] = $this->orders->getOrdersNew();
       }
        $this->data['sub_content']['orders'] = $this->orders->getOrders();
        $this->data['content'] = 'client/profile/profile_order';
        $this->render('layouts/client_layout', $this->data);
    }

    public function deleteOrder(){
        $id = $_GET['id'];
        $this->payments->deletePayment($id);
        $this->orders->deleteOrder($id);
        $response = new Response();
        $response->redirect('don-hang');
     }

    public function wishlist(){
        $id = Session::data('user');
        $this->data['sub_content']['data'] = $this->wishlist->getListWishList($id['id']);
        $this->data['content'] = 'client/profile/profile_wishlist';
        $this->render('layouts/client_layout', $this->data);
    }

    public function deleteWishList()
    {
        $response = new Response();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->wishlist->deleteWishList($id);
            $responseData = [
                'success' => true,
                'message' => 'Xóa sản phẩm thành công',
                'productId' => $id
            ];
            $response->setStatusCode(200);
            $response->send(json_encode($responseData));
        } else {
            // Trả về phản hồi lỗi nếu không có id
            $responseData = [
                'success' => false,
                'message' => 'Không tìm thấy sản phẩm'
            ];
            $response->setStatusCode(400);
            $response->send(json_encode($responseData));
        }
    }


}
