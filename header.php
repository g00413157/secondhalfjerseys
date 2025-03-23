<header class="header">
    <!-- Hamburger Menu Icon (Only on Mobile) -->
    <div class="hamburger" onclick="toggleMenu()">☰</div>

    <!-- Left navigation links -->
    <nav class="nav-links">
        <a id="shop" href="shop.php">Shop</a>
        <a id="about" href="about.php">About</a>
        <a id="contact" href="contact.php">Contact</a>
    </nav>

    <!-- Centered logo -->
    <div class="logo-container">
        <!-- Static Image Logo -->
        <img src="Logo/logo-4.png" alt="Logo" class="logo-img">

        <!-- Animated Video Logo -->
        <video class="logo-video" autoplay muted loop>
            <source src="SHJLogoAnimated.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <!-- Right navigation links -->
    <nav class="nav-links">
        <a href="cartshow.php" id="cart_response">Cart</a>
        <a id="login" href="login.php">Login</a>
        
        <a href="create.php" id="btn-create">Create User</a>
    </nav>
    <br>
</header>

<!-- Mobile Menu (Hidden by Default) 
<nav class="mobile-menu">
    <a id="shop" href="shop.php">Shop</a>
    <a id="about" href="about.php">About</a>
    <a id="contact" href="contact.php">Contact</a>
    <a href="cartshow.php" id="cart_response">Cart</a>
    <a id="login" href="login.php">Login</a>
    <button class="create" onclick="showSignUp()">Create User</button>
</nav>-->
