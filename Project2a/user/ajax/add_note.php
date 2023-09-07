<?php
session_start();
require('../../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['note']) && isset($_POST['book_id']) && isset($_SESSION['user_id'])) {
        $note = $_POST['note'];
        $bookId = $_POST['book_id'];
        $userId = $_SESSION['user_id'];

        $insertNoteQuery = "INSERT INTO notes (book_id, user_id, note, created_at) VALUES (?, ?, ?, NOW())";
        $insertNoteStmt = mysqli_prepare($conn, $insertNoteQuery);
        mysqli_stmt_bind_param($insertNoteStmt, 'iis', $bookId, $userId, $note);
        mysqli_stmt_execute($insertNoteStmt);

        if (mysqli_stmt_affected_rows($insertNoteStmt) > 0) {
            echo "Note added successfully.";
        } else {
            echo "Failed to add note.";
        }

        mysqli_stmt_close($insertNoteStmt);
    }
} else {
    echo "Invalid request.";
}
?>