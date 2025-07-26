<?php
$con = mysqli_connect("localhost", "83825", "test1234");
mysqli_select_db($con, "83825");
$getdatos = mysqli_query($con, "SELECT * FROM accounts WHERE isAdmin='1' AND Username='". $_GET['user'] ."'");
$numberofdatos = mysqli_num_rows($getdatos);
$studentsarc = mysqli_query($con, "SELECT * FROM archived");
?>

<!Doctype HTML>
<html>
<head>
<link rel="icon" href="logo.jpg" />
<link rel="stylesheet" href="records.css" />
<link rel="stylesheet" href="back.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="everyfont.css" />
<link rel="stylesheet" href="point.css" />
<title>Information Systems | Archived</title>
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
<br>
<br>
<br>
<br>
<form action="search2.php" method="GET">
<input type="text" value="<?php echo $_GET['user'] ?>" style="font-size: 0px; border: none; color: transparent; background-color: transparent; position: absolute; top: 0px; left: 0px;" name="user" />
<input type="text" name="searched" />
<button>Search</button>
</form>
<br>
<br>
<table border="1" cellpadding="1" cellspacing="1">
<tr>
<th>ID (For Modification)</th>
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
<th>PERMANENTLY Delete</th>
<th>Restore</th>
</tr>
<?php
while($allstudents = mysqli_fetch_assoc($studentsarc)) {
echo "<tr>";
echo "<td>". $allstudents['ID'] ."</td>";
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
echo "<td><a class='point' onclick='location=`delete.php?user=` + localStorage.Account + `&id=". $allstudents['ID'] ."`'>Delete</a>";
echo "<td><a class='point' onclick='location=`restore.php?user=` + localStorage.Account + `&id=". $allstudents['ID'] ."`'>Restore</a>";
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
}
} else {
window.location = "index.php";
}
} else {
window.location = "index.php";
}
</script>
</html>