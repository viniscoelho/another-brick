<?php
  include("../common/header.php");
?>
<!--catalog.html-->
<body>
  <div id="page">
    <?php
      include("../common/logo.php");
      include("../common/mainmenu.php");
    ?>
    <div id="content">
      <div id="textRight">
        <p>Our list of categorie includes:</p>
        <div class="InnerText">
          <ul class="Styled">
            <li class="TopPadded">
              <a href="scripts/display_products.php?cat='Decor'">Decor</a>
            </li>
            <li class="TopPadded">
              <a href="scripts/display_products.php?cat='Tools'">Tools</a>
            </li>
            <li class="TopPadded">
              <a href="scripts/display_products.php?cat='Supplies'">Supplies</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <?php
      include("../common/footer.php");
    ?>
  </div>
</body>
</html>
