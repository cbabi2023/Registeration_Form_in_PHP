<?php
$insert = false;
if (isset($_POST['name'])) {
    $SERVER = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($SERVER, $username, $password);

    if (!$con) {
        die("Connection to this network is failed to connect due to" . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['other'];

    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
    VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";

    if ($con->query($sql) == true) {
        
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>PHP Forms</title>
</head>
<body>
    <div class="container">
        <h1>Welcome to PHP Travel Registration Form</h1>
        <p>Enter Your details and Register Your journey for the Travel</p>
        
        <?php
        if($insert == true){
           echo "<p class='Submsg'>Thanks for Submitting the Form. We are very Excited to see you join with us. Thanks!</p>";
        
            }
        ?>
        
            <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your name">
            <input type="text" name="age" id="age" placeholder="Enter Your age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your gender">
            <input type="email" name="email" id="email" placeholder="Enter Your email">
            <input type="text" name="phone" id="phone" placeholder="Enter Your phone">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter any Other information"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>
