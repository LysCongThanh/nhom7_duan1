<?php 
//CommentsController Controller
class CommentsController extends Controller{
    
    public $data = [], $model = [], $comments;
    
    public function __construct(){
         $this->comments = $this->model('CommentsModel');
    }
    
    public function index(){
        //Index
    }

    public function list()
    {
        $this->data['sub_content']['comments'] = $this->comments->getListComments();
        $this->data['sub_content']['title'] = 'Danh Sách Bình Luận';
        $this->data['content'] = 'admin/comments/list';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function replyComment()
    {

        $request = new Request();
        if ($request->isPost()) {

            $data = $request->getFields();
            $replyData = array(
                'reply_id' => $data['parent_id'],
                'user_id' => $data['user_id'],
                'book_id' => $data['book_id'],
                'content' => $data['content'],
            );

            $result = $this->comments->insertComment($replyData);

            if (!$result) {
                Session::flash('msg', 'Trả lời bình luận thành công');
                $response  = new Response();
                $response->redirect('danh-sach-binh-luan');
            }
        }
    }

    public function insertComment()
    {
        $request = new Request();
        if ($request->isPost()) {
            $data = $request->getFields();
            $insertData = array(
                'user_id' => $data['user'],
                'book_id' => $data['pds'],
                'rating' => $data['rating_data'],
                'content' => $data['content'],
            );

            $result = $this->comments->insertComment($insertData);

            if (!$result) {
                Session::flash('msg', 'Thêm bình luận thành công');
            }
            $response  = new Response();
            $response->redirect('chi-tiet-san-pham');
        }
    }

    public function load_Rating()
    {
        $request = new Request();
        if ($request->isPost()) {
            $data = $request->getFields();
            if (isset($data['action']) && $data['action'] == 'load_data') {
                $average_rating = 0;
                $total_review = 0;
                $five_star_review = 0;
                $four_star_review = 0;
                $three_star_review = 0;
                $two_star_review = 0;
                $one_star_review = 0;
                $total_rating = 0;
                $review_content = array();
            }
            $product_id = $data['product_id'];
            $result = $this->comments->rating($product_id);

            foreach ($result as $row) {
                $review_content[] = array(
                    'user_id' => $row['user_id'],
                    'book_id' => $row['book_id'],
                    'rating' => $row['rating'],
                    'created_at' => $row['created_at']
                );

                switch ($row["rating"]) {
                    case '5':
                        $five_star_review++;
                        break;
                    case '4':
                        $four_star_review++;
                        break;
                    case '3':
                        $three_star_review++;
                        break;
                    case '2':
                        $two_star_review++;
                        break;
                    case '1':
                        $one_star_review++;
                        break;
                    }

                $total_review++;
                $total_rating += $row['rating'];
            }

            $average_rating = ($total_review > 0) ? ($total_rating / $total_review) : 0;

            $output = array(
                'average_rating' => number_format($average_rating, 1),
                'total_review' => $total_review,
                'five_star_review' => $five_star_review,
                'four_star_review' => $four_star_review,
                'three_star_review' => $three_star_review,
                'two_star_review' => $two_star_review,
                'one_star_review' => $one_star_review,
                'review_data' => $review_content
            );
            echo json_encode($output);
        }
    }
    

    public function delete()
    {
        $request = new Request();
        $id = $request->getFields();
        $this->comments->deleteComment($id['id']);
        $response  = new Response();
        $response->redirect('danh-sach-binh-luan');
    }
}