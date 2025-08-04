<?php
header('Content-Type: application/json');
require_once "config.php";

if (isset($_GET['ids'])) {
    $ids = json_decode($_GET['ids']);
    if (is_array($ids) && count($ids) > 0) {
        $ids_sanitized = array_map('intval', $ids);
        $ids_string = implode(',', $ids_sanitized);

        $sql = "SELECT p.*, COUNT(c.id) AS comment_count FROM Posts p LEFT JOIN comments c ON p.id = c.article_id WHERE p.id IN ($ids_string) GROUP BY p.id";
        $result = mysqli_query($conn, $sql);

        $articles = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $articles[] = $row;
            }
        }
        echo json_encode($articles);
    } else {
        echo json_encode([]);
    }
} else {
    echo json_encode([]);
}
?>