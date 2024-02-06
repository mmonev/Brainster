<?php

// Exercise 1
// Create an application which represents a news-feed service. There should be a file containing an array like:
// $posts = [
// 0 => [‘title’ => ‘Hello world’, ‘body’ => ‘Lorem ipsum dolor sit amet...’],
// 1 => [‘title’ => ‘Lorem ipsum‘, ‘body’ => ‘This is the second post’s content’],
// 2 => [‘title’ => ‘John Doe’, ‘body’ => ‘Pellentesque erat dolor, vestibulum quis risus ac...’]
// ];
// Now, create an index.php, where you will include the file from above. Iterate through the posts and
// print each post’s title in a div-styled box. Add a `Read more` link next to each title
// which should take the user to a file called post.php and transfer the id of the post from the array.
// For example, if the user clicks on Hello world, the user is taken to post.php?id=0
// (since the Hello world card is at position 0 in the $posts array).
// Similarly, clicking the Lorem ipsum takes the user to post.php?id=1 and so on.
// Inside post.php read the id from the query string,
// find the particular post and print the title and the body, just like in an ordinary news website.
// Make sure to handle the edge cases. For example, what happens if a user manually changes
// the id parameter manually in the browser, and writes an id that is not present
// in the array (i.e. post.php?id=140)?


?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<title>Exercise 1</title>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="row">
<?php
include_once('posts.php');

foreach($posts as $index => $post) {
echo '<div class="card col-5 m-1"><h2>' .
$post['title'] .
'</h2>' .
'<a href="post.php?id=' . $index . '">Read more...</a></div>';
}


?>
</div>
</div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<title>Exercise 1</title>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="row">
<?php
include_once('posts.php'); // $posts

$postId = $_GET['id']; // 0
$post = $posts[$postId]; // prviot element od $posts

echo '<h1>' . $post['title'] . '</h1>';
echo '<p>' . $post['body'] . '</p>';
?>
</div>
</div>

<!-- nov tab

-->

<?php

$posts = [
['title' => 'Hello world', 'body' => 'Lorem ipsum dolor sit amet...'],
['title' => 'Lorem ipsum', 'body' => "This is the second post's content"],
['title' => 'John Doe', 'body' => 'Pellentesque erat dolor, vestibulum quis risus ac...']
];

?>

</body>
</html>

