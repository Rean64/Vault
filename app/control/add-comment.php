<?php
header('Content-Type: application/json');
require_once "config.php";

// Basic validation
if (empty($_POST['article_id']) || empty($_POST['author']) || empty($_POST['comment'])) {
    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    exit;
}

$article_id = filter_input(INPUT_POST, 'article_id', FILTER_VALIDATE_INT);
$parent_id = filter_input(INPUT_POST, 'parent_id', FILTER_VALIDATE_INT, ['options' => ['default' => 0]]);
$author = htmlspecialchars($_POST['author']);
$comment_text = htmlspecialchars($_POST['comment']);

if (!$article_id) {
    echo json_encode(['success' => false, 'message' => 'Invalid article ID.']);
    exit;
}

// Assuming you have a 'comments' table.
// You may need to create it with:
// CREATE TABLE comments (
//   id INT AUTO_INCREMENT PRIMARY KEY,
//   article_id INT NOT NULL,
//   parent_id INT DEFAULT 0,
//   author VARCHAR(255) NOT NULL,
//   comment TEXT NOT NULL,
//   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// );
$sql = "INSERT INTO comments (article_id, parent_id, author, comment) VALUES (?, ?, ?, ?)";

if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, "iiss", $article_id, $parent_id, $author, $comment_text);
    
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['success' => true, 'message' => 'Comment added successfully.']);
    } else {
        // Log error instead of exposing it
        error_log("DB Error: " . mysqli_stmt_error($stmt));
        echo json_encode(['success' => false, 'message' => 'Failed to add comment.']);
    }
    mysqli_stmt_close($stmt);
} else {
    error_log("DB Error: " . mysqli_error($conn));
    echo json_encode(['success' => false, 'message' => 'An internal error occurred.']);
}

mysqli_close($conn);
?>
