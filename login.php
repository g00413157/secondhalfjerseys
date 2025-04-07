<?php include 'db.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="Logo/logo-2.png">
    <title>Second Half Jerseys</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap');
    </style>
    <?php include 'header.php'; ?>
    <br>
    <h1 class="titles">Login Page</h1>
    <div class="container">
        <div class="box" id="login_box">
            <form id="login_form" onsubmit="loginUser(event)">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br>
                <label for="password">Password:</label>
                <input type="text" id="password" name="password" required><br> <!-- Updated type -->
                <div id="buttons">
                    <input type="submit" value="Login">
                </div>
            </form>
            <div class="box" id="login_response"></div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="JS/secondhalfjerseys.js"></script>
    <script>
    function loginUser(event) {
    event.preventDefault();

    const form = document.getElementById('login_form');
    const formData = new FormData(form);

    fetch('login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text();
    })
    .then(data => {
        const loginResponse = document.getElementById('login_response');
        if (data.includes("Login successful!")) {
            loginResponse.innerHTML = `<p style="color: green;">${data}</p>`;
            
        } else {
            loginResponse.innerHTML = `<p style="color: red;">${data}</p>`;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('login_response').innerHTML = `<p style="color: red;">An error occurred. Please try again later.</p>`;
    });
}

</script>

</body>

</html>