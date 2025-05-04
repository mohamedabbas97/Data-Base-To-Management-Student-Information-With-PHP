<?php
session_start();

?>

<html>
<head>
<link rel="stylesheet" href="index.css">
</head>
<body>
  <script>
    alert("اهلا وسهلاً")
  </script>

<div class="navbar">
  <div class="logo">مدرسة اشبال الجوادين</div>
  <ul class="links">
    <li><a href="#">Home</a></li>
    <li><a href="#">Contact</a></li>
    <li><a href="#">Forget password</a></li>
  </ul>
</div>
<br> <br>

<div class="login-container">
<h2 class="login">Login</h2>
<form action="cheacklogin.php" method="POST">
<label for="username">Username</label>
<input type="text" id="username" name="username" placeholder="Enter username" required>

<label for="password">Password</label>
<input type="password" id="password" name="password" placeholder="Enter password" required>

<button type="submit" name="login">Login</button>
</form>
</div>
<br> <br> <br><br> <br> 
<div class="footer">
  <div class="copy">© MK</div>
  <div class="social">
    <a href="#"><img src="facebook.png" alt="Facebook"></a>
    <a href="#"><img src="instagram.png" alt="Instagram"></a>
  </div>
</div>

</body>
</html>

