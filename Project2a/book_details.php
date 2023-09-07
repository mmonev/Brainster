<?php
session_start();
require('./includes/db.php');

$isLoggedIn = isset($_SESSION['user_id']);
$userId = $isLoggedIn ? $_SESSION['user_id'] : null;
$book = [];
$bookId = null;

if (isset($_GET['book_id'])) {
    $bookId = $_GET['book_id'];

    $bookQuery = "SELECT b.*, a.name AS author_name, a.surname AS author_surname, c.name AS category_name 
                  FROM books AS b
                  JOIN authors AS a ON b.author_id = a.id
                  JOIN categories AS c ON b.category_id = c.id
                  WHERE b.id = ? AND b.deleted_at IS NULL";

    $bookStmt = mysqli_prepare($conn, $bookQuery);
    mysqli_stmt_bind_param($bookStmt, 'i', $bookId);
    mysqli_stmt_execute($bookStmt);
    $bookResult = mysqli_stmt_get_result($bookStmt);
    $book = mysqli_fetch_assoc($bookResult);

    $commentsQuery = "SELECT c.id AS comment_id, c.comment, c.approved, u.username 
    FROM comments AS c
    JOIN users AS u ON c.user_id = u.id
    WHERE c.book_id = ? AND c.deleted_at IS NULL";
    $commentsStmt = mysqli_prepare($conn, $commentsQuery);
    mysqli_stmt_bind_param($commentsStmt, 'i', $bookId);
    mysqli_stmt_execute($commentsStmt);
    $commentsResult = mysqli_stmt_get_result($commentsStmt);

    $privateNotes = array();
    $privateNotesQuery = "SELECT * FROM notes WHERE book_id = ? AND user_id = ?";
    $privateNotesStmt = mysqli_prepare($conn, $privateNotesQuery);
    mysqli_stmt_bind_param($privateNotesStmt, 'ii', $bookId, $userId);
    mysqli_stmt_execute($privateNotesStmt);
    $privateNotesResult = mysqli_stmt_get_result($privateNotesStmt);
    $privateNotes = mysqli_fetch_all($privateNotesResult, MYSQLI_ASSOC);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $book['title']; ?> - Book Details</title>
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-secondary row">
<a class="navbar-brand col-2 text-center" 
   href="<?php 
            if (isset($_SESSION['admin'])) {
                echo './admin/dashboard.php';
            } elseif (isset($_SESSION['user_id'])) {
                echo './user/user_dashboard.php';
            } else {
                echo './index.php';
            }
         ?>">
    <img src="./Logo.png" width="50" height="50" alt="">
</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse row col justify-content-end" id="navbarSupportedContent">
        <?php
    if(isset($_SESSION['user_id']) || isset($_SESSION['admin'])):

        ?>
            <div class="col-1">
                <a href="./logout.php" class="btn btn-outline-danger bg-danger text-white my-2 my-sm-0" type="button">Logout</a>
            </div>
        <?php else: ?>
            <div class="col-1">
                <a href="./login.php" class="btn btn-outline-danger bg-danger text-white my-2 my-sm-0" type="button">Login</a>
            </div>
            <div class="col-1">
                <a href="./register.php" class="btn btn-outline-danger bg-danger text-white my-2 my-sm-0" type="button">Sign Up</a>
            </div>
        <?php endif; ?>
    </div>
</nav>

<div class="container">
<div class="container my-5 py-5" style="background: linear-gradient(45deg, #f5f7fa, #eef2f6); border-radius: 15px; box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);">

    <div class="row mt-4">
        <div class="col-md-4 mb-4">
            <div class="text-center">
                <img src="<?php echo $book['image_url']; ?>" class="img-fluid rounded shadow-lg" alt="<?php echo $book['title']; ?>" style="max-width: 70%; margin: 0 auto;">
            </div>
        </div>

        <div class="col-md-8 mb-4">
        <h5 class="py-1" style="color: #37474f;"><?php echo $book['title']; ?></h5>
            <p style="color: #62757f;">
                <strong>Author:</strong> <?php echo $book['author_name'] . ' ' . $book['author_surname']; ?><br>
                <strong>Year of Publication:</strong> <?php echo $book['year_of_publication']; ?><br>
                <strong>Number of Pages:</strong> <?php echo $book['num_pages']; ?><br>
                <strong>Category:</strong> <?php echo $book['category_name']; ?>
            </p>
        </div>
    </div>

    <div class="mt-4 p-3" style="background: rgba(255, 255, 255, 0.9); border-radius: 10px; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);">
    <h3 style="color: #546e7a;">Comments:</h3>
    <ul id="comments-list" class="list-unstyled mt-2">
        <?php while ($comment = mysqli_fetch_assoc($commentsResult)) : ?>
            <li class="mb-2" style="color: #79838c;">
                <span>
                    <strong><?php echo $comment['username']; ?>:</strong> <?php echo $comment['comment']; ?>
                </span>
                <?php if (!$comment['approved']) : ?>
                
                <?php endif; ?>
            </li>
        <?php endwhile; ?>
    </ul>
</div>

<?php if ($isLoggedIn) : ?>
    <div class="mt-4 p-3" style="background: rgba(255, 255, 255, 0.9); border-radius: 10px; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);">
            <form id="add-comment-form" method="post">
                <input type="hidden" name="book_id" value="<?php echo $bookId; ?>">
                <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Leave a comment"></textarea>
                <button type="submit" class="btn btn-primary mt-2">Submit Comment</button>
            </form>

            <h3 class="mt-5">Your Private Notes:</h3>
            <ul id="private-notes-list">

            </ul>

            <form id="add-note-form" method="post">
                <input type="hidden" name="book_id" value="<?php echo $bookId; ?>">
                <textarea class="form-control" id="note" name="note" rows="3" placeholder="Leave a private note"></textarea>
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
  Add Private Note
</button>
            </form>

        <?php endif; ?>
        </div>
</div>
</div>


<?php include './footer.php'; ?>
<script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)

</script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function loadComments() {
                $.ajax({
                    type: 'GET',
                    url: './user/ajax/load_comments.php',
                    data: { book_id: <?php echo $bookId; ?> },
                    success: function(response) {
                        $('#comments-list').html(response);
                    }
                });
            }

            function deleteComment(commentId) {
    $.ajax({
        type: 'POST',
        url: "./user/ajax/delete_comment.php",
        data: { comment_id: commentId },
        success: function(data) {
            $('#comment-' + commentId).remove();
        },
        error: function() {
            alert('Failed to delete comment. Please try again.');
        }
    });
}


            function loadPrivateNotes() {
                var bookId = <?php echo $bookId; ?>;
                $.ajax({
                    type: "GET",
                    url: "./user/ajax/load_notes.php?book_id=" + bookId,
                    success: function(data) {
                        $("#private-notes-list").html(data);
                    }
                });
            }

            function deletePrivateNote(noteId) {
                $.ajax({
                    type: "POST",
                    url: "./user/ajax/delete_note.php",
                    data: { note_id: noteId },
                    success: function(response) {
                        if (response === 'success') {
                            loadPrivateNotes();
                        } else {
                            console.log("Error deleting note.");
                        }
                    }
                });
            }

            function editPrivateNote(noteId) {
                var updatedNote = prompt("Edit your note:", $("#" + noteId).text().trim());
                if (updatedNote !== null) {
                    $.ajax({
                        type: "POST",
                        url: "./user/ajax/edit_note.php",
                        data: { note_id: noteId, updated_note: updatedNote },
                        success: function(response) {
                            if (response === 'success') {
                                loadPrivateNotes(); 
                            } else {
                                console.log("Error editing note.");
                            }
                        }
                    });
                }
            }

            loadComments();
            <?php if ($isLoggedIn) : ?>
                loadPrivateNotes();
            <?php endif; ?>



        $(document).on('click', '.delete-comment-button', function() {
            var commentId = $(this).data('comment-id');
    
    if (confirm('Do you really want to delete this comment?')) {
        deleteComment(commentId);
    }
});

            $('#add-comment-form').submit(function(e) {
                e.preventDefault();
                var comment = $('#comment').val();

                $.ajax({
                    type: 'POST',
                    url: './user/ajax/add_comment.php',
                    data: { comment: comment, book_id: <?php echo $bookId; ?> },
                    success: function(response) {
                        alert(response); 
                        if (response === 'Comment added successfully.') {
                            loadComments();
                        }
                    }
                });
            });


            $('#add-note-form').submit(function(e) {
                e.preventDefault();
                var note = $('#note').val();

                $.ajax({
                    type: 'POST',
                    url: './user/ajax/add_note.php',
                    data: { note: note, book_id: <?php echo $bookId; ?> },
                    success: function(response) {
                        alert(response);
                        if (response === 'Note added successfully.') {
                            loadPrivateNotes();
                        }
                    }
                });
            });

            $(document).on('click', '.delete-note-button', function() {
                var noteId = $(this).data('note-id');
                deletePrivateNote(noteId);
            });

            $(document).on('click', '.edit-note-button', function() {
                var noteId = $(this).data('note-id');
                editPrivateNote(noteId);
            });
        });

    </script>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>