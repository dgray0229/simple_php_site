<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING));
  $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
  $details = trim(filter_input(INPUT_POST, "details", FILTER_SANITIZE_SPECIAL_CHARS));

  require("inc/phpmailer/class.phpmailer.php");

  $mail = new PHPMailer;

  if(!$mail->validateAddress($email)) {
    echo "Invalid Email Address";
    exit;
  }


  if($_POST["address"] != "") {
    echo "Bad form input";
    exit;
  }

  $email_body = "";
  $email_body .= "Name: " . $name . "\n";
  $email_body .= "Email: " . $email . "\n";
  $email_body .= "Details: " . $details . "\n";

  if ($name == "" || $email == "" || $details == "") {
    echo "Please fill in the required fields: Name, Email, and Details";
    exit;
  }

  //PHPMailer
  $mail->setFrom($email, $name);
  $mail->addAddress('devin.gray92@gmail.com', 'Devin Gray');     // Add a recipient

  $mail->isHTML(false);                                  // Set email format to HTML

  $mail->Subject = 'Personal Media Library Suggestion from ' . $name;
  $mail->Body    = $email_body;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    exit;
}
  header('location:suggest.php?status=thanks');
}

$pageTitle = 'Suggest a Media Item';
$section = 'suggest';

include 'inc/header.php';

?>
<div class="section page">
  <div class="wrapper">
    <h1><?php echo $pageTitle; ?></h1>

    <?php if (isset($_GET["status"]) && $_GET["status"] == "thanks") {
      echo "<p>Thanks for the email! I&rsquo;ll check out your suggestion shortly!</p>";
    } else {?>

    <p>If youthink there is something I&rsquo;m missing, let me know! Complete the form to send me an email.</p>
    <form method="post" action="suggest.php">
      <table>
        <tr>
          <th><label for="name">Name: </label></th>
          <td><input type="text" name="name" id="name" placeholder="Name" /></td>
        </tr>
        <tr>
          <th><label for="email">Email: </label></th>
          <td><input type="text" name="email" id="email" placeholder="Email" /></td>
        </tr>
        <tr style="display:none">
          <th><label for="address">Email: </label></th>
          <td><input type="text" name="address" id="address" placeholder="address" />
          <p>Please leave this field blank!</p></td>
        </tr>
        <tr>
          <th><label for="name">Suggest Item Details: </label></th>
          <td><textarea name="details" id="details"></textarea></td>
        </tr>
      </table>
      <input type="submit" value="Send" />
    </form>
    <?php } ?>
  </div>
</div>
<?php include 'inc/footer.php';?>
