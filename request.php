<!Doctype HTML>
<html>
<head>
<link rel="icon" href="logo.jpg" />
<link rel="stylesheet" href="req.css" />
<link rel="stylesheet" href="login.css" />
<link rel="stylesheet" href="back.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="everyfont.css" />
<title>Information Systems</title>
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
<button id="back-btn" style="font-size: 20px;" onclick="location='index.php'">Back</button>
<div id="block"></div>
<a>Request</a>
<div id="block"></div>
<form action="comreq.php" method="POST">
<input type="text" name="title" placeholder="Title" required />
<div id="space"></div>
<input type="text" name="comment" placeholder="Comment" required />
<div id="space"></div>
<input type="text" name="username" placeholder="Username" id="autoins" required />
<input type="password" name="password" placeholder="Password" required />
<div id="space"></div>
<input type="text" name="firstname" placeholder="Firstname" required />
<div id="space"></div>
<input type="text" name="middlename" placeholder="Middlename" required />
<div id="space"></div>
<input type="text" name="initial" placeholder="Initial" required />
<div id="space"></div>
<input type="text" name="lastname" placeholder="Lastname" required />
<div id="space"></div>
<input type="number" name="age" placeholder="Age" required />
<div id="space"></div>
<input type="text" name="gender" placeholder="Gender/Sex" required />
<div id="space"></div>
<input type="number" name="grade" placeholder="Grade" required />
<div id="space"></div>
<input type="text" name="section" placeholder="Section" required />
<div id="space"></div>
<input type="number" name="sy" placeholder="School Year" required />
<div id="space"></div>
<input type="text" name="lrn" placeholder="LRN" required />
<div id="space"></div>
<button id="submit">Request</button>
</form>
</body>
<script>
if (localStorage.Logged == "false" || localStorage.isAdmin == "true") {
window.location = "index.php";
}

document.querySelector("#autoins").value = localStorage.Account;
</script>
</html>