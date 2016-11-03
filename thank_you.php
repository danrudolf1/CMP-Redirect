<?php
  session_start();
  $payment_status = $_SESSION['payment_status'] ?: '';
  $user_msg       = $_SESSION['user_msg'] ?: '';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Chicago Media Project | Thank you</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="style.min.css"/>
    </head>
    <body>
    <div class="container-fluid">
 
      <div class="col-sm-12 col-md-4 col-md-offset-4 text-center">
          
          <div class="panel">
             <div class="logo">
               <img src="CMPLogo315.png"/>
             </div>
           <div class="panel-heading payment-complete">
            <h3>
                <i class="glyphicon glyphicon-ok"></i>
                 <?= $payment_status ?> 
            </h3>
           </div>
            
              <div class="panel-body">
                  <p class="ty">
                    <?= $user_msg ?> 
                  </p>
              </div>
          </div>
          
     </div>
    </div>
    </body>
</html>