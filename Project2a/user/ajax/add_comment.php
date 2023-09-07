<?php
session_start();
require('../../includes/db.php');

$response = 'Invalid request.';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['comment'], $_POST['book_id'], $_SESSION['user_id'])) {

        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
        $bookId = filter_input(INPUT_POST, 'book_id', FILTER_VALIDATE_INT);
        $userId = $_SESSION['user_id'];

        if (!$comment || !$bookId) {
            $response = "Invalid inputs provided.";
            echo $response;
            exit();
        }

        $existingCommentQuery = "SELECT id FROM comments WHERE book_id = ? AND user_id = ?";
        $existingCommentStmt = mysqli_prepare($conn, $existingCommentQuery);
        mysqli_stmt_bind_param($existingCommentStmt, 'ii', $bookId, $userId);
        mysqli_stmt_execute($existingCommentStmt);
        $existingCommentResult = mysqli_stmt_get_result($existingCommentStmt);

        if (mysqli_num_rows($existingCommentResult) > 0) {
            $response = 'You have already commented on this book.';
        } else {
            $insertQuery = "INSERT INTO comments (user_id, book_id, comment, created_at, approved) VALUES (?, ?, ?, NOW(), 0)";
            $stmt = mysqli_prepare($conn, $insertQuery);
            mysqli_stmt_bind_param($stmt, 'iis', $userId, $bookId, $comment);

            if (mysqli_stmt_execute($stmt)) {
                $commentId = mysqli_insert_id($conn);

                $insertAdminQuery = "INSERT INTO admin_comments (comment_id, admin_id, approved) VALUES (?, NULL, 0)";
                $stmtAdmin = mysqli_prepare($conn, $insertAdminQuery);
                mysqli_stmt_bind_param($stmtAdmin, 'i', $commentId);
                
                if (mysqli_stmt_execute($stmtAdmin)) {
                    $response = 'Comment added successfully.';
                } else {
                    $response = 'Error adding comment to admin table: ' . mysqli_error($conn);
                }

                mysqli_stmt_close($stmtAdmin);
            } else {
                $response = 'Error adding comment: ' . mysqli_error($conn);
            }

            mysqli_stmt_close($stmt);
        }

        mysqli_stmt_close($existingCommentStmt);
    }
}

mysqli_close($conn);

echo $response;
?>