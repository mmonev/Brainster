<?php
session_start();
require('../../includes/db.php');

if (!isset($_SESSION['admin'])) {
    die('Unauthorized');
}

if (isset($_POST['book_id'])) {
    $bookId = $_POST['book_id'];

    mysqli_begin_transaction($conn);

    try {
        $deleteCommentsQuery = "DELETE FROM comments WHERE book_id = ?";
        $deleteCommentsStmt = mysqli_prepare($conn, $deleteCommentsQuery);
        mysqli_stmt_bind_param($deleteCommentsStmt, 'i', $bookId);
        mysqli_stmt_execute($deleteCommentsStmt);

        $deleteNotesQuery = "DELETE FROM notes WHERE book_id = ?";
        $deleteNotesStmt = mysqli_prepare($conn, $deleteNotesQuery);
        mysqli_stmt_bind_param($deleteNotesStmt, 'i', $bookId);
        mysqli_stmt_execute($deleteNotesStmt);

        $deleteBookQuery = "UPDATE books SET deleted_at = NOW() WHERE id = ?";
        $deleteBookStmt = mysqli_prepare($conn, $deleteBookQuery);
        mysqli_stmt_bind_param($deleteBookStmt, 'i', $bookId);
        mysqli_stmt_execute($deleteBookStmt);

        mysqli_commit($conn);

        echo 'success';
    } catch (Exception $e) {
        mysqli_rollback($conn);
        echo 'error';
    }
} else {
    echo 'error';
}
?>