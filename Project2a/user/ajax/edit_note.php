<?php
session_start();
require('../../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id']) && isset($_POST['note_id']) && isset($_POST['updated_note'])) {
    $userId = $_SESSION['user_id'];
    $noteId = $_POST['note_id'];
    $updatedNote = $_POST['updated_note'];

    $checkQuery = "SELECT n.user_id 
                   FROM notes AS n
                   WHERE n.id = ?";
    $checkStmt = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($checkStmt, 'i', $noteId);
    mysqli_stmt_execute($checkStmt);
    $checkResult = mysqli_stmt_get_result($checkStmt);
    $note = mysqli_fetch_assoc($checkResult);

    if ($note['user_id'] === $userId) {
        $updateQuery = "UPDATE notes SET note = ? WHERE id = ?";
        $updateStmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($updateStmt, 'si', $updatedNote, $noteId);
        mysqli_stmt_execute($updateStmt);
        mysqli_stmt_close($updateStmt);
        echo 'success';
    } else {
        echo 'error';
    }

    mysqli_stmt_close($checkStmt);
}
?>