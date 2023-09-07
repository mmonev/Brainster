<?php
session_start();
require('../../includes/db.php');

$response = ['status' => 'error', 'message' => 'Unknown error.'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == true && isset($_POST['comment_id'])) {
        $commentId = $_POST['comment_id'];
        $adminId = $_SESSION['admin_id']; 
        

        $updateCommentQuery = "UPDATE comments SET approved = 1, denied = 0 WHERE id = ?";
        $updateCommentStmt = mysqli_prepare($conn, $updateCommentQuery);
        mysqli_stmt_bind_param($updateCommentStmt, 'i', $commentId);
        $commentUpdated = mysqli_stmt_execute($updateCommentStmt);
        mysqli_stmt_close($updateCommentStmt);

        $updateAdminCommentQuery = "UPDATE admin_comments SET approved = 1, admin_id = ? WHERE comment_id = ?";
        $updateAdminCommentStmt = mysqli_prepare($conn, $updateAdminCommentQuery);
        mysqli_stmt_bind_param($updateAdminCommentStmt, 'ii', $adminId, $commentId);
        $adminCommentUpdated = mysqli_stmt_execute($updateAdminCommentStmt);
        mysqli_stmt_close($updateAdminCommentStmt);

        if ($commentUpdated && $adminCommentUpdated) {
            $response['status'] = 'success';
            $response['message'] = 'Comment approved successfully.';
        } else {
            $response['message'] = 'Failed to approve comment.';
        }
    } elseif (!isset($_SESSION['admin']) || $_SESSION['admin'] != true) {
        $response['message'] = 'Unauthorized action.';
        header("HTTP/1.1 401 Unauthorized");
        echo json_encode($response);
        exit;
    }
}

header("Content-Type: application/json");
echo json_encode($response);
?>