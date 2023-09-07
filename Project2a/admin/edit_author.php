<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

require_once('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $authorId = $_GET['id'];

    $authorQuery = "SELECT * FROM authors WHERE id = ?";
    $authorStmt = mysqli_prepare($conn, $authorQuery);
    mysqli_stmt_bind_param($authorStmt, 'i', $authorId);
    mysqli_stmt_execute($authorStmt);
    $authorResult = mysqli_stmt_get_result($authorStmt);
    $author = mysqli_fetch_assoc($authorResult);

    if (!$author) {
        header('Location: authors.php');
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authorId = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $biography = $_POST['biography'];

    $updateQuery = "UPDATE authors SET name = ?, surname = ?, biography = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($stmt, 'sssi', $name, $surname, $biography, $authorId);
    mysqli_stmt_execute($stmt);

    header('Location: authors.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Author</title>
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
        <h1 class="py-1">Edit Author</h1>
        <a href="authors.php" class="btn btn-success mb-3">Back to Manage Authors</a>
        <?php if ($author) : ?>
            <form action="edit_author.php" method="POST">
                <input type="hidden" class="form-control" name="id" value="<?php echo $author['id']; ?>">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $author['name']; ?>" required>
                <br>
                <label for="surname">Surname:</label>
                <input type="text" class="form-control" name="surname" id="surname" value="<?php echo $author['surname']; ?>" required>
                <br>
                <label for="biography">Biography:</label>
                <textarea name="biography" id="biography" rows="4" class="form-control" required><?php echo $author['biography']; ?></textarea>
                <br>
                <button type="submit" class="form-control btn btn-primary">Update Author</button>
            </form>
        <?php else : ?>
            <p>Author not found.</p>
        <?php endif; ?>
    </div>
        </div>

    <?php include '../footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>