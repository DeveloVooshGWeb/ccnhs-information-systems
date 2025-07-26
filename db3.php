<?php
$con = mysqli_connect("localhost", "83825", "test1234");
mysqli_select_db($con, "83825");
$students = mysqli_query($con, "SELECT * FROM student_records");
$getdatos = mysqli_query($con, "SELECT * FROM accounts WHERE isAdmin='1' AND Username='". $_GET['user'] ."'");
$numberofdatos = mysqli_num_rows($getdatos);
if ($numberofdatos > 0) {
if (isset($_POST['lrn'])) {
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$initial = $_POST['initial'];
$lastname = $_POST['lastname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$grade = $_POST['grade'];
$section = $_POST['section'];
$SY = $_POST['sy'];
$LRN = $_POST['lrn'];

$nfirstname = $_POST['nfirstname'];
$nmiddlename = $_POST['nmiddlename'];
$ninitial = $_POST['ninitial'];
$nlastname = $_POST['nlastname'];
$nage = $_POST['nage'];
$ngender = $_POST['ngender'];
$ngrade = $_POST['ngrade'];
$nsection = $_POST['nsection'];
$nSY = $_POST['nsy'];
$nLRN = $_POST['nlrn'];

$confirm = mysqli_query($con, "SELECT * FROM student_records WHERE LRN='". $LRN ."' OR Firstname='". $firstname ."' AND Middlename='". $middlename ."' AND Lastname='". $lastname ."'");
$confirmres = mysqli_num_rows($confirm);
if ($confirmres > 0) {
mysqli_query($con, "UPDATE `student_records` SET Firstname='". $nfirstname ."', Middlename='". $nmiddlename ."', Initial='". $ninitial ."', Lastname='". $nlastname ."', Age='". $nage ."', Gender='". $ngender ."', Grade='". $ngrade ."', Section='". $nsection ."', SY='". $nSY ."', LRN='". $nLRN ."' WHERE Firstname='". $firstname ."' AND Middlename='". $middlename ."' AND Initial='". $initial ."' AND Lastname='". $lastname ."' AND Age='". $age ."' AND Gender='". $gender ."' AND Grade='". $grade ."' AND Section='". $section ."' AND SY='". $SY ."' AND LRN='". $LRN ."'");
echo "<div id='block'></div><newt>Success!!!</newt>";
$success = 1;
//echo "<newt>UPDATE `student_records` SET Firstname='". $nfirstname ."', Middlename='". $nmiddlename ."', Initial='". $ninitial ."', Lastname='". $nlastname ."', Age='". $nage ."', Gender='". $ngender ."', Grade='". $ngrade ."', Section='". $nsection ."', SY='". $nSY ."', LRN='". $nLRN ."' WHERE Firstname='". $firstname ."' AND Middlename='". $middlename ."' AND Initial='". $initial ."' AND Lastname='". $lastname ."' AND Age='". $age ."' AND Gender='". $gender ."' AND Grade='". $grade ."' AND Section='". $section ."' AND SY='". $SY ."' AND LRN='". $LRN ."'</newt>";
} else {
echo "<div id='block'></div><newt>Sorry!!! There Is No Record!!!</newt>";
$success = 0;
}
}
} else {
header("Location: index.php");
}
?>

<!Doctype HTML>
<html>
<head>
<link rel="icon" href="logo.jpg" />
<link rel="stylesheet" href="db.css" />
<link rel="stylesheet" href="login.css" />
<link rel="stylesheet" href="back.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="everyfont.css" />
<link rel="stylesheet" href="records.css" />
<title>Information Systems | Admin Database Manager</title>
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

table, tr, td, th {
font-size: 16px;
}
</style>
<body bgcolor="#121212">
<button id="back-btn" onclick="location='db2.php?user=' + localStorage.Account">Back</button>
<div id="block"></div>
<form action="#" method="POST">
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
<div id="block"></div>
<input type="text" name="nfirstname" placeholder="New Firstname" required />
<div id="space"></div>
<input type="text" name="nmiddlename" placeholder="New Middlename" required />
<div id="space"></div>
<input type="text" name="ninitial" placeholder="New Initial" required />
<div id="space"></div>
<input type="text" name="nlastname" placeholder="New Lastname" required />
<div id="space"></div>
<input type="number" name="nage" placeholder="New Age" required />
<div id="space"></div>
<input type="text" name="ngender" placeholder="New Gender/Sex" required />
<div id="space"></div>
<input type="number" name="ngrade" placeholder="New Grade" required />
<div id="space"></div>
<input type="text" name="nsection" placeholder="New Section" required />
<div id="space"></div>
<input type="number" name="nsy" placeholder="New School Year" required />
<div id="space"></div>
<input type="text" name="nlrn" placeholder="New LRN" required />
<div id="space"></div>
<button id="submit">Update Record</button>
</form>
<div id="block"></div>
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
<th>LRN</th>
</tr>
<?php
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
<script>
if (<?php echo $success ?> == 1) {
setTimeout(() => {
location = "index.php";
}, 2000)
}
</script>
</html>