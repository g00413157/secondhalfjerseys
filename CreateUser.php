<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $emailExists=0; //check for if email exists already;
        $usernameExists=0; //check for if username exists already;


        // Connect to the database
        $conn = new mysqli('localhost', 'kwbz5h6_admin', 'aDmin654321qwertyu', 'kwbz5h6_secondhalfjerseysdb');
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $sql="SELECT username FROM users WHERE username='$username'";
        $result_username = $conn->query($sql); 

        if ($result_username->num_rows > 0) {
            $usernameExists= 1;
        }
        $sql = "SELECT email FROM users WHERE email='$email'";
        $result_email = $conn->query($sql);
        if ($result_email->num_rows > 0) {
            $emailExists= 1;
        }
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO Users (username, email, password) VALUES (?, ?, ?)");
        if (!$stmt) {
            die("Statement Preparation Failed: " . $conn->error);
        }
        $stmt->bind_param("sss", $username, $email, $password);

        // Execute and handle response
        if ($stmt->execute()) {
            echo "User registered successfully!<br>";
            echo "Username: " . htmlspecialchars($username) . "<br>";
            echo "Email: " . htmlspecialchars($email) . "<br>";
        } else {
            error_log("Error: " . $stmt->error); // Log error
            echo "An error occurred while registering the user.";
        }

        // Close connections
        $stmt->close();
    }
    else{
        if($usernameExists == 1){
            echo"The username already exists<br>";
        }
        if($usernameExists == 1){
            echo"The email address has already been used<br>";
        }
    }
        $conn->close();
    } else {
        die("Required fields are missing.");
    }

?>
