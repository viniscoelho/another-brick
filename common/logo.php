<div id="logo">
  <img src="images/logo.png" alt="Another Brick"
       width="610px" height="140px" />
</div>
<?php
	date_default_timezone_set('America/Halifax');
	echo "<div id='address'>
		  Welcome!<br />
		  It is ".date("l, F jS").".<br />
		  Our time is ".date("h:i a")."
		</div>";
?>