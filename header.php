<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Get the name of the current file
$currentPage = basename($_SERVER['PHP_SELF']);

$cart_count = 0;
if (isset($_SESSION['cart_items'])) {
    foreach ($_SESSION['cart_items'] as $item) {
        $cart_count += $item['quantity'];
    }
}

// Pages where cart icon should not appear
$hideCartPages = ['cart.php', 'checkout.php', 'payment.php', 'thankyou.php'];
?>

<header class="header">
    <!-- Hamburger Menu Icon (Only on Mobile) -->
    <div class="hamburger" onclick="toggleMenu()">â˜°</div>

    <!-- Left navigation links -->
    <nav class="nav-links">
        <a id="home" href="index.php">Home</a>
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
        <?php if (isset($_SESSION['username'])): ?>
           <a href="#" class="username"><?php echo htmlspecialchars($_SESSION['username']); ?></a>
            <p><a href="logout.php">Log Out</a></p>

            <?php if (!in_array($currentPage, $hideCartPages)): ?>
                <a href="cart.php" class="cart-link">
                    ðŸ›’
                </a>
            <?php endif; ?>

        <?php else: ?>
           <a href="login.php">Login</a>
            <a class="create" href="create.php">Create User</a>

        <?php endif; ?>
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
