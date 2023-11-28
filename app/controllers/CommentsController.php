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

    public function delete()
    {
        $request = new Request();
        $id = $request->getFields();
        $this->comments->deleteComment($id['id']);
        $response  = new Response();
        $response->redirect('danh-sach-binh-luan');
    }
}