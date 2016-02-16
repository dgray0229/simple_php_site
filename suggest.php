<?php
$pageTitle = 'Suggest a Media Item';
$section = 'suggest';
 include 'inc/header.php';
 include 'inc/data.php';
 include 'inc/functions.php';
 ?>
<div class="section page">
  <div class="wrapper">
    <h1><?php echo $pageTitle; ?></h1>
    <p>If youthink there is something I&rsquo;m missing, let me know! Complete the form to send me an email.</p>
    <form method="post" action="process.php">
      <table>
        <tr>
          <th><label for="name">Name: </label></th>
          <td><input type="text" name="name" id="name" placeholder="Name" /></td>
        </tr>
        <tr>
          <th><label for="email">Email: </label></th>
          <td><input type="text" name="email" id="email" placeholder="Email" /></td>
        </tr>
        <tr>
          <th><label for="email">Suggest Item Details: </label></th>
          <td><input type="text" name="suggest" id="suggest" placeholder="suggest" /></td>
        </tr>
        <tr>
          <th><label for="email">Suggest Item Details: </label></th>
          <td><textarea name="details" id="details"></textarea></td>
        </tr>
      </table>
      <input type="submit" value="Send" />
    </form>
  </div>
</div>
<?php include 'inc/footer.php';?>
