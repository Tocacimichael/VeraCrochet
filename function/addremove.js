$(document).ready(function() {
    // Add to cart button click event
    $('.add-to-cart').click(function() {
        var productId = $(this).data('product-id');
        $.post('cart.php', { product_id: productId, quantity: 1 }, function() {
            location.reload(); // Reload the page to update the cart
        });
    });

    // Remove from cart button click event
    $('.remove-from-cart').click(function() {
        var productId = $(this).data('product-id');
        $.post('remove_from_cart.php', { product_id: productId }, function() {
            location.reload(); // Reload the page to update the cart
        });
    });
});

