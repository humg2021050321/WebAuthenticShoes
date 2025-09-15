<?php
// controllers/BinhLuanController.php

class BinhLuanController {

    // Hàm hiển thị danh sách bình luận
    public function index() {
        // Giả sử bạn có một mô hình bình luận (CommentModel) để lấy dữ liệu từ cơ sở dữ liệu
        // $comments = CommentModel::getAllComments();

        // Đây chỉ là ví dụ, bạn có thể thay thế bằng cách lấy dữ liệu thực tế từ cơ sở dữ liệu
        $comments = [
            ['id' => 1, 'content' => 'Bình luận đầu tiên', 'author' => 'Người dùng 1'],
            ['id' => 2, 'content' => 'Bình luận thứ hai', 'author' => 'Người dùng 2'],
        ];

        // Trả về dữ liệu hoặc hiển thị nó
        include 'views/binhluan/index.php';
    }

    // Hàm thêm mới bình luận
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $content = $_POST['content'];
            $author = $_POST['author'];

            // Giả sử có một mô hình để thêm bình luận
            // CommentModel::addComment($content, $author);

            // Redirect hoặc trả về thông báo thành công
            echo "Bình luận đã được thêm!";
        } else {
            // Hiển thị form tạo bình luận
            include 'views/binhluan/create.php';
        }
    }

    // Hàm xóa bình luận
    public function delete($id) {
        // Giả sử có một mô hình để xóa bình luận
        // CommentModel::deleteComment($id);

        // Redirect hoặc thông báo thành công
        echo "Bình luận đã được xóa!";
    }
}
