// Initialize or load the cart from localStorage
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Function to add item to the cart
function addToCart(productId) {
    // Check if the product is already in the cart
    const existingProduct = cart.find(item => item.product_id === productId);

    if (existingProduct) {
        // If product exists, increase the quantity (or do other logic)
        existingProduct.quantity += 1;
    } else {
        // If product doesn't exist, add it to the cart
        cart.push({
            product_id: productId,
            quantity: 1 // Default quantity
        });
    }

    // Save the updated cart to localStorage
    localStorage.setItem('cart', JSON.stringify(cart));

    // Optionally, show a message to the user
    alert('Item added to cart!');
}

// Function to get cart items (optional, for viewing cart)
function getCartItems() {
    return JSON.parse(localStorage.getItem('cart')) || [];
}

// Function to display the cart items (for example purposes)
function showCart() {
    const cartItems = getCartItems();
    let cartContent = '';
    cartItems.forEach(item => {
        cartContent += `Product ID: ${item.product_id}, Quantity: ${item.quantity}<br>`;
    });

    // Display cart items in an alert or a modal
    alert(cartContent || 'Your cart is empty.');
}
