<?php
session_start();
include 'db.php'
?>
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



    <body>

       

        <div class="about-container">
            <section>
                <h2>Our Mission</h2>
                <p>At <span class="about-highlight">Second Half Jerseys</span>, we’re all about <span class="highlight">Giving
                        Jerseys a Second Half</span>. We believe in making football jerseys more accessible,
                    sustainable, and affordable. By offering a curated selection of pre-loved jerseys from both famous
                    clubs and national teams around the globe, we give fans the chance to own a piece of football
                    history without breaking the bank. Plus, shopping second-hand is a great way to reduce waste and
                    contribute to a more sustainable future.</p>
            </section>

            <section>
                <h2>Our Collection</h2>
                <p>Each jersey in our collection is handpicked for quality, style, and authenticity. From vintage
                    classics to modern-day kits, we take pride in offering jerseys from all eras, whether you’re looking
                    for an iconic kit from your favourite team or something truly unique. Our selection includes jerseys
                    from the top leagues across Europe, South America, Asia, and beyond – all carefully inspected to
                    ensure they meet our high standards.</p>
            </section>

            <section>
                <h2>Why Choose Us?</h2>
                <ul>
                    <li><span class="about-highlight">Quality & Authenticity</span>: We only sell genuine, high-quality
                        jerseys that have been carefully inspected for condition.</li>
                    <li><span class="aboit-highlight">Sustainability</span>: By purchasing second-hand, you're giving these
                        jerseys a second life, reducing waste, and supporting the circular economy.</li>
                    <li><span class="about-highlight">Competitive Pricing</span>: Get your hands on classic and rare football
                        kits without the hefty price tag.</li>
                    <li><span class="about-highlight">Based in Galway</span>: We’re proud to serve the local community,
                        offering both in-store and online shopping for our Galway customers.</li>
                    <li><span class="about-highlight">Passion for Football</span>: We're more than just a store – we're
                        football fans just like you, and we understand the love for a good jersey!</li>
                </ul>
            </section>
            
            <section>
                <h2>Join the Second Half Jerseys Community</h2>
                <p>We invite you to explore our ever-growing collection and join a community of football fans who share
                    the same love for the game. Whether you're in Galway or anywhere else in Ireland, we ensure fast
                    shipping so you can get your hands on your new favourite jersey in no time.</p>
            </section>

            <section>
                <p>Thank you for choosing <span class="highlight">Second Half Jerseys</span> – <span
                        class="highlight">"Giving Jerseys a Second Half"</span></p>
            </section>
            <section>
            <h2>Join the Second Half Jerseys Community</h2>
            <a href="https://www.instagram.com">
        <img src="icons/insta.png" alt="instagram" style="width110px;height:110px;">
    </a>  
    
            </section>
            <section class="cta">
            <h2  class="ctahead">Join the Second Half Jerseys Community</h2>
            
            <p>Whether you're based in Galway or anywhere in Ireland, we deliver quality, iconic football jerseys straight to your door. Join us in supporting a circular economy, one jersey at a time!</p>
            <a href="shop.php" class="btn">Start Exploring</a>
        </section>
        </div>

        <?php include 'footer.php'; ?>
        <script src="JS/secondhalfjerseys.js"></script>
    </body>

</html>