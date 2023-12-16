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
        if (isset($user)) {
            $this->data['sub_content']['cart'] = $this->cart->getCartByUser($user['id']);
        } else {
            $this->data['sub_content']['cart'] = null;
        }
        Session::data('carts', $this->data['sub_content']['cart']);
        $this->data['sub_content']['title'] = 'Giỏ Hàng';
        $this->data['content'] = 'client/cart/cart';
        $this->render('layouts/client_layout', $this->data);
    }

    public function addCart()
    {
        header('Content-Type: application/json');
        $id = $_GET['productId'];
        if (isset(Session::data('user')['id'])) {
            $user = Session::data('user');
            $data = ['user_id' => $user['id'], 'book_id' => $id];
            $getID = $this->cart->listCart($user['id']);

            if ($getID != NULL) {
                $bookIdExists = false;

                foreach ($getID as $key) {
                    if ($key['book_id'] == $id) {
                        $bookIdExists = true;
                        $this->cart->quantityIncre($key['id']);
                        break;
                    }
                }

                if (!$bookIdExists) {
                    $this->data['sub_content']['cart'] = $this->cart->addCartList($data);
                }
            } else {
                $this->data['sub_content']['cart'] = $this->cart->addCartList($data);
            }

            echo json_encode(['success' => true]);
            exit;
        } else {
            echo json_encode([
                'success' => false
            ]);
        }


    }


    public function deleteCart()
    {
        if (isset($_GET['productId'])) {
            $id = $_GET['productId'];
            $this->cart->remove($id);
            $responseData = [
                'success' => true,
                'message' => 'Xóa sản phẩm khỏi giỏ hàng thành công'
            ];
            $response = new Response();
            $response->setStatusCode(200);
            $response->send(json_encode($responseData));
        } else {
            $responseData = [
                'success' => false,
                'message' => 'Xóa sản phẩm khỏi giỏ hàng không thành công'
            ];
            $response = new Response();
            $response->setStatusCode(200);
            $response->send(json_encode($responseData));
        }
    }

    public function updateCart()
    {

        $request = new Request;
        if ($request->isPost()) {
            $json = file_get_contents("php://input");
            $data = json_decode($json, true);

            $id = $data['id'];

            $this->cart->updateCart($data, $id);
            header('Content-Type: application/json');
        }
    }

    public function addWishList()
    {
        $data = [
            'user_id' => Session::data('user')['id'],
            'book_id' => $_GET['productId']
        ];
        $result = null;
        $id = $_GET['productId'];
        $getID = $this->wishlists->getListWishList($data['user_id']);

        if ($getID != NULL) {
            $wishListIdExits = false;

            foreach ($getID as $key) {
                if ($key['book_id'] == $id) {
                    $wishListIdExits = true;
                    break;
                }
            }

            if (!$wishListIdExits) {
                $result = $this->wishlists->addWishList($data);
            }
        } else {
            $result = $this->wishlists->addWishList($data);
        }
        // Trả về phản hồi JSON
        header('Content-Type: application/json');
        echo json_encode([
            'success' => $result,
            'msg' => $getID
        ]);
        exit;
    }

    public function getSumaryCart()
    {
        header('Content-Type: application/json');

        if (isset(Session::data('user')['id'])) {
            $user_id = Session::data('user')['id'];
            $data = $this->cart->sumary($user_id);
            echo json_encode($data);
        } else {
            echo json_encode([
                'error' => 'error',
            ]);
        }
    }
}
