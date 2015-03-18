<?php
  include("../common/header.php");
?>
<!--buy.html-->
<body>
  <div id="page">
    <?php
      include("../common/logo.php");
      include("../common/mainmenu.php");
    ?>
    <div id="content">
      <div id="textWide">
        <form id="shoppingForm" action="">
          <?php
            include("../scripts/change_product.php");
          ?>
          <div class="InnerTextWide">
            <div class="Categorie">
              <strong>Choose a category:</strong>
              <select id="categorie" class="RightOriented"
                      onchange="ChangeProductsList();">
                <option></option>
                <option value="Decor">Decor</option>
                <option value="Tools">Tools</option>
                <option value="Supplies">Supplies</option>
              </select>
            </div>
            <div class="Products">
              <strong>Choose a product:</strong>
              <select id="products" class="RightOriented"
                      onchange="selectProduct(this);">
                <option></option>
              </select>
            </div>
            <div class="Products">
              <strong>Choose a color:</strong>
              <select id="productscolors" class="RightOriented"
					  onchange="createUlElements(this);">
                <option></option>
              </select>
            </div>
            <ul id="selectedOptions" class="Styled">
              <li></li>
            </ul>
          </div>
          <div id="buttons">
            <input type="submit" value="Add to cart"
                   onclick="DisplayOrder()" />
            <input type="reset" value="Reset" onclick="ClearList();" />
          </div>
        </form>
      </div>
    </div>
    <?php
      include("../common/footer.php");
    ?>
  </div>
</body>
</html>
