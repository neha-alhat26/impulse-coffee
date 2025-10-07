<?php
// This is a simple student-style way to handle a form.
// We create a variable to check if the form has been submitted yet.
$form_submitted = false;
$customer_name = '';

// This PHP block checks if the page received data from a form using the "POST" method.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Check that the name and email are not empty.
    if (!empty($_POST['customer_name']) && !empty($_POST['customer_email'])) {
        // If they are not empty, it means the form was submitted successfully.
        $form_submitted = true;
        
        // We get the customer's name and store it in a variable.
        // htmlspecialchars() is a good habit to prevent some basic security issues.
        $customer_name = htmlspecialchars($_POST['customer_name']);
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Language" content="en-in" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Coffee</title>
  <style>
    body {
      background-color: #F4F5F1;
      margin: 0;
      padding: 0;
      font-family: 'Trebuchet MS', sans-serif;
    }

    /* --- This is the new style for our Thank You Card --- */
    .thank-you-card {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        text-align: center;
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
    /* --- All your original CSS is below --- */

    .top-bar {
      height: 55px;
      background-color: #FFFFFF;
      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
      z-index: 1000;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 30px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .logo {
      font-size: xx-large;
      font-family: "MV Boli";
      color: #9C4B4B;
    }

    .nav-links {
      font-size: large;
      color: #9C4B4B;
    }

    .nav-links strong span {
      margin: 0 10px;
      cursor: pointer;
      transition: color 0.3s;
    }

    .nav-links strong span:hover {
      color: #6c2e2e;
    }

    .hero {
      height: 675px;
      width: 100%;
      background-image: url('https://placehold.co/1200x700/66432d/ffffff?text=Coffee+Beans');
      overflow: hidden;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      margin-top: 65px;
      position: relative;
    }

    .hero-content {
      background-color: rgba(255, 255, 255, 0.85);
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 60%;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      transition: left 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .hero-content.shifted {
      left: 28%;
    }

    .hero h1 {
      font-size: 38px;
      font-family: 'MV Boli', cursive;
      color: #9C4B4B;
      margin-bottom: 10px;
    }

    .hero p {
      font-size: 18px;
      color: #333;
      margin-bottom: 20px;
    }

    .hero-btn {
      display: inline-block;
      padding: 12px 24px;
      background-color: #9C4B4B;
      color: #fff;
      font-size: 16px;
      text-decoration: none;
      border-radius: 8px;
      transition: background-color 0.3s ease;
      border: none;
      cursor: pointer;
    }

    .hero-btn:hover {
      background-color: #6c2e2e;
    }

    .join-us-form {
      position: absolute;
      top: 50%;
      left: 150%;
      transform: translate(-50%, -50%);
      background-color: rgba(255, 255, 255, 0.85);
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      width: 80%;
      max-width: 450px;
      text-align: center;
      opacity: 0;
      transition-property: left, opacity;
      transition-duration: 0.8s;
      transition-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .join-us-form.visible {
      left: 72%;
      opacity: 1;
    }

    .join-us-form h2 {
      font-size: 32px;
      font-family: 'MV Boli', cursive;
      color: #9C4B4B;
      margin-top: 0;
      margin-bottom: 10px;
    }

    .join-us-form form {
      display: flex;
      flex-direction: column;
      gap: 15px;
      margin-top: 20px;
    }

    .join-us-form input {
      padding: 12px;
      border-radius: 8px;
      border: 1px solid #ddd;
      font-size: 16px;
      font-family: 'Trebuchet MS', sans-serif;
    }

    .join-us-form input:focus {
      outline: none;
      border-color: #9C4B4B;
    }

    section {
      padding: 60px 30px;
      text-align: center;
    }

    .section-title {
      font-size: 36px;
      color: #9C4B4B;
      font-family: "MV Boli";
      margin-bottom: 20px;
    }

    .section-text {
      font-size: 18px;
      max-width: 700px;
      margin: 0 auto;
      color: #333;
    }

    .card-container {
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
      margin-top: 40px;
    }

    .card {
      background-color: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      width: 250px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .card h3 {
      color: #9C4B4B;
      margin-bottom: 10px;
      font-family: 'MV Boli';
    }

    .card p {
      font-size: 15px;
      color: #444;
    }

    .footer {
      background-color: #fff;
      color: #9C4B4B;
      text-align: center;
      padding: 20px 10px;
      font-size: 14px;
      border-top: 1px solid #ccc;
    }

    .footer a {
      color: #9C4B4B;
      text-decoration: none;
      margin: 0 10px;
    }

    .footer a:hover {
      text-decoration: underline;
    }

    .auto-style2 {
      text-decoration: none;
      color: #9C4B4B;
    }
    
    .animate-on-scroll {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }

    .animate-on-scroll.is-visible {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>

<body>

  <?php if ($form_submitted == false): ?>
    <!-- If the form was NOT submitted, we show the entire website. -->
    
    <div class="top-bar">
      <div class="logo"><strong>Impulse Coffee</strong></div>
      <div class="nav-links">
        <strong>
          <!-- It's better to use relative paths like "./index.php" instead of full C:\ paths -->
          <span><a href="index.php" class="auto-style2">Home</a></span> |
          <span><a href="#" class="auto-style2">Shop</a></span> |
          <span><a href="#" class="auto-style2">About</a></span> |
          <span><a href="#" class="auto-style2">Contact</a></span>
        </strong>
      </div>
    </div>

    <div class="hero">
      <div class="hero-content">
        <h1>Welcome to Impulse Coffee</h1>
        <p>Your daily ritual, redefined. Crafted with passion, served with warmth.</p>
        <button id="exploreBtn" class="hero-btn">Explore Our Blends</button>
      </div>
      <div class="join-us-form">
        <h2>Join Our Community</h2>
        <p>Get the latest blends and offers delivered to your inbox.</p>
        <!-- The form now submits to this same page (index.php) -->
        <form id="joinForm" method="post" action="index.php">
          <input type="text" name="customer_name" placeholder="Your Name" required>
          <input type="email" name="customer_email" placeholder="Your Email" required>
          <button type="submit" class="hero-btn">Subscribe</button>
        </form>
      </div>
    </div>

    <section class="animate-on-scroll">
      <div class="section-title">Our Story</div>
      <div class="section-text">
        Born from a love for comfort and caffeine, Impulse Coffee is where every cup tells a story. We believe coffee isn't just a drink—it's a pause, a hug, a fresh start.
      </div>
    </section>

    <section class="animate-on-scroll">
      <div class="section-title">Signature Blends</div>
      <div class="card-container">
        <div class="card">
          <img src="https://placehold.co/250x200/d4c1a9/66432d?text=Mocha" alt="Midnight Mocha" style="width:100%; height:200px; object-fit:cover; border-radius:8px;">
          <h3>Midnight Mocha</h3>
          <p>Rich cocoa and espresso swirled for that late-night vibe.</p>
        </div>
        <div class="card">
          <img src="https://placehold.co/250x200/f0e4d1/66432d?text=Vanilla" alt="Vanilla Sunrise" style="width:100%; height:200px; object-fit:cover; border-radius:8px;">
          <h3>Vanilla Sunrise</h3>
          <p>Light, creamy and smooth — perfect for slow mornings.</p>
        </div>
        <div class="card">
          <img src="https://placehold.co/250x200/a38b6f/66432d?text=Bold" alt="Impulse Bold" style="width:100%; height:200px; object-fit:cover; border-radius:8px;">
          <h3>Impulse Bold</h3>
          <p>A punch of dark roast for unstoppable energy and flavor.</p>
        </div>
      </div>
    </section>

    <section class="animate-on-scroll">
      <div class="section-title">Visit Us</div>
      <div class="section-text">
        Come say hi at our café in the heart of the city. Cozy corners, warm brews, and friendly faces await ☕✨
      </div>
    </section>

    <div class="footer">
      <p>&copy; 2025 Impulse Coffee. All rights reserved.</p>
      <p>
        <a href="#">Instagram</a> |
        <a href="#">Pinterest</a> |
        <a href="#">Facebook</a>
      </p>
    </div>

  <?php else: ?>
    <!-- If the form WAS submitted, we only show this thank you card. -->
    
    <div class="thank-you-card">
        <div class="thank-you-box">
            <h1>Thank You, <?php echo $customer_name; ?>!</h1>
            <p>Your subscription is confirmed. Get ready for a brew-tiful journey with us!</p>
            <a href="index.php">Go Back to Homepage</a>
        </div>
    </div>

  <?php endif; ?>


  <!-- JavaScript for the animation -->
  <script>
    // This script will only run if the form has not been submitted yet.
    <?php if ($form_submitted == false): ?>
    
      // Animation for hero section form
      const exploreBtn = document.getElementById('exploreBtn');
      const heroContent = document.querySelector('.hero-content');
      const joinForm = document.querySelector('.join-us-form');

      exploreBtn.addEventListener('click', (event) => {
        event.preventDefault();
        heroContent.classList.add('shifted');
        joinForm.classList.add('visible');
      });

      // Animation for sections on scroll
      const scrollElements = document.querySelectorAll(".animate-on-scroll");
      
      let observer = new IntersectionObserver((entries, observer) => {
          entries.forEach(entry => {
              if (entry.isIntersecting) {
                  entry.target.classList.add("is-visible");
                  observer.unobserve(entry.target);
              }
          });
      }, { threshold: 0.1 });

      scrollElements.forEach(element => {
          observer.observe(element);
      });
      
      // I have removed the JavaScript for the pop-up message because
      // the PHP thank you card is doing that job now.

    <?php endif; ?>
  </script>

</body>

</html>
