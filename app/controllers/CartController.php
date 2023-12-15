<?php
//CartController Controller
class CartController extends Controller
{

    public $data = [], $model = [], $cart, $product, $total, $discount_price, $wishlists;

    public function __construct()
    {
        $this->cart = $this->model('CartModel');
        $this->product = $this->model('ProductModel');
        $this->wishlists = $this->model('WishListModel');
    }

    public function index()
    {
        //Index
    }

    public function page()
    {
        $user = Session::data('user');
        if(isset($user)){
            $this->data['sub_content']['cart'] = $this->cart->getCartByUser($user['id']);
        }
        $this->data['sub_content']['title'] = 'Giỏ Hàng';
        $this->data['content'] = 'client/cart/cart';
        $this->render('layouts/client_layout', $this->data);
    }

    public function addCart()
    {
        $id = $_GET['productId'];
        $user = Session::data('user');
        $data = ['user_id' => $user['id'], 'book_id' => $id];
        $getID = $this->cart->listCart($user['id']);
    
        if ($getID != NULL) {
            $bookIdExists = false;
    
            foreach ($getID as $key) {
                if ($key['book_id'] == $id) {
                    $bookIdExists = true;
                    $this->cart->updateCart($key['id']);
                    break;
                }
            }
    
            if (!$bookIdExists) {
                $this->data['sub_content']['cart'] = $this->cart->addCartList($data);
            }
        } else {
            $this->data['sub_content']['cart'] = $this->cart->addCartList($data);
        }
    
        // Trả về phản hồi JSON
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        exit;
    }


    public function deleteCart()
    {
        if (isset($_GET['productId'])) {
            $id = $_GET['productId'];
            $this->data['sub_content'] = $this->cart->remove($id);
            $this->data['sub_content']['title'] = 'Xóa Giỏ Hàng';
            $this->data['content'] = 'client/cart/cart';
            $this->render('layouts/client_layout', $this->data);
        }
    }

    public function updateCart()
    {
        if (isset($_GET['productId'])) {
            $id = $_GET['productId'];
            $this->data['sub_content'] = $this->cart->updateCart($id);
            $this->data['sub_content']['title'] = 'Cập Nhật Giỏ Hàng';
            $this->data['content'] = 'client/cart/cart';
            $this->render('layouts/client_layout', $this->data);
        }
    }

    public function addWishList()
    {
        $data = ['user_id' => Session::data('user')['id'], 'book_id' => $_GET['productId']];
        $result = $this->wishlists->addWishList($data);

        // Trả về phản hồi JSON
        header('Content-Type: application/json');
        echo json_encode(['success' => $result]);
        exit;
    }
}
