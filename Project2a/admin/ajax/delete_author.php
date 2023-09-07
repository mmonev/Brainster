<?php
require_once('../../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['author_id'])) {
    $authorId = $_POST['author_id'];

    $deleteBooksQuery = "UPDATE books SET deleted_at = NOW() WHERE author_id = ?";
    $deleteBooksStmt = mysqli_prepare($conn, $deleteBooksQuery);
    mysqli_stmt_bind_param($deleteBooksStmt, 'i', $authorId);
    mysqli_stmt_execute($deleteBooksStmt);

    $deleteCommentsQuery = "UPDATE comments SET deleted_at = NOW() WHERE book_id IN (SELECT id FROM books WHERE author_id = ?)";
    $deleteCommentsStmt = mysqli_prepare($conn, $deleteCommentsQuery);
    mysqli_stmt_bind_param($deleteCommentsStmt, 'i', $authorId);
    mysqli_stmt_execute($deleteCommentsStmt);

    $deleteNotesQuery = "UPDATE notes SET deleted_at = NOW() WHERE book_id IN (SELECT id FROM books WHERE author_id = ?)";
    $deleteNotesStmt = mysqli_prepare($conn, $deleteNotesQuery);
    mysqli_stmt_bind_param($deleteNotesStmt, 'i', $authorId);
    mysqli_stmt_execute($deleteNotesStmt);

    $deleteAuthorQuery = "UPDATE authors SET deleted_at = NOW() WHERE id = ?";
    $deleteAuthorStmt = mysqli_prepare($conn, $deleteAuthorQuery);
    mysqli_stmt_bind_param($deleteAuthorStmt, 'i', $authorId);
    mysqli_stmt_execute($deleteAuthorStmt);

    echo 'success';
} else {
    echo 'error';
}
?>