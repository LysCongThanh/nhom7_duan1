<?php 

class DropZoneController extends Controller
{
    public $response, $products, $images;
    public function __construct()
    {
        $this->response = new Response();
        $this->images = $this->model('DropZoneModel');
        $this->products = $this->model('ProductModel');
    }
    public function upLoadImage() 
    {   
        $request = new Request();
        $data = $request->getFields();
        $file = $data['image'];
        print_r($file);
        $target_file = '';
        $current_month_year     = date('Y_m');
        $target_directory = 'public/uploads/products/' . $current_month_year . '/';

        if (!is_dir($target_directory)) {
            try {
                mkdir($target_directory, 0755, true);
            } catch (\Exception $e) {
                $errors[] = $e->getMessage();
                return false;
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
           $this->response->redirect('them-san-pham');
        }

        $id_product = $this->products->getLatestId();

        if ($id_product) {
            $data = [
                'id_book' => $id_product,
                'name' => $new_file_name,
                'image_main' => 1
            ];
            $this->images->insertImages($data);
        }
        
    }

    public function upLoadImages() 
    {
        $request = new Request();
        $data = $request->getFields();
        $files = $data['album_images']; 
        print_r($data);
        $target_directory = 'public/uploads/products/' . date('Y_m') . '/';
        
        if (!is_dir($target_directory)) {
            try {
                mkdir($target_directory, 0755, true);
            } catch (\Exception $e) {
                $errors[] = $e->getMessage();
                return false;
            }
        }
        
        $uploaded_file_names = []; // Mảng chứa tên các file đã được tải lên
        
        foreach ($files['tmp_name'] as $key => $tmp_name) {
            $file_extension = strtolower(pathinfo($files['name'][$key], PATHINFO_EXTENSION));
            $new_file_name = time() . '_' . uniqid() . '.' . $file_extension;
            $new_file_path = $target_directory . $new_file_name;
            
            while (file_exists($new_file_path)) {
                $new_file_name = time() . '_' . uniqid() . '.' . $file_extension;
                $new_file_path = $target_directory . $new_file_name;
            }
            
            if (!move_uploaded_file($tmp_name, $new_file_path)) {
                Session::flash('errors', 'Tải lên không thành công');
                $this->response->redirect('them-san-pham');
            }
            
            $uploaded_file_names[] = $new_file_name; // Thêm tên file vào mảng uploaded_file_names
        }
      
       
        $id_product = $this->products->getLatestId();
        
        if ($id_product) {
            foreach ($uploaded_file_names as $file_name) {
                $data = [
                    'id_book' => $id_product,
                    'name' => $file_name,
                    'image_main' => 0
                ];
                $this->images->insertImages($data);
            }
        }
    }
}

?>