<!Doctype HTML>
<html>
<head>
<link rel="icon" href="logo.jpg" />
<link rel="stylesheet" href="register.css" />
<link rel="stylesheet" href="login.css" />
<link rel="stylesheet" href="back.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="everyfont.css" />
<title>Information Systems | Registration</title>
</head>
<style>
@viewport {
zoom: 1.0;
width: extend-to-zoom;
}

@-ms-viewport {
width: extend-to-zoom;
zoom: 1.0;
}
</style>
<body bgcolor="#121212">
<button id="back-btn" style="font-size: 20px;" onclick="location='login.php'">Login</button>
<div id="block"></div>
<a>Registration</a>
<div id="block"></div>
<form action="regadd.php" method="POST">
<input type="text" name="username" placeholder="Username" required />
<div id="space"></div>
<input type="password" name="password" placeholder="Password" required />
<div id="space"></div>
<input type="email" name="email" placeholder="Email" required />
<div id="space"></div>
<input type="number" name="age" placeholder="Age" required />
<div id="space"></div>
<input type="number" name="phone" placeholder="Phone Number" required />
<div id="space"></div>
<button id="submit">Register</button>
</form>
</body>
</html