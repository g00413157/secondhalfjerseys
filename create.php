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
    <h1 class="titles">Create A user</h1>
    <br>
    <form id="awfc_userForm">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="text" id="password" name="password" required><br><br>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Create User"><br>
        </div>
    </form>
    <div id="awfc_response"></div>
    <?php include 'footer.php'; ?>
    <script src="JS/secondhalfjerseys.js"></script>
    <script>
 $(document).ready(function(){
        // Fix: Correct ID selector for the form
        $('#awfc_userForm').on('submit', function(event) {
            event.preventDefault();

            // AJAX request to the server
            $.ajax({
                type: 'POST',
                url: 'createUser.php', // Make sure this URL points to your PHP script
                data: $(this).serialize(),
                success: function(response) {
                    // Fix: Correct ID for response element
                    $('#awfc_response').html(response);
                },
                error: function(xhr, status, error) {
                    $('#awfc_response').html('Error: ' + error);
                }
            });
        });
    });

    </script>

</body>

</html>