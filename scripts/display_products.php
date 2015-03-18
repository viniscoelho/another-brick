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
        <p>Our list of products includes:</p>
        <div class="TopPadded BottomPadded">
          <?php
            echo "<table>";
            echo "<tr>";
            echo "<th>Product</th>";
            echo "<th>Description</th>";
            echo "<th>Price</th>";
            echo "<th>In stock</th>";
            echo "</tr>";
            for ( $i = 0; $i < count($categorie_name); $i++ )
            {
                $category = "'".$categorie_name[$i]."'";
                if ( $_GET[cat] == $category )
                {
                    echo "<tr>";
                    echo "<td>" . $products_name[$i] . "</td>";
                    echo "<td>" . $description[$i] . "</td>";
                    echo "<td>$" . $prices[$i] . ".00</td>";
                    echo "<td>" . $stock[$i] . "</td>";
                    echo "</tr>";
                }
            }
            echo "</table>";
          ?>
        </div>
      </div>
    </div>
    <?php
      include("../common/footer.php");
    ?>
  </div>
</body>
</html>
