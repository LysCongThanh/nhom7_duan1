<?php 

class DropZoneModel extends Model
{
    private $_table = 'images';
    private $_field = '*';
    public function tableFill()
    {
        return 'images';
    }

    public function fieldFill()
    {
        return '*';
    }

    public function primaryKey()
    {
        return 'id';
    }

    public function insertImages($data)
    {
        $this->db->table('images')->insert($data);
    }

    public function getListImages()
    {
        $data = $this->db->select($this->_field)
                         ->table($this->_table)
                         ->where('image_main', '=', 0)
                         ->get();
    
        $result = array();
        foreach ($data as $item) {
            $id_book = $item['book_id'];
            if (!isset($result[$id_book])) {
                $result[$id_book] = array();
            }
            $result[$id_book][] = $item;
        }
    
        return $result;
    }

    public function getImageDetail($id) {
        $data = $this->db->select($this->_field)
                         ->table($this->_table)
                         ->where('book_id', '=', $id)
                         ->first();

        return $data;
    }

    public function getAlbumImagesDetail($id) {
        $data = $this->db->select($this->_field)
                         ->table($this->_table)
                         ->where('book_id', '=', $id)
                         ->where('image_main', '=', 0)
                         ->get();
        return $data;
    }
}

?>