<?php
  include("../common/header.php");
?>
<!--locations.html-->
<body>
  <div id="page">
    <?php
      include("../common/logo.php");
      include("../common/mainmenu.php");
    ?>
    <div id="content">
      <div id="textRight">
        <p>Here is our main location:<br />
          5639 Fenwick St.<br />
          Halifax, NS B3H 1R1<br />
          Tel: (902) 580 9678
        </p>
        <div id="map-canvas"></div>
        <script async defer
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkVz8wCkq1TxfLhB8pORaUnZ-aI68lBVw&callback=initialize">
        </script>
      </div>
    </div>
    <?php
      include("../common/footer.php");
    ?>
  </div>
</body>
</html>