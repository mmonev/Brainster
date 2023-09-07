<?php
session_start();
require('../includes/db.php');

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['book_id'])) {
    $bookId = $_GET['book_id'];

    $deleteCommentsQuery = "UPDATE comments SET deleted_at = NOW() WHERE book_id = ?";
    $deleteCommentsStmt = mysqli_prepare($conn, $deleteCommentsQuery);
    mysqli_stmt_bind_param($deleteCommentsStmt, 'i', $bookId);
    mysqli_stmt_execute($deleteCommentsStmt);

    $deleteNotesQuery = "UPDATE notes SET deleted_at = NOW() WHERE book_id = ?";
    $deleteNotesStmt = mysqli_prepare($conn, $deleteNotesQuery);
    mysqli_stmt_bind_param($deleteNotesStmt, 'i', $bookId);
    mysqli_stmt_execute($deleteNotesStmt);

    $deleteBookQuery = "UPDATE books SET deleted_at = NOW() WHERE id = ?";
    $deleteBookStmt = mysqli_prepare($conn, $deleteBookQuery);
    mysqli_stmt_bind_param($deleteBookStmt, 'i', $bookId);
    mysqli_stmt_execute($deleteBookStmt);

    header("Location: ./books.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Book</title>
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
    <h2 class="py-1">Delete Book</h2>


    <?php include '../footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>