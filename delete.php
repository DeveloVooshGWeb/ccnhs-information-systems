<?php
$con = mysqli_connect("localhost", "83825", "test1234");
mysqli_select_db($con, "83825");
$getdatos = mysqli_query($con, "SELECT * FROM accounts WHERE isAdmin='1' AND Username='". $_GET['user'] ."'");
$numberofdatos = mysqli_num_rows($getdatos);
?>

<!Doctype HTML>
<html>
<head>
<link rel="icon" href="logo.jpg" />
<link rel="stylesheet" href="records.css" />
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
<button id="back-btn" onclick="location='archived.php?user=' + localStorage.Account">Back</button>
<br>
<br>
<br>
<br>
<table border="1" cellpadding="1" cellspacing="1">
<tr>
<th>Firstname</th>
<th>Middlename</th>
<th>Initial</th>
<th>Lastname</th>
<th>Age</th>
<th>Gender</th>
<th>Grade</th>
<th>Section</th>
<th>SY</th>
<th>      LRN      </th>
<th>Results</th>
</tr>
<?php
$students = mysqli_query($con, "SELECT * FROM archived WHERE ID='". $_GET['id'] ."'");
$matching = mysqli_num_rows($students);
if ($matching > 0) {
echo $matching ." Result/Results";
while($allstudents = mysqli_fetch_assoc($students)) {
echo "<tr>";
echo "<td>". $allstudents['Firstname'] ."</td>";
echo "<td>". $allstudents['Middlename'] ."</td>";
echo "<td>". $allstudents['Initial'] ."</td>";
echo "<td>". $allstudents['Lastname'] ."</td>";
echo "<td>". $allstudents['Age'] ."</td>";
echo "<td>". $allstudents['Gender'] ."</td>";
echo "<td>". $allstudents['Grade'] ."</td>";
echo "<td>". $allstudents['Section'] ."</td>";
echo "<td>". $allstudents['SY'] ."</td>";
echo "<td>". $allstudents['LRN'] ."</td>";
echo "<td>DELETED!!!</td>";
echo "</tr>";
}
} else {
echo "0 Result/Results";
echo "<tr>";
echo "<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
echo "<td>None</td>";
echo "</tr>";
}
?>
</table>
</body>
<script>
document.querySelector("body").style.opacity = "0";

if (localStorage.Logged == "false") {
window.location = "index.php";
}

if (localStorage.isAdmin == "false") {
window.location = "index.php";
}

if (localStorage.isAdmin == "true") {
if ("<?php echo $_GET['user'] ?>" == localStorage.Account) {
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
setTimeout(() => {
window.location = "index.php";
}, 3000)
}
} else {
window.location = "index.php";
}
} else {
window.location = "index.php";
}
</script>
</html>

<?php
if (isset($_GET['id'])) {
$todelete = mysqli_query($con, "SELECT * FROM archived WHERE ID='". $_GET['id'] ."'");
$numoffound = mysqli_num_rows($todelete);
if ($numoffound > 0) {
mysqli_query($con, "DELETE FROM archived WHERE ID='". $_GET['id'] ."'");
echo "<newt>". $numoffound ." Record/Records DELETED!!!</newt>";
} else {
echo "<newt>No Such Record/Records!!!</newt>";
}
}
?>