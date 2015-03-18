<?php
  include("../common/header.php");
?>
<!--howtobuy.html-->
<body>
  <div id="page">
    <?php
      include("../common/logo.php");
      include("../common/mainmenu.php");
    ?>
    <div id="content">
      <div id="textRight">
        <h3>How to buy</h3>
        <p>
          Select an option from the category select field.
          You have 3 options to choose:
        </p>
        <ul class="LeftPadded">
          <li>First option is <b>Decor</b>;</li>
          <li>Second option is <b>Tools</b>;</li>
          <li>Third option is <b>Supplies</b>.</li>
        </ul>
        <p>
          Once one item is selected, the product select field
          will be filled with the available products for the chosen
          category.
          When a product is selected, it will be added to a list below,
		  unless it has an available color to choose. Once a color
          is selected, the item will be also added to the list.
          This list contains the product name, a field for <i>Quantity</i>
          and the item's value.
        </p>
        <p>Also, for each item, there is a button
          <i>Remove</i> that will remove that item from the list.
          You can add and remove a product as many times as you want,
          but there will be only one instance of the same product.
        </p>
        <p>
          Once you selected all your products, click on the button
          <i>Add to cart</i>. A pop-up will appear showing <i>only</i>
          the selected products that have quantity greater than 0.
          So, check your list before adding to your cart.
        </p>
        <p>
          Thank you and happy shopping!
        </p>
      </div>
    </div>
    <?php
      include("../common/footer.php");
    ?>
  </div>
</body>
</html>