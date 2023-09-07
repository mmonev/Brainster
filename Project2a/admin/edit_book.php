<?php
session_start();
require_once('../includes/db.php');

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookId = $_POST['book_id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $authorId = intval($_POST['author']);
    $categoryId = intval($_POST['category']);
    $yearOfPublication = intval($_POST['year_of_publication']);
    $numPages = intval($_POST['num_pages']);
    $imageUrl = mysqli_real_escape_string($conn, $_POST['image_url']);

    $checkAuthorQuery = "SELECT deleted_at FROM authors WHERE id = ?";
    $checkAuthorStmt = mysqli_prepare($conn, $checkAuthorQuery);
    mysqli_stmt_bind_param($checkAuthorStmt, 'i', $authorId);
    mysqli_stmt_execute($checkAuthorStmt);
    mysqli_stmt_bind_result($checkAuthorStmt, $authorDeletedAt);
    mysqli_stmt_fetch($checkAuthorStmt);


    if ($authorDeletedAt === null) {
        mysqli_stmt_close($checkAuthorStmt);
        
        $updateQuery = "UPDATE books 
                        SET title = ?, author_id = ?, category_id = ?, year_of_publication = ?, num_pages = ?, image_url = ? 
                        WHERE id = ?";
        $stmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($stmt, 'siiissi', $title, $authorId, $categoryId, $yearOfPublication, $numPages, $imageUrl, $bookId);
    
        if (mysqli_stmt_execute($stmt)) {
            header('Location: books.php');
            exit();
        } else {
            $error = 'Error updating book.';
        }
    
        mysqli_stmt_close($stmt);
    } else {
        mysqli_stmt_close($checkAuthorStmt);
        $error = 'Cannot update book with a deleted author.';
    }
}

$bookId = $_GET['book_id'];
$bookQuery = "SELECT books.id, books.title, books.author_id, books.category_id, categories.name AS category_name,
              books.year_of_publication, books.num_pages, books.image_url
              FROM books
              INNER JOIN authors ON books.author_id = authors.id
              INNER JOIN categories ON books.category_id = categories.id
              WHERE books.id = $bookId";
$bookResult = mysqli_query($conn, $bookQuery);
$book = mysqli_fetch_assoc($bookResult);


$authorsQuery = "SELECT id, CONCAT(authors.name, ' ', authors.surname) AS author_fullname FROM authors WHERE deleted_at IS NULL";
$categoriesQuery = "SELECT * FROM categories WHERE deleted_at IS NULL";
$authorsResult = mysqli_query($conn, $authorsQuery);
$categoriesResult = mysqli_query($conn, $categoriesQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
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
        <h2 class="py-1">Edit Book</h2>
        <a href="books.php" class="btn btn-success mb-3">Back to Manage Books</a>
        <?php if (!empty($error)): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="post">
            <input type="hidden" class="form-control" name="book_id" value="<?php echo $book['id']; ?>">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" id="title" value="<?php echo $book['title']; ?>" required>
            <br>
            <label for="author">Author:</label>
            <select name="author" id="author" class="form-control" required>
    <?php while ($author = mysqli_fetch_assoc($authorsResult)): ?>
        <option value="<?php echo $author['id']; ?>" <?php if ($author['id'] === $book['author_id']) echo 'selected'; ?>>
            <?php echo $author['author_fullname']; ?>
        </option>
        
    <?php endwhile; ?>
</select>
            <br>
            <label for="year_of_publication">Year of Publication:</label>
            <input type="number" class="form-control" name="year_of_publication" id="year_of_publication" value="<?php echo $book['year_of_publication']; ?>" required>
            <br>
            <label for="num_pages">Number of Pages:</label>
            <input type="number" class="form-control" name="num_pages" id="num_pages" value="<?php echo $book['num_pages']; ?>" required>
            <br>
            <label for="image_url">Image URL:</label>
            <input type="text" class="form-control" name="image_url" id="image_url" value="<?php echo $book['image_url']; ?>" required>
            <br>
            <label for="category">Category:</label>
            <select name="category" id="category" class="form-control" required>
                <?php while ($category = mysqli_fetch_assoc($categoriesResult)): ?>
                    <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] === $book['category_id']) echo 'selected'; ?>>
                        <?php echo $category['name']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <br>
            <button type="submit" class="form-control btn btn-primary">Update</button>
        </form>
    </div>
                </div>
    <?php include '../footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    
</body>
</html>