<?php
require_once('includes/db.php');

if(isset($_GET['category'])){
    $category = $_GET['category'];
    
 
    $booksQuery = "SELECT b.*, c.name AS category_name, a.name AS author_name, a.surname AS author_surname
       FROM books AS b
       JOIN authors AS a ON b.author_id = a.id
       JOIN categories AS c ON b.category_id = c.id
       WHERE b.deleted_at IS NULL"; 

   
    if ($category !== 'all') {
        $categoryFilter = mysqli_real_escape_string($conn, $category);
        $booksQuery .= " AND b.category_id = $categoryFilter";
    }
    
    $booksResult = mysqli_query($conn, $booksQuery);
    
    while ($book = mysqli_fetch_assoc($booksResult)) {
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
}
?>