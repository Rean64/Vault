<?php
// Prevent stray output
ob_start();

// Set headers
header('Content-Type: application/json');
// header('Access-Control-Allow-Origin: *'); // Adjust for production

// Suppress errors in production
// ini_set('display_errors', 0);
// error_reporting(0);

try {
    // Include config
    include_once 'config.php';

    // Verify connection
    if (!isset($conn) || $conn->connect_error) {
        throw new Exception('Database connection not established');
    }

    // Query articles
    $sql = "SELECT id, titleEnglish, titleFrench, descEnglish, descFrench, image, created_at, tags, status, views, likes, comment, user_id FROM Posts ORDER BY created_at DESC";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        throw new Exception('Query failed: ' . mysqli_error($conn));
    }

    $articles = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $articles[] = [
            'id' => $row['id'],
            'titleEnglish' => $row['titleEnglish'],
            'titleFrench' => $row['titleFrench'],
            'descEnglish' => $row['descEnglish'],
            'descFrench' => $row['descFrench'],
            // 'category' => $row['category'] ?? 'General',
            'image' => $row['image'] ?? 'default.jpg',
            'created_at' => $row['created_at'],
            'tags' => $row['tags'] ?? '',
            'status' => $row['status'],
            'views' => $row['views'],
            'likes' => $row['likes'],
            'comment' => $row['comment'],
            'user_id' => $row['user_id']
        ];
    }

    // Close connection
    mysqli_close($conn);

    // Output JSON and exit
    ob_end_clean();
    echo json_encode($articles);
    exit; // Prevent further output
} catch (Exception $e) {
    ob_end_clean();
    http_response_code(500);
    echo json_encode(['error' => 'Server error: ' . $e->getMessage()]);
    exit; // Prevent further output
}
?>