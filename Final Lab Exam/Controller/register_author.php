<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../View/login.html');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $contactno = trim($_POST['contactno']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($name) || empty($contactno) || empty($username) || empty($password)) {
        $error_message = "All fields are required!";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $host = 'localhost';      
        $dbname = 'blog_system'; 
        $dbuser = 'root';          
        $dbpass = '';              

        $conn = new mysqli($host, $dbuser, $dbpass, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $name = $conn->real_escape_string($name);
        $contactno = $conn->real_escape_string($contactno);
        $username = $conn->real_escape_string($username);

        $sql = "INSERT INTO authors (name, contactno, username, password) 
                VALUES ('$name', '$contactno', '$username', '$hashedPassword')";

        if ($conn->query($sql) === TRUE) {
            header('Location: author_list.php');
            exit();
        } else {
            $error_message = "Error: " . $conn->error;
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Author</title>
</head>
<body>
    <h1>Register New Author</h1>

    <?php
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>

    <form method="post" action="register_author.php">
        Name: <input type="text" name="name" required><br>
        Contact No.: <input type="text" name="contactno" required><br>
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>

        <input type="submit" value="Register Author">
    </form>

    <br><br>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
