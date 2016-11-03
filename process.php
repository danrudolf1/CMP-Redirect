<?php
  session_start();
  if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    die('Invald request');
  }
  require('./config.php');
  use Parse\ParseObject;
  use Parse\ParseRelation;
  use Parse\ParseQuery; 
  use Parse\ParseUser;
  
  $token  = $_POST['stripeToken'] ?: ''; // you can stub params in these ''  for testing...
  $email  = $_POST['stripeEmail'] ?: '';
  $amount = $_POST['amount'] ?: '0';
  $name   = $_POST['name'] ?: '';
  $film   = $_POST['film'] ?: '';
  $id     = $_POST['id'] ?: '';
  
  $customer = \Stripe\Customer::create(array('email' => $email,'card'  => $token));
  $chargeParams = array(
      'customer' => $customer->id,
      'amount'   => $amount,
      'currency' => 'usd',
      'description' => $name,
      'receipt_email' => $email
  );
  
  $query = ParseUser::query();
  $donatedFilm = new ParseObject('Film', $film);
  $transaction = new ParseObject('Transaction'); 
  $transaction->set('amount', (int)$amount);
  $transaction->set('film', $donatedFilm);

  try{
 
    $query->equalTo("objectId", $id); 
    $results = $query->find();
    $transaction->set("contributor", current($results));
    $transaction->save();    
    $charge = \Stripe\Charge::create($chargeParams);
          
    $_SESSION['payment_status'] = 'Payment Complete!';
    $_SESSION['user_msg'] = 'Thank you for your donation';
   
  }catch(Exception $e){    

    switch(true){
        case $e instanceof ParseException:
          $_SESSION['payment_status'] = 'Parse Error';
        break;
        case $e instanceof Stripe_Error: 
          $_SESSION['payment_status']= 'Stripe Error'; 
        break;
    }
    
    $_SESSION['user_msg'] = 'Unable to complete transaction';
  }

  header('Location: thank_you.php');
  exit();
?>