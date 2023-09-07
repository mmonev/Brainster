<?php
session_start();
require('../../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id']) && isset($_POST['note_id'])) {
    $userId = $_SESSION['user_id'];
    $noteId = $_POST['note_id'];

    $checkQuery = "SELECT user_id 
                   FROM notes
                   WHERE id = ?";
    $checkStmt = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($checkStmt, 'i', $noteId);
    mysqli_stmt_execute($checkStmt);
    $checkResult = mysqli_stmt_get_result($checkStmt);
    $note = mysqli_fetch_assoc($checkResult);

    if ($note['user_id'] === $userId) {

        $deleteQuery = "UPDATE notes SET deleted_at = NOW() WHERE id = ?";
        $deleteStmt = mysqli_prepare($conn, $deleteQuery);
        mysqli_stmt_bind_param($deleteStmt, 'i', $noteId);
        mysqli_stmt_execute($deleteStmt);
        mysqli_stmt_close($deleteStmt);
        echo 'success';
    } else {
        echo 'error';
    }

    mysqli_stmt_close($checkStmt);
}
?>