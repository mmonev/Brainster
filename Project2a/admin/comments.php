<?php
session_start();
require('../includes/db.php');

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

$commentsQuery = "SELECT c.*, u.username, b.title AS book_title 
                  FROM comments AS c
                  JOIN users AS u ON c.user_id = u.id
                  JOIN books AS b ON c.book_id = b.id";

$commentsResult = mysqli_query($conn, $commentsQuery);

if (!$commentsResult) {
    die("Database query failed.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Manage Comments</title>
    
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-secondary row">
    <a class="navbar-brand col-2 text-center" href="#">
        <img src="../Logo.png" width="50" height="50" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse row col justify-content-end" id="navbarSupportedContent">
        <div class="col-1">
            <a href="../logout.php" class="btn btn-outline-danger bg-danger text-white my-2 my-sm-0" type="button">Logout</a>
        </div>
    </div>
</nav>
<div class="container">
<div class="container my-5 py-5" style="background: linear-gradient(45deg, #f5f7fa, #eef2f6); border-radius: 15px; box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);">
        <h1 class="py-1 mb-3">Manage Comments</h1>
        <a href="dashboard.php" class="btn btn-success mb-5">Back to Admin Dashboard</a>

        <h3>Denied Comments</h3>
        <table class="table table-danger mb-5">
            <tr>
                <th>User</th>
                <th>Book Title</th>
                <th>Comment</th>
                <th>Action</th>
            </tr>
            <?php while ($comment = mysqli_fetch_assoc($commentsResult)) : ?>
                <?php if ($comment['denied']) : ?>
                    <tr>
                        <td><?php echo $comment['username']; ?></td>
                        <td><?php echo $comment['book_title']; ?></td>
                        <td><?php echo $comment['comment']; ?></td>
                        <td>
                            <button class="approve-denied-button btn btn-success form-control" data-comment-id="<?php echo $comment['id']; ?>">Approve</button>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endwhile; ?>
        </table>

        <h3>All Comments</h3>
        <table class="table table-dark">
            <tr>
                <th>User</th>
                <th>Book Title</th>
                <th>Comment</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php mysqli_data_seek($commentsResult, 0); ?>
            <?php while ($comment = mysqli_fetch_assoc($commentsResult)) : ?>
                <?php if ($comment['deleted_at'] === null) : ?>
                    <tr>
                        <td><?php echo $comment['username']; ?></td>
                        <td><?php echo $comment['book_title']; ?></td>
                        <td><?php echo $comment['comment']; ?></td>
                        <td>
                            <?php if ($comment['approved']) {
                                echo '<span style="color: green;">Approved</span>';
                            } elseif ($comment['denied']) {
                                echo '<span style="color: red;">Denied</span>';
                            } else {
                                echo '<span style="color: yellow;">Pending...</span>';
                            } ?>
                        </td>
                        <td>
                            <?php if (!$comment['approved'] && !$comment['denied']) : ?>
                                <button class="approve-button btn btn-success m-1 form-control" data-comment-id="<?php echo $comment['id']; ?>">Approve</button>
                                <button class="deny-button btn btn-warning m-1 form-control" data-comment-id="<?php echo $comment['id']; ?>">Deny</button>
                            <?php endif; ?>
                            <button class="delete-button btn btn-danger m-1 form-control" data-comment-id="<?php echo $comment['id']; ?>">Delete</button>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endwhile; ?>
        </table>
    </div>
</div>
    <?php include '../footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
       
            $('.approve-button').click(function() {
    var commentId = $(this).data('comment-id');

    $.ajax({
        type: 'POST',
        url: 'ajax/approve_comment.php',
        data: { comment_id: commentId },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                location.reload();
            } else {
                console.log('Error:', response.message);
            }
        }
    });
});
            $('.deny-button').click(function() {
                var commentId = $(this).data('comment-id');

                $.ajax({
                    type: 'POST',
                    url: 'ajax/deny_comment.php',
                    data: { comment_id: commentId },
                    success: function() {
                        location.reload();
                    }
                });
            });

            $('.approve-denied-button').click(function() {
                var commentId = $(this).data('comment-id');

                $.ajax({
                    type: 'POST',
                    url: 'ajax/approve_denied_comment.php',
                    data: { comment_id: commentId },
                    success: function() {
                        location.reload();
                    }
                });
            });

            $('.delete-button').click(function() {
             var commentId = $(this).data('comment-id');
                var row = $(this).closest('tr');

                var userConfirmed = confirm("Do you really want to remove the comment?");

    if (userConfirmed) {
        $.ajax({
            type: 'POST',
            url: 'ajax/delete_comment.php',
            data: { comment_id: commentId },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    row.remove();
                } else {
                    console.log('Error:', response.message);
                }
            }
        });
    }
});

 });

</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>