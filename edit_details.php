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
?>


<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="sidebar.css">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="addstudentdetail.css" />
</head>
<body>
	<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">Manage <b>Student</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<i class="fa fa-user" aria-hidden="true"></i>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
			</div>
			<ul>
				<li>
					<a href="sidebar.html">
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li>
					<a href="addstudentdetails.html" target="_blank">
						<i class="fa fa-user" aria-hidden="true"></i>
						<span>Add Student Details</span>
					</a>
				</li>
				<li>
					<a href="viewstudentdetails.php">
						<i class="fa fa-eye" aria-hidden="true"></i>
						<span>Veiw Student Details</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-pencil" aria-hidden="true"></i>
						<span>Edit student details</span>
					</a>
				</li>
				<!-- <li>
					<a href="#">
						<i class="fa fa-cog" aria-hidden="true"></i>
						<span>Setting</span>
					</a>
				</li> -->
				<li>
					<a href="index.html">   
						<i class="fa fa-power-off" aria-hidden="true"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</nav>
        <section class="main-page">
            <div class="main-top">
                <center>
                    <h1>WELCOME</h1>
                    <section class="container">
                        <header>View Details</header>

             <?php
             if(isset($_GET['view_details'])){

              $view_st_details = $_GET['view_details'];
              $query = "SELECT * FROM student_details where full_name= '$view_st_details'";
              $run = mysqli_query($conn,$query);

              while($row= mysqli_fetch_assoc($run)){
                     
              ?>
           
      <form  action = "update_student_details.php" method="post"  class="form">
        <div class="input-box">
          <label>Full Name</label>
          <input type="text" name="full_name" placeholder="Enter full name" value="<?php echo $row['full_name']; ?>" required />
        </div>
            
        <div class="input-box">
          <label>Email Address</label>
          <input type="text" name ="email" placeholder="Enter email address"  value="<?php echo $row['email']; ?>" required />
        </div>
        
        <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <input type="number" name="phone" placeholder="Enter phone number" value="<?php echo $row['phone']; ?>" required />
          </div>
          <div class="input-box">
            <label>Birth Date</label>
            <input type="date" name="birth_date" placeholder="Enter birth date" value="<?php echo $row['birth_date']; ?>" required />
          </div>
        </div>
        <div class="input-box">
        <label>Course</label>
        <input type="text" name="course" placeholder="Enter birth date" value="<?php echo $row['course']; ?>" required />
            
            <!-- <div class="select-box">
                <select name="course" >
                  <option hidden>select</option>
                  <option>B.tech</option>
                  <option>M.tech</option>
                  <option>BBA</option>
                  <option>MBA</option>
                  <option>BA</option>
                  <option>MA</option>
                </select>
              </div> -->
          </div>
        <div class="input-box">
          <label name="gender">Gender</label>
          <input type="text" name="gender" placeholder="Enter birth date" value="<?php echo $row['gender']; ?>" required />
          <!-- <?php if($row['gender']== 'Male') echo "checked" ?> -->
          <!-- <div class="select-box">
            <select  name="gender">
            
              <option hidden>select</option>
              <option >Male</option>
              <option>Female</option>
              <option>I'd rather no say</option>
            </select>
          </div> -->
        </div>
          <!-- <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" />
              <label for="check-male">male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" />
              <label for="check-female">Female</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-other" name="gender" />
              <label for="check-other">prefer not to say</label>
            </div>
          </div>
        </div> -->
        <div class="input-box address">
          <label>Address</label>
          <input type="text" name="addres" placeholder="Enter street address" value="<?php echo $row['addres']; ?>"  required />
          <!-- <input type="text" placeholder="Enter street address line 2" required /> -->
          <div class="column">
          
            
            <input type="text" name="country" placeholder="Enter country name" value="<?php echo $row['country']; ?>" required />
            <div class="blank">
              <!-- <select name="country">
                <option hidden>Country</option>
                <option>India</option>
                <option>Canada</option>
                <option>Mexico</option>
                <option>Japan</option>
                <option>USA</option>
              </select> -->
              
            </div>
            <input type="text" name="city" placeholder="Enter your city" value="<?php echo $row['city']; ?>" required />
          </div>
          <div class="column">
            <input type="text" name ="states" placeholder="Enter your state"value="<?php echo $row['states']; ?>" required />
            <input type="number" name="postal_code" placeholder="Enter postal code" value="<?php echo $row['postal_code']; ?>" required />
          </div>
          <?php }} ?>
        </div>
        
        <button name="submit">Submit </button>
      </form>

      
    </section>
                        
                   
                </center>
            </div>
        </section>
        
          
	</div>
    

    </section>

</body>
</html>