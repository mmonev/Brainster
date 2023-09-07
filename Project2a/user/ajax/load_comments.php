<?php
session_start();
require('../../includes/db.php');

$output = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['book_id'])) {
    $bookId = filter_input(INPUT_GET, 'book_id', FILTER_VALIDATE_INT);
    $loggedInUserId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    $displayActions = false;

    $commentsQuery = "SELECT c.id AS comment_id, c.comment, c.approved, u.username, c.user_id 
                      FROM comments AS c
                      JOIN users AS u ON c.user_id = u.id
                      WHERE c.book_id = ? AND (c.approved = 1 OR (c.approved = 0 AND c.user_id = ?)) AND c.deleted_at IS NULL";

    $commentsStmt = mysqli_prepare($conn, $commentsQuery);
    mysqli_stmt_bind_param($commentsStmt, 'ii', $bookId, $loggedInUserId);
    mysqli_stmt_execute($commentsStmt);
    $commentsResult = mysqli_stmt_get_result($commentsStmt);


    $output .= '<table class="table">';
    $output .= '<thead>';
    $output .= '<tr>';
    $output .= '<th>User</th>';
    $output .= '<th>Comment</th>';
    
    while ($comment = mysqli_fetch_assoc($commentsResult)) {
        if ($loggedInUserId && $comment['user_id'] == $loggedInUserId && $comment['approved'] == 0) {
            $displayActions = true;
        }
    }

    if ($displayActions) {
        $output .= '<th>Actions</th>';
    }

    $output .= '</tr>';
    $output .= '</thead>';
    $output .= '<tbody>';

    mysqli_data_seek($commentsResult, 0);

    while ($comment = mysqli_fetch_assoc($commentsResult)) {
        $commentContent = htmlspecialchars($comment['comment'], ENT_QUOTES, 'UTF-8');
        $username = htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8');

        $output .= "<tr>";
        $output .= "<td>{$username}</td>";
        $output .= "<td>{$commentContent}</td>";

        if ($loggedInUserId && $comment['user_id'] == $loggedInUserId && $comment['approved'] == 0) {
            $output .= "<td>";
            $output .= "<button class='delete-comment-button btn btn-danger' data-comment-id='{$comment['comment_id']}'>Delete (Pending Approval)</button>";
            $output .= "</td>";
        } elseif ($displayActions) {
            $output .= "<td></td>";
        }
        
        $output .= "</tr>";
    }

    $output .= '</tbody>';
    $output .= '</table>';

    mysqli_stmt_close($commentsStmt);
    mysqli_close($conn);
}

echo $output;
?>