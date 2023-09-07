<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
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
        <?php
        session_start();
        if(isset($_SESSION['user_id']) || isset($_SESSION['admin'])):
        ?>
            <div class="col-1">
                <a href="../logout.php" class="btn btn-outline-danger bg-danger text-white my-2 my-sm-0" type="button">Logout</a>
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

<div>
    <div class="rotating-text-wrapper">
    <h1>Brainster Library</h1>
    <h1>Brainster Library</h1>
    <h1>Brainster Library</h1>
  </div>
</div>

<div class="container">
    <div class="category-container d-flex flex-wrap align-items-center my-4 justify-content-center">
    <a href="#" data-category-id="all" class="btn btn-sm btn-outline-primary m-1 category-btn <?php echo ($selectedCategory == 'all') ? 'active' : ''; ?>">All Categories</a>
    <?php
    $selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'all';
    require_once('../includes/db.php');
    $categoriesQuery = "SELECT * FROM categories WHERE deleted_at IS NULL";
    $categoriesResult = mysqli_query($conn, $categoriesQuery);
    while ($category = mysqli_fetch_assoc($categoriesResult)) {
        $active = ($category['id'] == $selectedCategory) ? 'active' : '';
        echo "<a href='#' data-category-id='{$category['id']}' class='btn btn-sm btn-outline-primary m-1 category-btn $active'>{$category['name']}</a>";
    }
    ?>
</div>

    <div class="books-container container my-5 py-5 text-center" style="background: linear-gradient(45deg, #f5f7fa, #eef2f6); border-radius: 15px; box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);">
        <?php
        $userId = $_SESSION['user_id'] ?? null;
        $userBooksQuery = "SELECT b.*, c.name AS category_name, a.name AS author_name, a.surname AS author_surname
                           FROM books AS b
                           JOIN authors AS a ON b.author_id = a.id
                           JOIN categories AS c ON b.category_id = c.id
                           WHERE b.deleted_at IS NULL
                           AND b.author_id NOT IN (SELECT id FROM authors WHERE deleted_at IS NOT NULL)";

        if (isset($_GET['category']) && $_GET['category'] !== 'all') {
            $categoryFilter = mysqli_real_escape_string($conn, $_GET['category']);
            $userBooksQuery .= " AND b.category_id = $categoryFilter";
        }

        $userBooksResult = mysqli_query($conn, $userBooksQuery);

        while ($book = mysqli_fetch_assoc($userBooksResult)) {
            echo "<a href='/Group10/Project2a/book_details.php?book_id={$book['id']}' class='book-link'>";
            echo "<div class='book-card text-center'>";
            echo "<img src='{$book['image_url']}' alt='{$book['title']}'>";
            echo "<div class='book-details'>";
            echo "<h3>{$book['title']}</h3>";
            echo "<p>Author: {$book['author_name']} {$book['author_surname']}<p>";
            echo "<p>Category: {$book['category_name']}</p>";
            echo "</div>";
            echo "</div>";
            echo "</a>";
        }
        ?>
    </div>
</div>

<?php include '../footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
    $(".category-btn").click(function(event) {
        event.preventDefault();
        let categoryId = $(this).attr('data-category-id');
        $.ajax({
            url: '../fetch_books.php',
            type: 'GET',
            data: {
                category: categoryId
            },
            success: function(data) {
                $('.books-container').html(data);
            }
        });
    });
});
</script>

</body>
</html>