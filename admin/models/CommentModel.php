<?php
class CommentModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getCommentsByPostId($postId) {
        $stmt = $this->db->prepare("SELECT * FROM comments WHERE post_id = ? ORDER BY created_at DESC");
        $stmt->execute([$postId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addComment($postId, $userName, $content) {
        $stmt = $this->db->prepare("INSERT INTO comments (post_id, user_name, content) VALUES (?, ?, ?)");
        return $stmt->execute([$postId, $userName, $content]);
    }
}
?>
