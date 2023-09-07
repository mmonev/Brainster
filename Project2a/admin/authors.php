<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

require_once('../includes/db.php');

$authorsQuery = "SELECT * FROM authors WHERE deleted_at IS NULL";
$authorsResult = mysqli_query($conn, $authorsQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Authors</title>
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
        <h1 class="py-1 mb-3">Manage Authors</h1>
        <a href="dashboard.php" class="btn btn-success mr-2">Back to Dashboard</a>
        <a href="add_author.php" class="btn btn-success">Add New Author</a>
        <table class="table mt-3">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Biography</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($authorsResult)) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['surname']; ?></td>
                    <td><?php echo $row['biography']; ?></td>
                    <td>
                        <a class="btn btn-warning mb-2 form-control" href="edit_author.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a class="btn btn-danger form-control" href="javascript:void(0);" onclick="deleteAuthor(<?php echo $row['id']; ?>)">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>


    </div>
            </div>

    <?php include '../footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    function deleteAuthor(authorId) {
        if (confirm("Are you sure you want to delete this author and their books?")) {
            $.ajax({
                type: 'POST',
                url: 'ajax/delete_author.php',
                data: { author_id: authorId },
                success: function(response) {
                    if (response === 'success') {
                        location.reload();
                    } else {
                        console.log('Error deleting author.');
                    }
                }
            });
        }
    }
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>