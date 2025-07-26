<!doctype HTML>
<html>
<head>
<link rel="icon" href="logo.jpg" />
<link rel="stylesheet" href="allrequests.css" />
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
<button id="back-btn" onclick="location='allrequests.php?user=' + localStorage.Account">Back</button>
<br>
<br>
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
$connect = mysqli_connect("localhost", "83825", "test1234");
mysqli_select_db($connect, "83825");
$getdatos = mysqli_query($connect, "SELECT * FROM accounts WHERE isAdmin='1' AND Username='". mysqli_real_escape_string($connect, $_GET['user']) ."'");
$numberofdatos = mysqli_num_rows($getdatos);
$searched = mysqli_real_escape_string($connect, $_GET['searched']);
$students = mysqli_query($connect, "SELECT * FROM requests WHERE REQ_TITLE LIKE '%$searched%' OR Username LIKE '%$searched%' OR Firstname LIKE '%$searched%' OR Middlename LIKE '%$searched%' OR Initial='". $searched ."' OR Lastname LIKE '%$searched%' OR Age='". $searched ."' OR Gender='". $searched ."' OR Grade='". $searched ."' OR Section='". $searched ."' OR SY='". $searched ."' OR LRN='". $searched ."'");
$matching = mysqli_num_rows($students);
if ($matching > 0) {
echo $matching ." Result/Results";
while($data = mysqli_fetch_assoc($students)) {
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
if (localStorage.Logged == "false") {
window.location = "allrequests.php?user=" + localStorage.Account;
}

if (localStorage.isAdmin == "false") {
window.location = "allrequests.php?user=" + localStorage.Account;
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
window.location = "allrequests.php?user=" + localStorage.Account;
} else {
document.querySelector("body").style.opacity = "1";
}
}
</script>
</html>