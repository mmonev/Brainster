<?php
session_start();
require('../includes/db.php');

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

$query = "SELECT books.id, books.title, CONCAT(authors.name, ' ', authors.surname) AS author_name, categories.name AS category_name, books.year_of_publication, books.num_pages, books.image_url
          FROM books
          INNER JOIN authors ON books.author_id = authors.id
          INNER JOIN categories ON books.category_id = categories.id
          WHERE books.deleted_at IS NULL
          ORDER BY books.id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Manage Books</title>
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
        <h1 class="py-1 mb-3">Manage Books</h1>
        <a href="dashboard.php" class="btn btn-success mr-2">Back to Admin Dashboard</a>
        <a href="add_book.php" class="btn btn-success">Add New Book</a>

        <table class="mt-3 table">
    <tr>
        <th>Author</th>
        <th>Title</th>
        <th>Year of Publication</th>
        <th>Number of Pages</th>
        <th>Category</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    <?php while ($book = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?php echo $book['author_name']; ?></td>
            <td><?php echo $book['title']; ?></td>
            <td><?php echo $book['year_of_publication']; ?></td>
            <td><?php echo $book['num_pages']; ?></td>
            <td><?php echo $book['category_name']; ?></td>
            <td><img src="<?php echo $book['image_url']; ?>" alt="Book Image" style="max-width: 100px;"></td>
            <td>
                <a class="btn btn-warning mb-1 form-control" href="edit_book.php?book_id=<?php echo $book['id']; ?>">Edit</a>
                <button class="delete-book-button btn btn-danger form-control" data-book-id="<?php echo $book['id']; ?>">Delete</button>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
    </div>
    </div>
    <?php include '../footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        $('.delete-book-button').click(function() {
            var bookId = $(this).data('book-id');
            var row = $(this).closest('tr'); 

            if (confirm("Are you sure you want to delete this book and its associated comments and notes?")) {
                $.ajax({
                    type: 'POST',
                    url: './ajax/delete_book.php',
                    data: { book_id: bookId },
                    success: function(response) {
                        console.log(response);
                        if (response === 'success') {
                            row.remove();
                        } else {
                            console.log('Error deleting book.');
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