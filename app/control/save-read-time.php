<?php
require_once "config.php";

if (isset($_POST['article_id']) && isset($_POST['read_time'])) {
    $articleId = (int)$_POST['article_id'];
    $readTime = (int)$_POST['read_time'];

    // We can store this in a separate table or update the posts table.
    // For simplicity, we'll add a new column to the posts table called 'read_time'.
    // First, let's check if the column exists, and if not, add it.
    $sql = "SHOW COLUMNS FROM Posts LIKE 'read_time'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        $sql = "ALTER TABLE Posts ADD COLUMN read_time INT DEFAULT 0";
        mysqli_query($conn, $sql);
    }

    // Now, update the read time
    $sql = "UPDATE Posts SET read_time = read_time + $readTime WHERE id = $articleId";
    mysqli_query($conn, $sql);

    echo json_encode(['status' => 'success']);
}
?>