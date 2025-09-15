<?php
require_once 'config/database.php'; // Đảm bảo bạn có tệp này để kết nối DB
require_once 'admin/controllers/CommentController.php'; // Điều chỉnh đường dẫn nếu cần

// Kết nối tới cơ sở dữ liệu
$db = new PDO("mysql:host=localhost;dbname=your_database_name", "username", "password");

// Khởi tạo controller bình luận
$commentController = new CommentController($db);

// Xử lý khi người dùng gửi form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = $_POST['post_id'];
    $userName = $_POST['user_name'];
    $content = $_POST['content'];

    // Thêm bình luận vào cơ sở dữ liệu
    $commentController->addComment($postId, $userName, $content);

    // Chuyển hướng về trang chi tiết bài viết
    header("Location: post_detail.php?post_id=$postId");
    exit();
}
?>
