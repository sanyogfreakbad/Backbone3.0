<?php
  session_start();
  $servername = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'teacher_db';
  $conn = mysqli_connect($servername, $user, $password, $database);
  if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
  }
  $email = $_POST['email'];
  $psw = $_POST['psw'];

  $sql = "SELECT * FROM register WHERE email='$email' AND psw='$psw'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $_SESSION['email'] = $email;
    header('Location: sidebar.html');
  } else {
    echo 'Invalid username or password';
    echo "<br> <a href = 'login.html'>Try Again!</a>  ";
  }
  mysqli_close($conn);
?>
