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
    </style>
    <?php include('header.php'); ?>

<br>
    <h2 class="text-center">If you want to Contact Us to Inquire about a Jersey <br> Input your Query below and we will get back to you as soon as we can </h2>
    <form id="contactForm" action="https://api.web3forms.com/submit" method="POST">
               
               <div class="mb-3" >
                   <input type="hidden" name="access_key" value="bdf5d16f-6a10-4421-8a76-4c29251e3853">
                   <label for="exampleInputEmail1" class="form-label">Email address</label>
                   <input type="email" class="form-control"  name="email" id="email" aria-describedby="emailHelp"
                       placeholder="Email address">
               </div>
               <div class="mb-3">
                   <label for="fn" class="form-label">Enter Your Full Name</label>
                   <input type="text" class="form-control" name="name" id="fn" placeholder=" Enter Your Full Name">
               </div>
               <div class="mb-3">
                   <label for="tb" class="form-label">Insert Your Query</label>
                   <textarea  class="form-control" name="message"  cols="30" rows="10" placeholder="Insert Your Query"></textarea>
               </div>
               <input type="hidden" name="redirect" value="https://web3forms.com/success">
               <button type="submit" class="btn btn-warning" id="contactEmail">Submit</button>
           </form>

<script>
const form = document.getElementById('form');
const result = document.getElementById('result');

form.addEventListener('submit', function(e) {
e.preventDefault();
const formData = new FormData(form);
const object = Object.fromEntries(formData);
const json = JSON.stringify(object);
result.innerHTML = "Please wait..."

fetch('https://api.web3forms.com/submit', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: json
    })
    .then(async (response) => {
        let json = await response.json();
        if (response.status == 200) {
            result.innerHTML = "Form submitted successfully";
        } else {
            console.log(response);
            result.innerHTML = json.message;
        }
    })
    .catch(error => {
        console.log(error);
        result.innerHTML = "Something went wrong!";
    })
    .then(function() {
        form.reset();
        setTimeout(() => {
            result.style.display = "none";
        }, 3000);
    });
});
</script>

    <?php include('footer.php'); ?>

    <script src="JS/secondhalfjerseys.js"></script>

</body>

</html>