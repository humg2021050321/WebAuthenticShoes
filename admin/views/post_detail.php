<form action="add_comment.php" method="POST">
    <input type="hidden" name="post_id" value="<?php echo $postId; ?>">
    <input type="text" name="user_name" placeholder="Your Name" required>
    <textarea name="content" placeholder="Write your comment..." required></textarea>
    <button type="submit">Post Comment</button>
</form>
<?php
$comments = $commentController->getComments($postId);
foreach ($comments as $comment) {
    echo "<div class='comment'>";
    echo "<h4>" . htmlspecialchars($comment['user_name']) . "</h4>";
    echo "<p>" . htmlspecialchars($comment['content']) . "</p>";
    echo "<small>" . htmlspecialchars($comment['created_at']) . "</small>";
    echo "</div>";
}
?>
