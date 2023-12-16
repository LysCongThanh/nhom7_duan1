<?php

class ProductModel extends Model
{
    private $_table = 'books';
    private $_field = '*';

    function tableFill()
    {
        return 'books';
    }
    function fieldFill()
    {
        return '*';
    }
    function primaryKey()
    {
        return 'id_book';
    }


    public function getList()
    {
        $data = $this->db->query("SELECT $this->_field FROM $this->_table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getLatestId()
    {
        $data = $this->db->table('books')->lastId();
        return $data;
    }

    public function getProductColumn()
    {
        $data = $this->db->select('b.*, i.name as img, c.name as categorie, cm.rating as ratings')
        ->table('books as b')
        ->leftJoin('images as i', 'b.id=i.book_id')
        ->leftJoin('categories as c', 'c.id=b.category_id')
        ->leftJoin('comments as cm', 'cm.book_id=b.id')
        ->groupBy('b.id')
        ->get();
        return $data;
    }

    public function getListProducts()
    {
        $data = $this->db->select('b.*, c.*, MAX(i.name) as image_name, b.id as book_id, c.name as name_category, MAX(i.slug) as image_slug, i.slug as image_slug')
        ->table('books as b')
        ->join('categories as c', 'b.category_id = c.id')
        ->join('authors as a', 'a.id = b.author_id')
        ->join('publishers as p', 'p.id = b.publisher_id')
        ->leftJoin('images as i', 'b.id = i.book_id and i.image_main = 1')
        ->groupBy('b.id', 'c.id', 'a.id', 'p.id', 'c.name')
        ->get();
        return $data;

    }

    // Hiển thị 8 sản phẩm có nhiều lượt xem
    public function listTopView()
    {
        $data = $this->db->select('DISTINCT b.*, b.id as book_id, i.name as image_name, c.* ')
        ->table('books as b')
        ->join('categories as c', 'b.category_id = c.id')
        ->join('authors as a', 'a.id = b.author_id')
        ->join('publishers as p', 'p.id = b.publisher_id')
        ->join('images as i', 'b.id = i.book_id')
        ->orderBy('b.views', 'DESC')
        ->where('i.image_main', '=', 1)
        ->limit(8)
            ->get();
        return $data;
    }

    // Tăng views sản phẩm 
    public function countView($id)
    {
        $data = ["views" => "views + 1"];
        $result = $this->db
            ->table('books')
            ->where('id', '=', $id)
            ->update($data);
        return $result;
    }

    public function categoriesByRating() {
        $data = $this->db->select('
        c.*, c.id as category_id, AVG(co.rating), c.name as category_name
        ')->table('categories as c')
        ->join('books as b', 'b.category_id = c.id')
        ->join('comments as co', 'co.book_id = b.id')
        ->groupBy('c.id')
        ->orderBy('AVG(co.rating)', 'DESC')
        ->limit('5')
        ->get();

        return $data;
    }

    // Hiển thị 8 sản phẩm có phần trăm đánh giá sao cao nhất
    public function topStar()
    {
        $data = $this->db->select('b.*, b.id as book_id, i.name as image_name, ROUND(AVG(co.rating), 1) / 5 * 100 as percent_rating, COUNT(co.book_id) AS total_reviews, i.slug as image_slug')
        ->table('books as b')
        ->join('categories as c', 'b.category_id = c.id')
        ->join('authors as a', 'a.id = b.author_id')
        ->join('publishers as p', 'p.id = b.publisher_id')
        ->join('images as i', 'b.id = i.book_id and i.image_main = 1')
        ->leftJoin('comments as co', 'b.id = co.book_id')
        ->groupBy('b.id, i.name')
        ->orderBy('percent_rating', 'DESC')
        ->limit(8)
        ->get();

        return $data;
    }

    // hiển thị 5 sản phẩm giảm giá
    public function topDiscount()
    {
        $data = $this->db->select('b.*, b.id as book_id, i.name as image_name, (b.price * (1 - b.discount_price)) as discount_money, (discount_price * 100) AS discount')
        ->table('books as b')
        ->join('categories as c', 'b.category_id = c.id')
        ->join('authors as a', 'a.id = b.author_id')
        ->join('publishers as p', 'p.id = b.publisher_id')
        ->join('images as i', 'b.id = i.book_id and i.image_main = 1')
        ->orderBy('discount', 'DESC')
        ->where('b.discount_price','>', 0)
        ->limit(5)
        ->get();

        return $data;
    }
    // discount_money = tiền giảm giá, discount = giảm giá


    

    public function getListProductsCategories($id)
    {
        $data = $this->db->select($this->_field)->table('books as b')->join('categories as c', 'b.id_category = c.id_category')->where('b.id_category', '=', $id)->get();
        return $data;
    }

    public function getDetailProduct($id)
    {
        $data = $this->db->select('
        b.*, b.created_at as book_created_at, b.id as book_id, 
        b.id as book_id, i.name as image_name, i.slug as image_slug,
        c.*, c.name as category_name,
        p.*, p.name as publisher_name,
        a.*, a.name as author_name 
        ')
        ->table('books as b')
        ->join('categories as c', 'b.category_id = c.id')
        ->join('authors as a', 'a.id = b.author_id')
        ->join('publishers as p', 'p.id = b.publisher_id')
        ->leftjoin('images as i', 'b.id = i.book_id')
        ->where('b.id', '=', $id)
        ->first();

        return $data;
    }

    public function insertProduct($data)
    {
        $this->db->table('books')->insert($data);
    }

    public function updateProduct($data, $id)
    {
        $this->db->table('books')->where('id', '=', $id)->update($data);
    }

    public function deleteProduct($id)
    {
        $this->db->table('books')->where('id', '=', $id)->delete();
    }
    public function count()
    {
        $data = $this->db->select('COUNT(id) As soLuong')->table('products')->get();
        return $data;
    }

    //Top Sản Phẩm Bán Chạy
    public function best_saler(){
        $data = $this->db->select('b.id, b.book_name as name, b.views as view,cm.rating as comment, SUM(od.quantity) as total')
        ->table('orders_detail as od')
        ->join('books as b', 'b.id=od.book_id')
        ->join('comments as cm', 'cm.book_id=b.id')
        ->groupBy('b.id')
        ->limit(5)->get();
        return $data;
    }

    //Tìm kiếm sản phầm theo tên
    public function searchProduct($name)
    {
        $data = $this->db->select('COUNT(b.id) as quantityFound,b.id as id, b.book_name as name, b.price as price, c.name as categorie, i.name as images')
            ->table('books as b')
            ->join('categories as c', 'c.id=b.category_id ')
            ->join('images as i', 'i.book_id=b.id')
            ->whereLike('b.book_name', $name)
            ->groupBy('b.id')
            ->get();
        return $data;
    }

    //Lấy giá cao nhất và thấp nhất
    public function getPrice()
    {
        $data = $this->db->select('MIN(b.price) as min, MAX(b.price) as max')
            ->table('books as b')
            ->first();
        return $data;
    }


    //Lọc sản phẩm
    public function filterBooks($queryParams)
    {
        $query = $this->db->select('b.*, i.name as img, c.name as categorie, cm.rating as ratings')
            ->table('books as b')
            ->leftJoin('categories as c', 'b.category_id = c.id')
            ->leftJoin('images as i', 'i.book_id = b.id')
            ->leftJoin('comments as cm', 'cm.book_id = b.id')
            ->groupBy('b.id');
        // Xử lý lọc theo danh mục
        if (isset($queryParams['id_category'])) {
            $query->where('b.category_id', '=', $queryParams['id_category']);
        }

        // Xử lý lọc theo NXB
        if (isset($queryParams['id_publisher'])) {
            $query->join('publishers as p', 'b.publisher_id = p.id')
                ->where('b.publisher_id', '=', $queryParams['id_publisher']);
        }

        // Xử lý lọc theo tác giả
        if (isset($queryParams['id_author'])) {
            $query->join('authors as a', 'b.author_id = a.id')
                ->where('b.author_id', '=', $queryParams['id_author']);
        }

        // Xử lý lọc theo giá
        if (isset($queryParams['min']) && $queryParams['min'] !== "") {
            $query->where('b.price', '>=', $queryParams['min']);
        }

        if (isset($queryParams['max']) && $queryParams['max'] !== "") {
            $query->where('b.price', '<=', $queryParams['max']);
        }

        // Thực hiện truy vấn và trả về kết quả
        $data = $query->get();
        return $data;
    }
}
