<?php 
//ProfilesController Controller
class ProfileController extends Controller{
    
    public $data = [], $model = [], $wishlist, $addresses, $orders, $payments;
    
    public function __construct(){
        //construct
        $this->wishlist = $this->model('WishListModel');
        $this->addresses = $this->model('AddressesModel');
        $this->orders = $this->model('OrdersModel');
        $this->payments = $this->model('PaymentsModel');
    
    }
    public function main(){
        $this->data['content'] = 'client/profile/profile_main';
        $this->data['sub_content']['title'] = 'Hihi';
        $this->render('layouts/client_layout', $this->data);
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
            $result = $this->addresses->deleteAddress($id);
            if($result === true) {
                $responseData = [
                    'success' => false,
                    'message' => 'Xóa địa chỉ không thành công',
                    'id' => $id
                ];
                $response->setStatusCode(400);
                $response->send(json_encode($responseData));
            } else {
                $responseData = [
                    'success' => true,
                    'message' => 'Xóa địa chỉ thành công',
                    'id' => $id
                ];
                $response->setStatusCode(200);
                $response->send(json_encode($responseData));
            }
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
    public function setting(){
        $this->data['sub_content']['title'] = 'Hihi';
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