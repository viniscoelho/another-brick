<?php
  include("../common/header.php");
?>
<!--featured.html-->
<body>
  <div id="page">
    <?php
      include("../common/logo.php");
      include("../common/mainmenu.php");
    ?>
    <div id="content">
      <div id="textRight">
        <p>
			Our list of featured products include(s):
        </p>
		<?php
          echo "<ul class='BottomPadded LeftPadded'>";
          $m = max($invoice_products);
          foreach ( $invoice_products as $k => $v )
          {
              foreach ( $id_with_name as $kp => $vp )
              {
                  if ( $k == $kp and $v == $m )
                    echo "<li>".$vp."</li>";
              }
          }
          echo "</ul>";
        ?>
      </div>
    </div>
    <?php
      include("../common/footer.php");
    ?>
  </div>
</body>
</html>
