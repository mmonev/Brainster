<?php
session_start();
require('../../includes/db.php');

$response = array();

if (!isset($_SESSION['admin'])) {
    header("HTTP/1.1 401 Unauthorized");
    header("Content-Type: application/json");
    $response['status'] = 'error';
    $response['message'] = 'Unauthorized access.';
    echo json_encode($response);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['comment_id'])) {
        $commentId = $_POST['comment_id'];


        $updateQuery = "UPDATE comments SET denied = 1, approved = 0 WHERE id = ?";
        $updateStmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($updateStmt, 'i', $commentId);
        mysqli_stmt_execute($updateStmt);

        if (mysqli_affected_rows($conn) > 0) {
            $response['status'] = 'success';
            $response['message'] = 'Comment denied successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to deny the comment.';
        }
        
        mysqli_stmt_close($updateStmt);
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Comment ID not provided.';
    }

    echo json_encode($response);
}
?>