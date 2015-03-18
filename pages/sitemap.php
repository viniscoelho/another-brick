<?php
  include("../common/header.php");
?>
<!--sitemap.html-->
<body>
  <div id="page">
    <?php
      include("../common/logo.php");
      include("../common/mainmenu.php");
    ?>
    <div id="content">
      <div id="textLeft">
        <div class="InnerText">
          <ul class="Styled">
            <li>
              <a href="pages/buy.php">Buy Now</a>
              <ol>
                <li><a href="pages/howtobuy.php">How to buy</a></li>
              </ol>
            </li>
            <li>
              <a href="pages/catalog.php">Products and Services</a> 
              <ol>
                <li><a href="pages/catalog.php">Catalog</a></li>
                <li><a href="pages/featured.php">Featured Products</a></li>
                <li><a href="pages/services.php">Services</a></li>
                <li><a href="pages/suppliers.php">Suppliers</a></li>
              </ol>
            </li>
          </ul>
        </div>
        <div class="InnerText">
          <ul class="Styled">
            <li><a href="pages/news.php">News Archive</a></li>
            <li>
              <a href="pages/about.php">About Us</a> 
              <ol>
                <li><a href="pages/vision.php">Vision and Mission</a></li>
                <li><a href="pages/employment.php">Employment Opportunities</a></li>
              </ol>
            </li>
            <li>
              <a href="pages/contact.php">Contact Us</a>
              <ol>
                <li><a href="pages/locations.php">Our Locations</a></li>
                <li><a href="pages/contact.php">Contact Us</a></li>
              </ol>
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