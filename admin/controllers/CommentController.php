<?php
require_once '../models/CommentModel.php';

class CommentController {
    private $commentModel;

    public function __construct($db) {
        $this->commentModel = new CommentModel($db);
    }

    public function addComment($postId, $userName, $content) {
        return $this->commentModel->addComment($postId, $userName, $content);
    }

    public function getComments($postId) {
        return $this->commentModel->getCommentsByPostId($postId);
    }
}
?>
