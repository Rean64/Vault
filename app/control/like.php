<?php
header('Content-Type: application/json');
require_once "config.php";

if (isset($_POST['article_id']) && isset($_POST['action'])) {
    $articleId = (int)$_POST['article_id'];
    $action = $_POST['action'];

    if ($action === 'like') {
        $sql = "UPDATE Posts SET likes = likes + 1 WHERE id = ?";
    } elseif ($action === 'unlike') {
        $sql = "UPDATE Posts SET likes = GREATEST(0, likes - 1) WHERE id = ?";
    } else {
        // Invalid action, return 200 with error status in JSON
        echo json_encode(['status' => 'error', 'message' => 'Invalid action.']);
        exit;
    }

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $articleId);
        if (mysqli_stmt_execute($stmt)) {
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                // Success, return 200 with success status in JSON
                echo json_encode(['status' => $action . 'd']); // e.g., liked or unliked
            } else {
                // Article not found or no change made, return 200 with error status in JSON
                echo json_encode(['status' => 'error', 'message' => 'Article not found or no change made.']);
            }
        } else {
            // Database execution failed, return 200 with error status in JSON
            echo json_encode(['status' => 'error', 'message' => 'Database execution failed.']);
        }
        mysqli_stmt_close($stmt);
    } else {
        // Database statement preparation failed, return 200 with error status in JSON
        echo json_encode(['status' => 'error', 'message' => 'Database statement failed.']);
    }
    mysqli_close($conn);
} else {
    // Missing parameters, return 200 with error status in JSON
    echo json_encode(['status' => 'error', 'message' => 'Missing parameters.']);
}
?>