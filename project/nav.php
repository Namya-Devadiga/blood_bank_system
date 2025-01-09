
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blood Donation Page</title>
<style>
/* Resetting default margin and padding */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Styling the navigation bar */
.navbar {
  background-color: #8B0000; /* Dark red background */
  overflow: hidden;
}

.navbar a {
  float: left;
  display: block;
  color: #fff; /* White text color */
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
  font-size: 18px;
}

.navbar a:hover {
  background-color: #B22222; /* Darker red on hover */
}

.navbar a.active {
  background-color: #800000; /* Darkest red for active link */
}

/* Adding some spacing around the navigation bar */
.container {
  margin-top: 20px;
}
</style>
</head>
<body>

<!-- Navigation Bar -->
<div class="navbar">
  
  <a href="index.html" <?php if($page=='login') { ?>class="active"<?php } ?>> Login </a>
  <a href="register.html" <?php if($page=='register') { ?>class="active"<?php } ?>> Register </a>
  <a href="contact.html" <?php if($page=='contact') { ?>class="active"<?php } ?>> Contact </a>
</div>
</body>
</html>