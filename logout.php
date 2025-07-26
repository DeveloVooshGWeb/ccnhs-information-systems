<!doctype HTML>
<html>
<head>
<link rel="icon" href="logo.jpg" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="everyfont.css" />
<title>Information Systems | Logout</title>
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
<body>
</body>
<script>
if (localStorage.Logged == "false") {
window.location = "index.php";
} else {
if (<?php echo $_GET['confirm'] ?> == 1) {
confirmed = confirm("You Are About To Logged Out As " + atob(localStorage.Account) + "!!!");
if (confirmed == true) {
localStorage.setItem("Logged", "false");
localStorage.setItem("isAdmin", "false");
localStorage.removeItem("Account");
window.location = "index.php";
} else {
window.location = "index.php";
}
}
}
</script>
</html>