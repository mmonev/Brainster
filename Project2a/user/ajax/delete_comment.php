<?php
session_start();
require('../../includes/db.php');

$response = ['status' => 'error', 'message' => 'An error occurred!'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id']) && isset($_POST['comment_id'])) {
    $userId = $_SESSION['user_id'];
    $commentId = $_POST['comment_id'];

    $checkQuery = "SELECT c.user_id, c.approved
                   FROM comments AS c
                   WHERE c.id = ?";
    $checkStmt = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($checkStmt, 'i', $commentId);
    mysqli_stmt_execute($checkStmt);
    $checkResult = mysqli_stmt_get_result($checkStmt);
    $comment = mysqli_fetch_assoc($checkResult);

    if ($comment) {
        if ((int)$comment['user_id'] === $userId && $comment['approved'] == 0) {
            $deleteQuery = "DELETE FROM comments WHERE id = ?";
            $deleteStmt = mysqli_prepare($conn, $deleteQuery);
            mysqli_stmt_bind_param($deleteStmt, 'i', $commentId);
            if(mysqli_stmt_execute($deleteStmt)) {
                $response['status'] = 'success';
                $response['message'] = 'Comment deleted successfully!';
            } else {
                $response['message'] = 'Failed to delete the comment!';
            }
            mysqli_stmt_close($deleteStmt);
        } else {
            $response['message'] = 'You do not have permission to delete this comment!';
        }
    } else {
        $response['message'] = 'Comment not found!';
    }

    mysqli_stmt_close($checkStmt);
    mysqli_close($conn);
}

echo json_encode($response);
?>