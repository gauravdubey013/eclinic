<?php

session_start();

// include("db.php"); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Corrected Database connection parameters
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "clinic";

    // Create a database connection
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data and sanitize it
    $first_name = $conn->real_escape_string($_POST['name']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $email = $conn->real_escape_string($_POST['email']);
    $mobile_number = $conn->real_escape_string($_POST['number']);

    // Prepare and execute the SQL query to insert data
    $sql = "INSERT INTO form (name, dob, email, number) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $first_name, $dob, $email, $mobile_number);

    if ($stmt->execute()) {
        echo "Data saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>
    <link rel="stylesheet" href="home.css">
</head>

<body background="https://img.freepik.com/free-vector/clean-medical-background_53876-116875.jpg?w=1380&t=st=1699177587~exp=1699178187~hmac=484dbbfc84290c8f8e74606b7214e5fe9e9920bfa1c68417f824743b485ac3a4">
    <header>
        <h2 class="logo">E-CLINIC WORKS</h2>
        <nav class="navigation">
            <a href="#">HOME</a>
            <a href="#">ABOUT</a>
            <a href="#">APPOINTMENT</a>
            <a href="#">CONTACT</a>
            <button class="btnLogin-popup">LOGIN</button>
        </nav>
    </header>
    <div class="wrapper">
        <span class="icon-close">
            <ion-icon name="close-outline"></ion-icon>
        </span>
        <div class="form-box login">
            <h2>LOGIN</h2>
            <form action="login.php" method="post">
            
            <div class="input-box">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <input type="text" name="name" required>
                    <label> FULL NAME</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" name="email" required>
                    <input type="hidden" name="otp" value="<?php echo  $otp; ?>">
                    <label>Email-Id</label>
                </div>
                <button type="submit" class="btn">PROCEED</button>
                <div class="login-register">
                    <p> Not registered yet?
                        <a href="#" class="register-link"> REGISTER NOW!!</a>
                    </p>
                </div>
            </form>
        </div>  

        <div class="form-box register">
            <h2>Registeration</h2>
            <form action="#" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <input type="text" name="name" required>
                    <label>FULL NAME</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
                    <input type="date" name="dob" required  >
                    <label>BIRTH DATE</label>
                </div>
                <!-- <div class="grid-details">Select Gender:
                    <input type="radio" name="gender">MALE
                    <input type="radio" name="gender">FEMALE
                    <input type="radio" name="gender">OTHERS
                </div> 
                <div class="grid-details">Select Gender:
                    <input type="radio" name="gender">MALE
                    <input type="radio" name="gender">FEMALE
                    <input type="radio" name="gender">OTHERS
                </div>  -->
                
                <div class="input-box">
                    <span class="icon"><ion-icon name="call-outline"></ion-icon></span>
                    <input type="tel" name="number" required pattern="^[789]\d{9}$" >
                    <label>Phone No</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>EMAIL ID</label>
                </div>

                 <!-- <div class="remember">
                    <label><input type="checkbox">Agree to Terms And Conditions</label>
                </div>  -->
                 <button type="submit" class="btn">REGISTER</button>
                <div class="login-register">
                    <p> Already Registered??
                        <a href="#" class="login-link">LOGIN</a>
                    </p>
                </div>

            </form>
        </div> 
    </div>
    <script src="home.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>