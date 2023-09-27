<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_details";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if(isset($_POST['submit'])) {

	// Get the form data
	$full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $birth_date = $_POST['birth_date'];
    $course = $_POST['course'];
    $gender = $_POST['gender'];
    $addres = $_POST['addres'];
    $country = $_POST['country'];
    $states = $_POST['states'];
    $city = $_POST['city'];
    $postal_code = $_POST['postal_code'];
    

	

	// // Check if the passwords match
	// if ($psw !== $psw_repeat) {
	// 	echo "Error: Passwords do not match";
	// 	exit;
	// }

	// // Check if the email already exists in the database
	// $sql = "SELECT * FROM users WHERE email='$email'";
	// $result = $conn->query($sql);
	// if ($result->num_rows > 0) {
	// 	echo "Error: Email already exists";
	// 	exit;
	// }
      
	
//    // Check if the email already exists in the database 2
//    $email_check = mysqli_query($conn, "SELECT email FROM register WHERE email='$email'");
//    if (mysqli_num_rows($email_check) > 0) {
//        echo "Error: Email already exists";
//        exit;
//    }

	// Insert the data into the database
	$sql = "INSERT INTO student_details (full_name,email,phone,birth_date,course,gender,addres,country,states,city,postal_code) VALUES ('$full_name','$email','$phone','$birth_date','$course','$gender','$addres','$country','$states','$city','$postal_code')";
	if ($conn->query($sql) === TRUE) {
		echo "Registration successful";
		//echo "<br> <a href = 'index.html'>go home</a>  ";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

$conn->close();
?>


