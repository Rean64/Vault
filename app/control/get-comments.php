<?php
header('Content-Type: application/json');
require_once "config.php";

$article_id = filter_input(INPUT_GET, 'article_id', FILTER_VALIDATE_INT);

if (!$article_id) {
    echo json_encode(['error' => 'Invalid article ID']);
    http_response_code(400);
    exit;
}

$comments = [];
// Assuming you have a 'comments' table with a similar structure.
// You may need to adjust the table and column names.
$sql = "SELECT author, comment, created_at FROM comments WHERE article_id = ? AND parent_id = 0 ORDER BY created_at DESC";

if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $article_id);
    
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $comments[] = $row;
        }
    } else {
        // It's better to log this error than to expose it.
        error_log("DB Error: " . mysqli_error($conn));
    }
    mysqli_stmt_close($stmt);
}

echo json_encode($comments);
mysqli_close($conn);
?>
