<?php
  include("../common/header.php");
?>
<!--suppliers.html-->
<body>
  <div id="page">
    <?php
      include("../common/logo.php");
      include("../common/mainmenu.php");
    ?>
    <div id="content">
      <div id="textRight">
        <p>Here is our list of suppliers:</p>
		<?php
			echo "<ul class='BottomPadded LeftPadded'>";
			for ($i = 0; $i < count($suppliers); $i++ )
			{
				echo "<li class='TopPadded'>" . $suppliers[$i] . "<br />Phone: "
					. $suppliers_phone[$i] . "<br /></li>";
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
