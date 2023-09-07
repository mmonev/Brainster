<?php
session_start();
require('../../includes/db.php');

$response = array();

if (!isset($_SESSION['admin'])) {
    header("HTTP/1.1 401 Unauthorized");
    $response['status'] = 'error';
    $response['message'] = 'Unauthorized access.';
    echo json_encode($response);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['comment_id'])) {
        $commentId = $_POST['comment_id'];

        $deleteCommentQuery = "UPDATE comments SET deleted_at = NOW() WHERE id = ?";
        $deleteCommentStmt = mysqli_prepare($conn, $deleteCommentQuery);
        mysqli_stmt_bind_param($deleteCommentStmt, 'i', $commentId);
        mysqli_stmt_execute($deleteCommentStmt);

        if (mysqli_affected_rows($conn) > 0) {

            $response['status'] = 'success';
            $response['message'] = 'Comment deleted successfully.';
        } else {

            $response['status'] = 'error';
            $response['message'] = 'Failed to delete the comment.';
        }
        
        mysqli_stmt_close($deleteCommentStmt);
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Comment ID not provided.';
    }

    echo json_encode($response);
}
?>