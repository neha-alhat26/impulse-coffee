<?php

$customer_name = $_POST['customer_name'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thank You!</title>
    <link rel="stylesheet" href="coffee.css">
    <style>
        
        body {
            background-color: #F4F5F1;
            font-family: 'Trebuchet MS', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            margin: 0;
        }
        .thank-you-box {
            background-color: #fff;
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            border-top: 5px solid #9C4B4B;
        }
        .thank-you-box h1 {
            font-family: 'MV Boli', cursive;
            color: #9C4B4B;
            font-size: 38px;
        }
        .thank-you-box p {
            font-size: 18px;
            color: #333;
        }
        .thank-you-box a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 24px;
            background-color: #9C4B4B;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    
 <div class="top-bar">
    <div class="logo"><strong>Impulse Coffee</strong></div>
    <div class="nav-links">
      <strong>
        <!-- CORRECTED LINKS: Using relative paths that work on a server -->
        <span>
          <a href="index.html" class="auto-style2">Home</a></span> |
        <span>
          <a href="shop.html" class="auto-style2">Shop</a></span> |
        <span>
          <a href="about.html" class="auto-style2">About</a></span> |
        <span>
          <a href="contact.html" class="auto-style2">Contact</a></span>
      </strong>
    </div>
  </div>

    <div class="thank-you-box">

        <h1>Thank You, <?php echo $customer_name; ?>!</h1>
        
        <p>Your subscription is confirmed. Get ready for a brew-tiful journey with us!</p>
       
        <a href="impulse_coffees.html">Go Back to Homepage</a>
    </div>

</body>
</html>

