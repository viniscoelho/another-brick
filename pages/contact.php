<?php
  include("../common/header.php");
?>
<!--contact.html-->
<body>
  <div id="page">
    <?php
      include("../common/logo.php");
      include("../common/mainmenu.php");
    ?>
    <div id="content">
      <div class="InnerTextWide">
        <h3 class="Padded">
          Do you have any comments and/or suggestions?<br />
          We want to hear from you!</h3>
        <br /><hr /><br />
        <form id="feedbackForm" action="scripts/feedback_process.php" method="post">
          <?php
            include("../scripts/feedback_check.php");
          ?>
          <div>
            <ul class="Styled">
              <li class="BottomPadded">
                <strong>Name:</strong>
                <br />
                <input type="text" name="sender_name" size="50" />
              </li>
              <li class="BottomPadded">
                <strong>Or check here if you want it anonymous:</strong>
                <input type="checkbox" name="sender_anonymous" value="yes" />
              </li>
              <li class="BottomPadded">
                <strong>E-mail Address:</strong>
                <br />
                <input type="text" name="sender_email" size="50" />
              </li>
              <li class="BottomPadded">
                <strong>Phone Number (Only numbers):</strong>
                <br />
                <input type="text" name="sender_phone" size="25"
                       onkeypress="return OnlyNumbers(event)"
                       onkeyup="return OnlyNumbers(event)"
                       onkeydown="return OnlyNumbers(event)" />
              </li>
            </ul>
          </div>

          <div class="BottomPadded">
            <strong>Rate the appearance of our website.</strong>
            <ul class="Styled">
              <li>
                <input id="great" type="radio" name="appearance"
                       value="Great" /> Great!<br />
              </li>
              <li>
                <input id="good" type="radio" name="appearance"
                       value="Good" /> Good.<br />
              </li>
              <li>
                <input id="regular" type="radio" name="appearance"
                       value="Regular" /> Not so bad.<br />
              </li>
              <li>
                <input id="terrible" type="radio" name="appearance"
                       value="Terrible" /> Just terrible.
              </li>
            </ul>
          </div>

          <div class="BottomPadded">
            <strong>Would you recommend our website?</strong>
            <ul class="Styled">
              <li>
                <input id="rYes" type="radio" name="recommend"
                       value="Yes" /> For sure!<br />
              </li>
              <li>
                <input id="rMaybe" type="radio" name="recommend"
                       value="Maybe" /> I don't know.<br />
              </li>
              <li>
                <input id="rNo" type="radio" name="recommend"
                       value="No" /> No.
              </li>
            </ul>
          </div>

          <div class="BottomPadded">
            <strong>Rate your experience buying our products:</strong>
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
			  
            <ul id="selectedOptions" class="Styled">
              <li></li>
            </ul>
          </div>

          <div class="BottomPadded">
            <input type="submit" value="Send Feedback" />
            <input type="reset" value="Reset Form" onclick="ClearList();" />
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