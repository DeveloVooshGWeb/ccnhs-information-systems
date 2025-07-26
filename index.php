<?php
/*Created By A 12 Year Old Programmer*/
$con = mysqli_connect("localhost", "83825", "test1234");
mysqli_select_db($con, "83825");
$user = "NULL!!!!!";
$pass = "NULL!!!!!";
$logout = 0;
$redirect = 0;
$insert = 0;
if (isset($_GET[str_replace("=", "", base64_encode("Username"))])) {
$user = base64_decode($_GET[str_replace("=", "", base64_encode("Username"))]);
$toscan = mysqli_query($con, "SELECT * FROM accounts WHERE Username='". $user ."'");
$results = mysqli_num_rows($toscan);
echo "<div class='profile'>";
echo "<hello>NULL</hello>";
echo "<br>";
if ($results > 0) { 
$toscan2 = mysqli_query($con, "SELECT * FROM config WHERE Username='". $user ."'");
$results2 = mysqli_num_rows($toscan2);
if ($results2 > 0) {
$getconfig = mysqli_query($con, "SELECT * FROM config WHERE Username='". $user ."'");
$icon = mysqli_fetch_assoc($getconfig)['Icon'];
echo "<img src='Profile/". $icon .".png' width='64' height='64' />";
} else {
mysqli_query($con, "INSERT INTO config VALUES (0, '". $user ."', 'Default')");
$getconfig = mysqli_query($con, "SELECT * FROM config WHERE Username='". $user ."'");
$icon = mysqli_fetch_assoc($getconfig)['Icon'];
echo "<img src='Profile/". $icon .".png' width='64' height='64' />";
}
} else {
$logout = 1;
}
echo "</div>";
} else {
$redirect = 1;
}

$ipaddress = 0;
$getip = 1;
$confirmpass = 0;

if (isset($_GET[base64_encode("ipa")])) {
$getip = 0;
$ipaddress = mysqli_real_escape_string($con, base64_decode($_GET[base64_encode("ipa")]));
$iplist = mysqli_query($con, "SELECT * FROM loggedips WHERE IP='". $ipaddress ."'");
$iplistnum = mysqli_num_rows($iplist);
if ($iplistnum > 0) {
} else {
$getmypass = mysqli_query($con, "SELECT * FROM accounts WHERE Username='". $user ."'");
if (mysqli_num_rows($getmypass) > 0) {
$pass = mysqli_fetch_assoc($getmypass)['Password'];
}
$confirmpass = 1;
}
} else {
$redirect = 1;
}

$ipcount = "";
$ipcount2 = 0;

if (isset($_GET[str_replace("=", "", base64_encode("Username"))]) && isset($_GET[base64_encode("ipa")]) && isset($_GET['INS'])) {
$confirmpass = 0;
$insert = $_GET['INS'];
$USERNAMEFORUSE = base64_decode($_GET[str_replace("=", "", base64_encode("Username"))]);
$IPADDRESSFORUSE = base64_decode($_GET[base64_encode("ipa")]);
$ipcount = mysqli_query($con, "SELECT * FROM loggedips WHERE Account='". $USERNAMEFORUSE ."'");
$ipcount2 = mysqli_num_rows($ipcount);
if ($insert == 1) {
if ($ipcount2 == 0) {
$sqlcom = "INSERT INTO loggedips VALUES (0, '". $USERNAMEFORUSE ."', '". $IPADDRESSFORUSE ."')";
mysqli_query($con, $sqlcom);
} else {
$sqlcom = "UPDATE `loggedips` SET ID=". mysqli_fetch_assoc($ipcount)['ID'] .", Account='". mysqli_fetch_assoc($ipcount)['Account'] ."', IP='". $IPADDRESSFORUSE ."'";
mysqli_query($con, $sqlcom);
}
}
}
?>

<!doctype HTML>
<html>
<head>
<link rel="icon" href="logo.jpg" />
<link rel="stylesheet" href="styles.css" />
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

img {
border: 2px solid white;
border-radius: 64px;
}
</style>
<body>
<div class="topbar">
<img src="logo.jpg" width="64" height="63" id="logo" />
</div>

<div id="show-btn">></div>

<div class="sidebar">
<p class="sidebar-btn records-btn" onclick="location='records.php'">Records</p>
</div>

<div class="profile">
<hello>NULL</hello>
<br>
</div>
</body>
<script>
if (!localStorage.Logged) {
localStorage.setItem("Logged", "false");
}
if (!localStorage.isAdmin) {
localStorage.setItem("isAdmin", "false");
}
if (!localStorage.Account) {
localStorage.setItem("Account", "");
}
if (!localStorage.Attempts) {
localStorage.setItem("Attempts", 0);
}
if (localStorage.Logged != "true") {
document.querySelector(".topbar").innerHTML += "<p class='topbar-btn login-btn'>Login</p>";
document.querySelector(".topbar").innerHTML += "<p class='topbar-btn register-btn'>Register</p>";
document.querySelector(".sidebar").innerHTML += "<p class='sidebar-btn school-btn notlogged-btn'>School</p>";
} else {
document.querySelector(".topbar").innerHTML += "<p class='topbar-btn logout-btn'>Log Out</p>";
if (localStorage.isAdmin == "true") {
document.querySelector(".sidebar").innerHTML += "<p class='sidebar-btn archived-btn'>Archived</p>";
document.querySelector(".sidebar").innerHTML += "<p class='sidebar-btn school-btn admin-btn'>School</p>";
}
if (localStorage.isAdmin != "true") {
document.querySelector(".sidebar").innerHTML += "<p class='sidebar-btn request-btn'>Request</p>";
document.querySelector(".sidebar").innerHTML += "<p class='sidebar-btn school-btn notadmin-btn'>School</p>";
}
}

if (localStorage.isAdmin) {
if (localStorage.isAdmin == "true") {
document.querySelector(".sidebar").innerHTML += "<p class='sidebar-btn requests-btn'>Requests</p>";
document.querySelector(".sidebar").innerHTML += "<p class='sidebar-btn db-btn'>DB</p>";
}
}

if (localStorage.isAdmin == "true") {
document.querySelector(".requests-btn").addEventListener("click", function() {
window.location = "allrequests.php";
})
document.querySelector(".db-btn").addEventListener("click", function() {
window.location = "db.php";
})
document.querySelector(".archived-btn").addEventListener("click", function() {
window.location = "archived.php";
})
}

if (localStorage.Logged == "true") {
document.querySelector(".logout-btn").addEventListener("click", function() {
window.location = "logout.php?confirm=1";
})
if (localStorage.isAdmin == "false") {
document.querySelector(".request-btn").addEventListener("click", function() {
window.location = "request.php";
})
}
}

if (localStorage.Logged == "false" && localStorage.isAdmin == "false") {
document.querySelector(".register-btn").addEventListener("click", function() {
window.location = "register.php";
})
document.querySelector(".login-btn").addEventListener("click", function() {
window.location = "login.php";
})
}

document.querySelector(".school-btn").addEventListener("click", function() {
window.location = "school.php";
})
</script>
<script>

if (<?php echo $confirmpass ?> == 1) {
corpass = "<?php echo "$pass" ?>";
userans = prompt("Enter The Password Of Your Account " + "<?php echo "$user" ?>");
if (userans == corpass) {
window.location = "index.php?<?php echo str_replace("=", "", base64_encode("Username")) ?>=<?php echo base64_encode($user) ?>&aXBh=<?php echo base64_encode($ipaddress) ?>&INS=1";
}
}

if (<?php echo $redirect ?> == 1) {
if (localStorage.Logged == "true") {
if (<?php echo $getip ?> == 1) {
ipadd = "0"
fetch("https://api.ipify.org/?format=json")
.then(results => results.json())
.then(data => ipadd = data.ip);
setTimeout(() => {
ipaddn = btoa(ipadd);
window.location = "index.php?<?php echo str_replace("=", "", base64_encode("Username")) ?>=<?php echo base64_encode($user) ?>&<?php echo base64_encode("ipa") ?>=" + ipaddn.replace("=", "");
}, 1000)
}
}
}

logo = document.querySelector("#logo");
logo.style.position = "absolute";
logo.style.top = "0px";
logo.style.left = innerWidth / 2 + "px";
logo.style.right = innerWidth / 2 + "px";
topbar = document.querySelector(".topbar");
topbar.style.width = innerWidth + "px";
topbar.style.height = "64px";
sidebar = document.querySelector(".sidebar");
sidebar.style.width = "100px";
sidebar.style.height = innerHeight + "px";
sidebar.style.position = "absolute";
sidebar.style.left = "-100px";
sidebar.style.top = "64px";
shownum = 0;
showbtn = document.querySelector("#show-btn");
showbtn.style.position = "absolute";
showbtn.style.top = "64px";
showbtn.addEventListener("click", function() {
shownum++
if (shownum > 1) {
shownum = 0;
}
checknum(shownum);
})

function checknum(value) {
if (value == 1) {
sidebar.style.position = "absolute";
sidebar.style.left = "0px";
sidebar.style.transition = ".5s";
showbtn.style.position = "absolute";
showbtn.style.left = "100px";
showbtn.style.transition = ".5s";
showbtn.textContent = "<";
} else if (value == 0) {
sidebar.style.position = "absolute";
sidebar.style.left = "-100px";
sidebar.style.transition = ".5s";
showbtn.style.position = "absolute";
showbtn.style.left = "0px";
showbtn.style.transition = ".5s";
showbtn.textContent = ">";
}
}

if (<?php echo $insert ?> == 1) {
setTimeout(() => {
window.location = "index.php";
}, 1000)
}

update();

function update() {
requestAnimationFrame(update);
logo.style.position = "absolute";
logo.style.top = "1px";
logo.style.left = innerWidth / 2 + "px";
logo.style.right = innerWidth / 2 + "px";
hel = document.querySelector("hello");
hel.style.color = "white";
hel.style.fontSize = "20px";
if (localStorage.Logged == "true") {
hel.textContent = "Welcome " + atob(localStorage.Account);
} else {
hel.textContent = "Please Login Or Register";
}
prof = document.querySelector(".profile");
prof.style.position = "absolute";
prof.style.left = innerWidth / 2.25 + "px";
prof.style.top = innerHeight / 2 + "px";
prof.style.textAlign = "center";
}

checkagain();

function checkagain() {
requestAnimationFrame(checkagain);
if ("<?php echo "$user" ?>" == "NULL!!!!!") {
if (localStorage.Logged == "true") {
locateToAcc();
}
}

if (localStorage.Logged == "true") {
if ("<?php echo "$user" ?>" != atob(localStorage.Account)) {
locateToAcc();
}
}

if ("<?php echo $user ?>" != "NULL!!!!!" && localStorage.Logged == "false") {
localStorage.isAdmin = "false";
localStorage.removeItem("Account");
window.location = "index.php";
}
}

function locateToAcc() {
fetch("https://api.ipify.org/?format=json")
.then(results => results.json())
.then(data => ipadd = data.ip);
setTimeout(() => {
ipadd = btoa(ipadd);
window.location = "index.php?" + btoa("Username").replace("=", "") + "=" + localStorage.Account + "&" + btoa("ipa") + "=" + ipadd.replace("=", "");
}, 1000)
}

if (<?php echo $logout ?> == 1) {
localStorage.setItem("Logged", "false");
localStorage.setItem("isAdmin", "false");
localStorage.removeItem("Account");
alert("You Are About To Be Logged Out!!!\nYou Cannot Do Anything!!!");
window.location = "index.php?";
}

if (localStorage.Logged == "true") {

timelefthour = 0;

timeleftmin = 2;

timeleftsec = 0;

timout = setTimeout(() => {
localStorage.setItem("Logged", "false");
localStorage.setItem("isAdmin", "false");
localStorage.removeItem("Account");
alert("You Have Been Logged Out");
window.location = "index.php";
clearTimeout(timout);
}, (timelefthour * 60 + timeleftmin * 60 + timeleftsec) * 1000);

addEventListener("mousemove", function() {
tout();
})

addEventListener("keypress", function() {
tout();
})

addEventListener("click", function() {
tout();
})

addEventListener("wheel", function() {
tout();
})

addEventListener("contextmenu", function() {
tout();
})

function tout() {
clearTimeout(timout);
timout = setTimeout(() => {
localStorage.setItem("Logged", "false");
localStorage.setItem("isAdmin", "false");
localStorage.removeItem("Account");
alert("You Have Been Logged Out!!!\nYou Were Idle!!!");
window.location = "index.php";
clearTimeout(timout);
}, (timelefthour * 60 + timeleftmin * 60 + timeleftsec) * 1000);
}

if (localStorage.Logged == "true") {
if ("<?php echo $user ?>" == "NULL!!!!!") {
fetch("https://api.ipify.org/?format=json")
.then(results => results.json())
.then(data => ipadd = data.ip);
setTimeout(() => {
ipadd = btoa(ipadd);
window.location = "index.php?<?php str_replace("=", "", base64_encode("Username")) ?>=" + atob(localStorage.Account) + "&<?php echo base64_encode("ipa") ?>=" + ipadd.replace("=", "");
}, 1000)
}
}

}
</script>
<script>
</script>
</html>