<?php
  include("../common/header.php");
?>
<!--feedback_process.php-->
<body>
  <div id="page">
  <?php
    include("../common/logo.php");
    include("../common/mainmenu.php");
    
    echo "<div id='content'>
            <div id='textLeft'>";
	
	function validateName($n)
	{
		$valid_name = preg_match("/^[-'\w\s]+$/", $n);
		return $valid_name;
	}

	function validateEmail($a)
	{
		$valid_email = preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})$/", $a);
		if ($valid_email == 1) return TRUE;
		else return FALSE;
	}

	function validatePhone($p)
	{
		$valid_phone1 = preg_match("/^\d{10}$/", $p);
		$valid_phone2 = preg_match("/^\d{7}$/", $p);
		if ($valid_phone1 == 1 || $valid_phone2 == 1) return TRUE;
		else return FALSE;
	}

	$flag = "yes";
    $resp = "<p>";
	//if the anonymous box is checked, ignore the name
	if (isset($_POST[sender_anonymous]) == FALSE)
	{
		if (validateName($_POST[sender_name]) == 0)
		{
			$resp .= "Invalid first name!\n";
			$flag = "no";
		}
	}

	if (validateEmail($_POST[sender_email]) == FALSE)
	{
		$resp .= "Invalid e-mail address!\n";
		$flag = "no";
	}

	if (validatePhone($_POST[sender_phone]) == FALSE)
	{
		$resp .= "Invalid phone number!\n";
		$flag = "no";
	}

	if (isset($_POST[appearance]) == FALSE)
	{
		$resp .= "No option selected for: \"Rate the appearance of our website\"\n";
		$flag = "no";
	}

	if (isset($_POST[recommend]) == FALSE)
	{
		$resp .= "No option selected for: \"Would you recommend our website\"\n";
		$flag = "no";
	}

	//check the selected products that have options selected
	$product_review = "";

	for ( $i = 0; $i < count($products_id); $i++ )
	{
		$r = "ratio" . $products_id[$i];	//to access the ratio feedback
		$p = "price" . $products_id[$i];	//to access the price feedback
		$c = "comments" . $products_id[$i];	//to access the comments feedback
		
		//access the created products using POST
		if ( isset($_POST[$r]) && isset($_POST[$p]) ){
			$product_review .= "\nProduct Name:       " . $products_name[$i];
			$product_review .= "\nExperience Rate:    " . $_POST[$r];
			$product_review .= "\nProduct Price:      " . $_POST[$p];
			$product_review .= "\nComments:\n" . $_POST[$c] . "\n"; 
		}
	}

	if ($flag == "no"){
        $resp .= "</p>";
		echo nl2br($resp);
    }
	else
	{
		$msg_business = "Another Brick - Construction Supplies Feedback\n\n";
		if (isset($sender_anonymous) == FALSE)
			$msg_business .= "Sender's Name:      " . $_POST[sender_name] . "\n";
		$msg_business .= "Sender's E-Mail:    " . $_POST[sender_email] . "\n";
		$msg_business .= "Sender's Phone:     " . $_POST[sender_phone] . "\n";
		$msg_business .= "Appearance:         " . $_POST[appearance] . "\n";
		$msg_business .= "Recommendation:     " . $_POST[recommend] . "\n";
		$msg_business .= $product_review;
		
		$msg_sender = "You sent a feedback to Another Brick - Construction Supplies\n\n";
		if (isset($_POST[sender_anonymous]) == FALSE)
			$msg_sender .= "Your Name:          " . $_POST[sender_name] . "\n";
		$msg_sender .= "Your E-Mail:        " . $_POST[sender_email] . "\n";
		$msg_sender .= "Your Phone:         " . $_POST[sender_phone] . "\n";
		$msg_sender .= "Appearance:         " . $_POST[appearance] . "\n";
		$msg_sender .= "Recommendation:     " . $_POST[recommend] . "\n";
		$msg_sender .= $product_review;
		
		$to = "jdm-marking@eastlink.ca";
        //$to = "vini.martins.7@gmail.com";
		$subject = "Another Brick Feedback";
		$mailheaders = "From: csc35505\n";
		$mailheaders .= "Reply-To: " . $_POST[sender_email] . "\n\n";
        //mail the business
		mail($to, $subject, $msg_business, $mailheaders);
        //mail the person
        mail($_POST[sender_email], $subject, $msg_sender, $mailheaders);
		
		//write to file
		$filename = "../data/feedback.txt";
		$string_to_file = "------------------------------------------------------------\n";
		$string_to_file .= $msg_business;
		$string_to_file .= "------------------------------------------------------------\n";
		$newfile = fopen($filename, "a+")
			or die("Couldn't open file $filename.");
		fwrite($newfile, $string_to_file)
			or die("Couldn't write to file $filename.");
		fclose($newfile);
		
		echo nl2br("<p>Thank you!\nYour feedback was successfully sent.</p>");
	}
    
    echo "</div>
        </div>";
    
    include("../common/footer.php");
  ?>
  </div>
</body>
</html>
