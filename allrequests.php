<!Doctype HTML>
<html>
<head>
<link rel="icon" href="logo.jpg" />
<link rel="stylesheet" href="allrequests.css" />
<link rel="stylesheet" href="back.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="everyfont.css" />
<title>Information Systems | Admin Request Manager</title>
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
<script>
document.querySelector("body").style.opacity = "0";
</script>
<button id="back-btn" onclick="location='index.php'">Back</button>
<br>
<br>
<br>
<br>
<form action="searchrequest.php" method="GET">
<input type="text" style="font-size: 0px; width: 0px; height: 0px; border: none; margin: 0px;" value="<?php echo $_GET['user'] ?>" name="user" />
<input type="text" name="searched" />
<button>Search</button>
</form>
<br>
<br>
<table border="1" cellpadding="10" cellspacing="3">
<tr>
<th>ID</th>
<th>   Title   </th>
<th>     Comment     </th>
<th>Username</th>
<th>Firstname</th>
<th>Middlename</th>
<th>Initial</th>
<th>Lastname</th>
<th>Age</th>
<th>Gender</th>
<th>Grade</th>
<th>Section</th>
<th> SY </th>
<th>  LRN  </th>
</tr>
<?php
$con = mysqli_connect("localhost", "83825", "test1234");
mysqli_select_db($con, "83825");
$getdatos = mysqli_query($con, "SELECT * FROM accounts WHERE isAdmin='1' AND Username='". $_GET['user'] ."'");
$numberofdatos = mysqli_num_rows($getdatos);
$getdata = mysqli_query($con, "SELECT * FROM requests");
while($data = mysqli_fetch_assoc($getdata)) {
echo "<tr>";
echo "<td>". $data['ID'] ."</td>";
echo "<td>". $data['REQ_TITLE'] ."</td>";
echo "<td>". $data['Comment'] ."</td>";
echo "<td>". $data['Username'] ."</td>";
echo "<td>". $data['Firstname'] ."</td>";
echo "<td>". $data['Middlename'] ."</td>";
echo "<td>". $data['Initial'] ."</td>";
echo "<td>". $data['Lastname'] ."</td>";
echo "<td>". $data['Age'] ."</td>";
echo "<td>". $data['Gender'] ."</td>";
echo "<td>". $data['Grade'] ."</td>";
echo "<td>". $data['Section'] ."</td>";
echo "<td>". $data['SY'] ."</td>";
echo "<td>". $data['LRN'] ."</td>";
echo "</tr>";
}
?>
</table>
</body>
<script>
if (localStorage.Logged == "false") {
window.location = "index.php";
}

if (localStorage.isAdmin == "false") {
window.location = "index.php";
}

if (localStorage.isAdmin == "true") {
answer = prompt("Enter The Password Of Your Account " + localStorage.Account);
corpass = "<?php echo mysqli_fetch_assoc($getdatos)['Password'] ?>";
numofaccs = "<?php echo $numberofdatos ?>";
for (i = 0; i < numofaccs; i++) {
if (answer == corpass) {
break;
}
}
if (i == numofaccs || i > numofaccs) {
alert("Wrong Password!!!");
window.location = "index.php";
} else {
document.querySelector("body").style.opacity = "1";
}
} else {
window.location = "index.php";
}
</script>
</html>