<?php
ob_start(); // Start output buffering to catch any stray output

header('Content-Type: application/json');

try {
    require_once "config.php";

    // Verify connection
    if (!isset($conn) || $conn->connect_error) {
        throw new Exception('Database connection failed: ' . ($conn->connect_error ?? 'Unknown error'));
    }

    // --- Pagination ---
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 9;

    if ($page < 1) $page = 1;
    if ($limit < 1) $limit = 9;

    $offset = ($page - 1) * $limit;

    // --- Get Total Articles ---
    $totalResult = $conn->query("SELECT COUNT(id) as total FROM Posts WHERE status = 'PUBLISHED'");
    if (!$totalResult) {
        throw new Exception('Failed to query total articles: ' . $conn->error);
    }
    $totalRow = $totalResult->fetch_assoc();
    $totalArticles = (int)$totalRow['total'];
    $totalPages = ceil($totalArticles / $limit);

    // --- Fetch Articles ---
    $sql = "SELECT id, titleEnglish, titleFrench, descEnglish, descFrench, category, image, created_at, tags, status, views, likes, comment FROM Posts WHERE status = 'PUBLISHED' ORDER BY created_at DESC LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception('Failed to prepare statement: ' . $conn->error);
    }
    $stmt->bind_param("ii", $limit, $offset);
    $stmt->execute();
    $result = $stmt->get_result();

    $articles = [];
    while ($row = $result->fetch_assoc()) {
        $articles[] = $row;
    }

    $stmt->close();
    $conn->close();

    ob_end_clean(); // Clear buffer before sending response

    echo json_encode([
        'articles' => $articles,
        'currentPage' => $page,
        'totalPages' => $totalPages
    ]);

} catch (Exception $e) {
    ob_end_clean(); // Clear buffer on error
    http_response_code(500); // Set HTTP status to indicate a server error
    echo json_encode([
        'error' => 'A server error occurred.',
        'message' => $e->getMessage() // Provide specific error message for debugging
    ]);
}
?>