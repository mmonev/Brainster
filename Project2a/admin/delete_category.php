<?php
session_start();
require('../includes/db.php');

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

if (isset($_GET['id'])) {
    $categoryId = $_GET['id'];

    $deleteQuery = "UPDATE categories SET deleted = 1 WHERE id = ?";
    $stmt = mysqli_prepare($conn, $deleteQuery);
    mysqli_stmt_bind_param($stmt, 'i', $categoryId);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header('Location: categories.php');
        exit();
    } else {
        $error = "Error deleting category.";
    }

    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Category</title>
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
        <h2 class="py-1">Delete Category</h2>
        <?php if (isset($error)): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
        <p>Are you sure you want to delete this category?</p>
        <form method="post">
            <button type="submit" class="form-control btn btn-primary">Yes, Delete</button>
        </form>
        <a href="categories.php">Cancel</a>
    </div>
        </div>
    <?php include '../footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    
</body>
</html>