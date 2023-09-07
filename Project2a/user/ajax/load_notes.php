<?php
session_start();
require('../../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['book_id']) && isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $bookId = $_GET['book_id'];

    $privateNotesQuery = "SELECT * FROM notes WHERE book_id = ? AND user_id = ? AND deleted_at IS NULL";
    $privateNotesStmt = mysqli_prepare($conn, $privateNotesQuery);
    mysqli_stmt_bind_param($privateNotesStmt, 'ii', $bookId, $userId);
    mysqli_stmt_execute($privateNotesStmt);
    $privateNotesResult = mysqli_stmt_get_result($privateNotesStmt);

    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Note</th>';
    echo '<th>Actions</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($note = mysqli_fetch_assoc($privateNotesResult)) {
        echo '<tr>';
        echo '<td>' . $note['note'] . '</td>';
        echo '<td>';
        echo '<button class="edit-note-button btn btn-warning mb-2" data-note-id="' . $note['id'] . '">Edit</button> ';
        echo '<button class="delete-note-button btn btn-danger mb-2" data-note-id="' . $note['id'] . '">Delete</button>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';

    mysqli_stmt_close($privateNotesStmt);
} else {
    echo 'Invalid request.';
}
?>