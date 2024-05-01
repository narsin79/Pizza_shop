document.addEventListener('DOMContentLoaded', function() {
  const addToCartButtons = document.querySelectorAll('.add-to-cart');
  const cartItemsList = document.getElementById('cart-items');
  const cartTotal = document.getElementById('cart-total');
  let total = 0;

  const cartItems = {}; // Object to store items grouped by category

  addToCartButtons.forEach(button => {
    button.addEventListener('click', function() {
      const category = this.getAttribute('data-category');
      const name = this.getAttribute('data-name');
      const price = parseFloat(this.getAttribute('data-price'));
      total += price;
      cartTotal.textContent = `$${total.toFixed(2)}`;

      if (!cartItems[category]) {
        cartItems[category] = {}; // Initialize category object if it doesn't exist
      }

      if (!cartItems[category][name]) {
        cartItems[category][name] = { quantity: 1, price }; // Initialize item quantity if it doesn't exist
      } else {
        cartItems[category][name].quantity++; // Increment item quantity if it already exists
      }

      updateCart();
    });
  });

  function updateCart() {
    cartItemsList.innerHTML = ''; // Clear previous cart items

    // Loop through categories and display items
    for (const category in cartItems) {
      const categoryItems = cartItems[category];

      for (const itemName in categoryItems) {
        const item = categoryItems[itemName];
        const itemTotal = item.price * item.quantity;

        if (item.quantity === 0) {
          delete categoryItems[itemName]; // Remove item from cart if quantity is 0
          continue; // Skip further processing for this item
        }

        const listItem = document.createElement('li');
        
        // Add input box to change quantity
        const quantityInput = document.createElement('input');
        quantityInput.type = 'number';
        quantityInput.value = item.quantity;
        quantityInput.addEventListener('change', function() {
          const newQuantity = parseInt(this.value);
          const oldQuantity = item.quantity;
          const pricePerItem = itemTotal / oldQuantity;
          const priceDifference = pricePerItem * (newQuantity - oldQuantity);

          total += priceDifference;
          cartTotal.textContent = `$${total.toFixed(2)}`;

          item.quantity = newQuantity;

          updateCart();
        });

        listItem.appendChild(quantityInput);
        
        listItem.appendChild(document.createTextNode(` x ${itemName}(s) - $${itemTotal.toFixed(2)} `));

        // Add remove button to each item
        const removeButton = document.createElement('button');
        removeButton.textContent = '❌'; // Red X
        removeButton.classList.add('remove-button');
        removeButton.addEventListener('click', function() {
          const itemTotal = item.price * item.quantity;
          total -= itemTotal;
          cartTotal.textContent = `$${total.toFixed(2)}`;
          delete categoryItems[itemName];
          updateCart();
        });

        listItem.appendChild(removeButton);
        cartItemsList.appendChild(listItem);
      }
    }

    if (Object.keys(cartItems).length === 0) {
      const noItems = document.createElement('li');
      noItems.textContent = 'No items';
      cartItemsList.appendChild(noItems);
    }
  }

  const checkoutButton = document.getElementById('checkout-btn');
  checkoutButton.addEventListener('click', function() {
    alert(`Total: $${total.toFixed(2)}`);
    // Here you can implement your checkout logic, like sending data to the server.
    // For simplicity, just displaying an alert with the total.
  });
});
