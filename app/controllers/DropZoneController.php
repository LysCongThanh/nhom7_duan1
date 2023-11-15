<?php 
class DropZoneController extends Controller
{
    public function upLoadImage() 
    {   $request = new Request();
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
        echo '----' . $file['name'] ;
        $new_file_name = time() . '_' . uniqid() . '.' . $file_extension;
        $new_file_path = $target_directory . $new_file_name;

        while (file_exists($new_file_path)) {
            $new_file_name = time() . '_' . uniqid() . '.' . $file_extension;
            $new_file_path = $target_directory . $new_file_name;
        }

        if (!move_uploaded_file($file['tmp_name'], $new_file_path)) {
           echo 123;
        }

        return $new_file_name;
    }
}

?>