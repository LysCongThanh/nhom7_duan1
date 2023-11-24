<?php
 class ProductController extends Controller 
 {
    public $products, $authors, $publishers, $categories, $images, $data = [];

    public function __construct()
    {
        $this->products = $this->model('ProductModel');
        $this->categories = $this->model('CategoriesModel');
        $this->authors = $this->model('AuthorsModel');
        $this->publishers = $this->model('PublishersModel');
        $this->images = $this->model('DropZoneModel');
    }

    public function get_product()
    {
        $this->data['sub_content']['categories'] = $this->categories->getList();
        $this->data['sub_content']['publishers'] = $this->publishers->getList();
        $this->data['sub_content']['authors'] = $this->authors->getList();
        $this->data['msg'] = Session::flash('msg');
        $this->data['sub_content']['old'] = Session::flash('old');
        $this->data['sub_content']['script_src'] = 'add-books';
        $this->data['sub_content']['title'] = 'Thêm Sản Phẩm';
        $this->data['content'] = 'admin/products/add';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function post_product()
    {
        $request = new Request();
        if ($request->isPost()) {
            $request->rules([
                'name' => 'unique:books:book_name'
            ]);

            $request->messages([
                'name.unique' => 'Sản phẩm đã có trong cửa hàng'
            ]);
            
            $validate = $request->validate();
            
            if (!$validate) {
                Session::flash('msg', 'Đã có lỗi xảy ra vui lòng kiểm tra lại');
                Session::flash('errors', $request->errors());
                Session::flash('old', $request->getFields());
              
                $response  = new Response();
                $response->redirect('them-san-pham');
            }
          
            $data = $request->getFields();
            $convertedData = array(
                'category_id' => $data['category'],
                'author_id' => $data['author'],
                'publisher_id' => $data['publisher'],
                'book_name' => $data['name'],
                'describe_long' => $data['long-editor'],
                'describe_short' => $data['sort-editor'],
                'quantity_inventory' => $data['quantity'],
                'price' => $data['price'],
                'discount_price' => $data['sale_price'],
                'ISBN' => $data['sku'], 
                'size' => $data['size'],
                'num_page' => $data['number_pages']
            );

            
            $result = $this->products->insertProduct($convertedData);

            if (!$result) {
                Session::data('idLatest_product', $this->products->getLatestId());
                Session::flash('msg', 'Thêm sản phẩm thành công');
                $response  = new Response();
                $response->redirect('danh-sach-san-pham');
            }
        }
    }

    public function update()
    {
        $request = new Request();

        $id = $request->getFields();
        $id = $id['id'];
      
        $this->data['sub_content']['action'] = "sua-san-pham?id=$id";
        $this->data['sub_content']['script_src'] = 'book-edit';
        $this->data['sub_content']['product'] = $this->products->getDetailProduct($id);
        $this->data['sub_content']['images'] = $this->images->getListImages();
        $this->data['sub_content']['categories'] = $this->categories->getList();
        $this->data['sub_content']['authors'] = $this->authors->getList();
        $this->data['sub_content']['publishers'] = $this->publishers->getList();
        $this->data['sub_content']['title'] = 'Sửa Sản Phẩm';
        $this->data['content'] = 'admin/products/edit';
        $this->render('layouts/admin_layout', $this->data);
        if ($request->isPost()) {
            $request->rules([
                'name' => 'unique:books:name_book'
            ]);

            $request->messages([
                'name.unique' => 'Sản phẩm đã có trong cửa hàng'
            ]);
            
            $validate = $request->validate();
            
            if (!$validate) {
                Session::flash('msg', 'Đã có lỗi xảy ra vui lòng kiểm tra lại');
                Session::flash('errors', $request->errors());
                Session::flash('old', $request->getFields());
              
                $response  = new Response();
                $response->redirect('them-san-pham');
            }
          
            $data = $request->getFields();
            $convertedData = array(
                'id_category' => $data['category'],
                'id_author' => $data['author'],
                'id_publisher' => $data['publisher'],
                'book_name' => $data['name'],
                'describe_long' => $data['long-editor'],
                'describe_short' => $data['sort-editor'],
                'quantity_inventory' => $data['quantity'],
                'price' => $data['price'],
                'discount_price' => $data['sale_price'],
                'publication_date' => $data['date_publication'],
                'ISBN' => $data['sku'], 
                'size' => $data['size'],
                'num_page' => $data['number_pages']
            );

            $result = $this->products->updateProduct($convertedData, $id); 

            if (!$result) {
                Session::flash('msg', 'Sửa sản phẩm thành công');
                $response  = new Response();
                $response->redirect('danh-sach-san-pham');
                
            }
        }
    }

    public function list()
    {
        $this->data['sub_content']['products'] = $this->products->getListProducts();
        $this->data['sub_content']['images'] = $this->images->getListImages();
        $this->data['sub_content']['script_src'] = 'products_list';
        $this->data['sub_content']['title'] = 'Danh Sách Sản Phẩm';
        $this->data['content'] = 'admin/products/list';
        $this->data['sub_content']['action'] = 'danh-sach-san-pham';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function delete()
    {  
        $request = new Request();
        $id = $request->getFields();
        $product = $this->model('ProductModel');
        $product->deleteProduct($id['id']);
        $response  = new Response();
        $response->redirect('danh-sach-san-pham');
    }

    public function detail()
    {  
        $request = new Request();
        $id = $request->getFields();
        $product = $this->model('ProductModel');
        $product->deleteProduct($id['id']);
        $response  = new Response();
        $response->redirect('danh-sach-san-pham');
    }
 }

?>