<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <!-- Add any other necessary meta tags, links, or scripts -->
</head>
<body>
  <div id="full-width">
      <img src="top_banner.png" width="800px">  
  </div>
  <br>
<div class="container">
        <div id="items-container" class="items-container">
  <?php
  // Sample menu items fetched from PHP array (could be retrieved from a database)
  $menuItems = [
    ['category' => 'Pizza', 'name' => 'Margherita', 'price' => 200, 'image_src' => 'pizza1.jpg'],
    ['category' => 'Pizza', 'name' => 'Pepperoni', 'price' => 300, 'image_src' => 'pizza2.jpg'],
    ['category' => 'Burger', 'name' => 'Cheeseburger', 'price' => 80, 'image_src' => 'burger.jpg'],
    ['category' => 'Burger', 'name' => 'Veggie Burger', 'price' => 120, 'image_src' => 'veg.jpg']
];

foreach ($menuItems as $item) {
  echo '<div class="item-box">';
  // Check if the image_src key exists
  if (isset($item['image_src'])) {
      echo '<div class="image-container"><img src="' . $item['image_src'] . '" alt="' . $item['name'] . '" width=100></div>';
  }
  echo '<div class="item-details">';
  echo '<p class="name">' . $item['name'] . '</p>';
  echo '<p class="price">₹' . $item['price'] . '</p>';
  echo '<button class="add-to-cart" data-category="' . $item['category'] . '" data-name="' . $item['name'] . '" data-price="' . $item['price'] . '">Add to Cart</button>';
  echo '</div>'; // Closing item-details
  echo '</div>'; // Closing item-box
}
  ?>
</div>
<br>
  <div id="cart">
    <h2>Cart</h2>
    <ul id="cart-items"></ul>
    <p>Total: <span id="cart-total">₹0</span></p>
    <button id="checkout-btn" class="add-to-cart">Checkout</button>
  </div>
</div>
<script src="script.js"></script>
<br>
<div id="footer">
      <img src="footer.jpg" width="800px">  
  </div>
</body>
</html>
