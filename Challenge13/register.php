<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Register</title>
  </head>
  <body>

  <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
 
function isFormValid(array $formData): bool
{
    if (empty($formData['username']) || empty($formData['email']) || empty($formData['password'])) {
        return false;
    }

    if (preg_match('/[^\w]/', $formData['username'])) {
        return false;
    }

    if (strpos($formData['email'], '@') === false || strlen($formData['email']) < 5) {
        return false;
    }

    if (!preg_match('/\d/', $formData['password']) || !preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $formData['password']) || !preg_match('/[A-Z]/', $formData['password'])) {
        return false;
    }

    return true;
}

function isUsernameValid(string $username): bool
{
    return !preg_match('/[^\w]/', $username);
}

function isEmailValid(string $email): bool
{
    return strpos($email, '@') !== false && strlen($email) >= 5;
}

function isPasswordValid(string $password): bool
{
    return preg_match('/\d/', $password) && preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password) && preg_match('/[A-Z]/', $password);
}

function registerUser(array $formData): bool
{
    $username = $formData['username'];
    $email = $formData['email'];
    $password = md5($formData['password']);

    $lines = file('users.txt');
    foreach ($lines as $line) {
        $parts = explode(',', $line);
        if (count($parts) !== 2) {
            continue;
        }
        [$existingEmail, $existingUsernameAndPassword] = $parts;
        $existingUsername = substr($existingUsernameAndPassword, 0, strpos($existingUsernameAndPassword, '='));
        if ($username === $existingUsername) {
            echo '<p class="text-danger">Username taken.</p>';
            return false;
        }
        if ($email === $existingEmail) {
            echo '<p class="text-danger">A user with this email already exists.</p>';
            return false;
        }
    }

    $line = $email . ', ' . $username . '=' . $password . "\n";
    file_put_contents('users.txt', $line, FILE_APPEND);

    header("Location: welcome.php?username=$username");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isFormValid($_POST)) {
        registerUser($_POST);
    } else {
        echo '<p class="text-danger">Please fill in all the required fields.</p>';
    }
}

  $users = file('users.txt');
  foreach ($users as $user) {
    list($existing_email, $existing_credentials) = explode(', ', $user);
    list($existing_username, $existing_password) = explode('=', $existing_credentials);
    if ($existing_username === $username) {
      echo "<div class='container text-center py-5'> <h2>Username taken!</h2> </div>";
      exit();
    }
    if ($existing_email === $email) {
      echo "<h2 class='text-warning'>A user with this email already exist!</h2>";
      exit();
    }
  }

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  $user_data = "$email, $username=$hashed_password\n";
  file_put_contents('users.txt', $user_data, FILE_APPEND);


  header("Location: welcome.php?username=" . $username);
  exit();
}
?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>