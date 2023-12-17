<?php
//Users Controller
class UsersController extends Controller{
    public $data = [], $model = [], $users, $orders, $comments, $addresses, $contacts;

    public function __construct(){
        $this->users = $this->model('UsersModel');
        $this->addresses = $this->model('AddressesModel');
        $this->contacts = $this->model('ContactsModel');
    }
    
    public function get_user()
    {
        $this->data['msg'] = Session::flash('msg');
        $this->data['sub_content']['old'] = Session::flash('old');
        $this->data['sub_content']['script_src'] = 'add-books';
        $this->data['sub_content']['action'] = 'users/post_user';
        $this->data['sub_content']['title'] = 'Thêm Người Dùng';
        $this->data['content'] = 'admin/users/add';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function post_user()
    {
        $request = new Request();
        if ($request->isPost()) {
            $request->rules([
                'email' => 'unique:users:email'
            ]);

            $request->messages([
                'email.unique' => 'Email đã tồn tại'
            ]);
            
            $validate = $request->validate();
            
            if (!$validate) {
                Session::flash('msg', 'Đã có lỗi xảy ra vui lòng kiểm tra lại');
                Session::flash('errors', $request->errors());
                Session::flash('old', $request->getFields());
              
                $response  = new Response();
                $response->redirect('them-nguoi-dung');
            }
          
            $data = $request->getFields();
            $data['name'] =  $data['first_name'] . ' ' .  $data['last_name'];
            $convertedData = array(
                'name' => $data['name'],
                'email' => $data['email'],
                'role' => $data['role'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT)
            );

            $result = $this->users->insertUser($convertedData); 

            if (!$result) {
                Session::flash('msg', 'Thêm người dùng thành công');
                $response  = new Response();
                $response->redirect('danh-sach-nguoi-dung');
                
            }
        }
    }


    public function profile()
    {
        $request = new Request();
        $id = Session::data('user')['id'];
        $this->data['msg'] = Session::flash('msg');
        $this->data['sub_content']['old'] = Session::flash('old');
        if($this->users->findUser('password', Session::data('user')['password'])) 
        {
            $this->data['sub_content']['status_password'] = 'Đã có khóa bảo mật';
        } else {
            $this->data['sub_content']['status_password'] = 'Chưa có khóa bảo mật';
        }
        $checkAddress = $this->addresses->getAddresbyId($id);
        
        if (empty($checkAddress)) {
            // The array has values
            $this->data['sub_content']['user'] = $this->users->getDetailUser($id);
        } else {
            // The array is empty or not set
            $this->data['sub_content']['user'] = $this->users->getDetailUserAddress($id);
        }
      
        $this->data['sub_content']['title'] = 'Thông Tin Người Dùng';
        $this->data['sub_content']['action'] = 'thong-tin-nguoi-dung';
        $this->data['content'] = 'admin/users/edit';
        $this->render('layouts/admin_layout', $this->data);
        if ($request->isPost()) {
            $data = $request->getFields();
                $data['name'] =  $data['firstName'] . ' ' .  $data['lastName'];
                $dataUser = array(
                    'name' => "'" . $data['name'] . "'",
                    'sex' => $data['choices-gender'],
                    'email' => $data['email'],
                    'birthdate' => $data['choices-birthdate']??null,
                );
              
                $updateAddress = array(
                    'tel' => $data['phone'],
                    'specific_address' => "'" .$data['location']."'",
                    'user_id' => $id
                );
    
                $checkAddress = $this->addresses->getAddresbyId($id);
    
                if (empty($checkAddress)) {
                    $address = $this->addresses->insertAddress($updateAddress, $id);
                } else {
                    $address = $this->addresses->updateAddress($updateAddress, $id);
                }
                $result = $this->users->updateUser($dataUser, $id); 


                if (!$result) {
                    Session::flash('msg', 'Thay đổi thông tin người dùng thành công!');
                    $response  = new Response();
                    $response->redirect('thong-tin-nguoi-dung');
                    
                }
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
                $response->redirect('thong-tin-nguoi-dung');
            }
        } else {
            Session::flash('msg', 'Mật khẩu không chinh xác!');
            $response  = new Response();
            $response->redirect('thong-tin-nguoi-dung');
        }
    }

    public function list()
    {
        $this->data['sub_content']['script_src'] = 'chart_users';      
        $this->data['sub_content']['users'] = $this->users->getListUsers();
        $this->data['sub_content']['title'] = 'Danh Sách Người Dùng';
        $this->data['content'] = 'admin/users/list';
        $this->render('layouts/admin_layout', $this->data);
    }
    
}
?>