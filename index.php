<?php 
require_once('./config.php');
$name        = $_GET['name'] ?: '';
$amount      = $_GET['amount'] ?: '';
$film        = $_GET['film'] ?: '';
$id          = $_GET['id'] ?: '';
$description = $_GET['description'] ?: ''; 
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container-fluid">
      <div class="col-lg-12 text-center">
          <div class="page-header ">
            <h2 id="name"><?= $name ?></h2>
          </div>
          <p id="description"><?= $description ?></p>
          <h3 id="amount">$<?= ( $amount / 100 ) ?></h3>
          <form action="process.php" method="post">
  		    <input type="hidden" name="amount" value="<?= $amount; ?>" required="required"/>
          <input type="hidden" name="name" value="<?= $name; ?>" require="required"/>
          <input type="hidden" name="film" value="<?= $film;?>" require="required"/>
          <input type="hidden" name="id" value="<?= $id; ?>" require="required"/>
          
		  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		          data-key="<?= $stripe['publishable_key']; ?>"
		          data-name="<?= $name; ?>"
		          data-description="<?= $description; ?>"
		          data-amount="<?= $amount; ?>"
		          data-locale="auto"></script>
		</form>
     </div>
    </div>
    </body>
</html>