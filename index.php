<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Restaurant Shopping Cart</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="menu">
  <?php
  // Sample menu items fetched from PHP array (could be retrieved from a database)
  $menuItems = [
    ['category' => 'Pizza', 'name' => 'Margherita', 'price' => 10],
    ['category' => 'Pizza', 'name' => 'Pepperoni', 'price' => 12],
    ['category' => 'Burger', 'name' => 'Cheeseburger', 'price' => 8],
    ['category' => 'Burger', 'name' => 'Veggie Burger', 'price' => 9]
  ];

  foreach ($menuItems as $item) {
      echo '<div class="item"><table><tbody><tr>';
      echo '<td style="width:100px"><span class="name">' . $item['name'] . '</span></td>';
      echo '<td style="text-align:right"><span class="price">$' . $item['price'] . '</span></td>';
      echo '<td><button class="add-to-cart" data-category="' . $item['category'] . '" data-name="' . $item['name'] . '" data-price="' . $item['price'] . '">Add to Cart</button></td>';
      echo '</tr></tbody><table></div>';
  }
  ?>
</div>

<div id="cart">
  <h2>Cart</h2>
  <ul id="cart-items"></ul>
  <p>Total: <span id="cart-total">$0</span></p>
  <button id="checkout-btn">Checkout</button>
</div>

<script src="script.js"></script>
</body>
</html>
