<?php
$select = 0;
$selectadmin = 0;
$pword = 0;
if (isset($_POST['password'])) {
$con = mysqli_connect("localhost", "83825", "test1234");
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
mysqli_select_db($con, "83825");
$select = mysqli_query($con, "SELECT * FROM accounts WHERE Username='". $username ."' AND Password='". $password ."'");
$finalResult = mysqli_num_rows($select);
$selectadmin = mysqli_fetch_assoc($select)['isAdmin'];
if ($finalResult > 0) {
echo "<h6 id='hidden' class='setLogged'>true</h6>";
echo "<h6 id='hidden' class='setUsername'>". $username ."</h6>";
} else {
echo "<div id='block'></div>";
echo "<p>Invalid Credentials!!!</p>";
}
}

$logout = 0;

if (isset($_GET['u'])) {
} else {
$logout = 1;
}
?>

<!Doctype HTML>
<html>
<head>
<link rel="icon" href="logo.jpg" />
<link rel="stylesheet" href="login.css" />
<link rel="stylesheet" href="back.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="point.css" />
<link rel="stylesheet" href="everyfont.css" />
<title>Information Systems | Login</title>
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
<button id="back-btn" onclick="location='index.php'">Back</button>
<div id="block"></div>
<form action="#" method="POST">
<input type="text" name="username" placeholder="Username" required />
<div id="space"></div>
<input type="password" name="password" placeholder="Password" required />
<div id="space"></div>
<button id="submit">Login</button>
<script>
document.querySelector("#submit").addEventListener("click", function() {
localStorage.Attempts = parseInt(localStorage.Attempts) + 1;
})
</script>
</form>
<div id="block"></div>
<a onclick="location='register.php'" class="point">Don't Have An Account? Click Here</a>
</body>
<script>
clearag();

function clearag() {
requestAnimationFrame(clearag);
console.clear();
}
</script>
<script>
if (localStorage.Logged == "true") {
if (<?php echo $logout ?> == 1) {
localStorage.setItem("Logged", "false");
localStorage.setItem("isAdmin", "false");
localStorage.removeItem("Account");
alert("You Are About To Be Logged Out!!!\nYou Cannot Do Anything!!!");
window.location = "index.php";
}
}

lesgoboi();

function lesgoboi() {
requestAnimationFrame(lesgoboi);
if (document.querySelector(".setLogged") && document.querySelector(".setUsername")) {
logval = document.querySelector(".setLogged").textContent;
userval = document.querySelector(".setUsername").textContent;
if (logval == "true") {
localStorage.setItem("Logged", logval);
localStorage.setItem("Account", btoa(userval));
}
if (<?php echo $selectadmin ?> == 1) {
localStorage.isAdmin = "true";
}
localStorage.Attempts = 0;
setTimeout(() => {
window.location = "index.php";
}, 800)
}
}

timedelay = 60;
once = 1;

checkagainaaa();

function checkagainaaa() {
if (parseInt(localStorage.Attempts) > 3 && once == 1) {
once = 0;
countdown();
} else {
checkagainaaa();
}
}

function countdown() {
window.setInterval(() => {
document.querySelector("body").style.backgroundColor = "white";
document.querySelector("body").innerHTML = "<run>You Have Failed Many Attempts!!! Please Wait " + timedelay  + " Seconds And Stay In This Website To Re-enter An Account</run>";
document.querySelector("run").style.color = "black";
document.querySelector("run").style.fontSize = "24px";
if (timedelay <= 0) {
localStorage.Attempts = 0;
window.location = "login.php";
}
if (timedelay > 0) {
timedelay--;
}
}, 1000)
}
</script>
</html>