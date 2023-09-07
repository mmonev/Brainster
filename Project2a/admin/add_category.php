<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

require('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];

    $query = "INSERT INTO categories (name) VALUES (?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $name);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header('Location: categories.php');
        exit();
    } else {
        $error = "Error adding category.";
    }

    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
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
        <h2 class="py-1">Add Category</h2>
        <a href="categories.php" class="btn btn-success">Back to Manage Categories</a>
        <?php if (isset($error)): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="post">
            <label for="name">Category Name:</label>
            <input class="form-control" type="text" name="name" id="name" required>
            <br>
            <button type="submit" class="btn btn-primary form-control">Add Category</button>
        </form>
    </div>
        </div>
    <?php include '../footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>