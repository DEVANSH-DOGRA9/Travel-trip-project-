<?php  
session_start(); // Start the session at the top of the file  
$insert = false;  
if(isset($_POST['name'])){  
 $server = "localhost";  
$username = "root";  
 $password = "";  
 $dbname = "cwdpracticetrip";  
 $con = mysqli_connect($server, $username, $password, $dbname);  
  
 if(!$con){  
  die("Connection to database failed due to ". mysqli_connect_error());  
 }  
  
 $name = $_POST['name'];  
 $gender = $_POST['gender'];  
 $age = $_POST['age'];  
 $email = $_POST['email'];  
 $phone = $_POST['phone'];  
 $desc = $_POST['desc'];  

 $sq = "INSERT INTO `trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `Dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";  


 if($con->query($sq) === TRUE){  
     $_SESSION['form_submitted'] = true; // Set the session variable  
      header('Location: index.php'); // Redirect to index.php  
 exit; // Stop executing the script  
 } else {  
  echo "ERROR: $sq <br> $con->error";  
 }  

$con->close();  
}  

// Check if the session variable is set  
if(isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true){  
echo "<p class='submit-msg'>Thank you for submitting your form. We are happy to have you on board.</p>";  
unset($_SESSION['form_submitted']); // Unset the session variable  
}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('bg.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            font-family: 'Sriracha', cursive;
        }
        .container {
            background-color: whitesmoke;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin-top: 50px;
        }
        .submit-msg {
            color: green;
            font-weight: bold;
            margin-top: 20px;
        }
       
    </style>
</head>
<body>
    <div class="container">
        <h3 class="text-center">Welcome to XYZ College US Trip Form!</h3>
        <p class="text-center">Enter your details and submit this form to confirm your participation in the trip.</p>
        <?php
        if($insert == true){
            echo '<p class="submit-msg">Thank you for submitting the form!</p>';
        }
        ?>
        <form action="index.php" method="post">
            <div class="form-group">
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <input type="text" name="age" id="age" class="form-control" placeholder="Enter your age" required>
            </div>
            <div class="form-group">
                <input type="text" name="gender" id="gender" class="form-control" placeholder="Enter your gender" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter your Contact no." required>
            </div>
            <div class="form-group">
                <textarea name="desc" id="desc" class="form-control" cols="30" rows="5" placeholder="Enter any other information here"></textarea>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Submit</button>
            <button class="btn btn-primary btn-block" type="reset">Reset</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
