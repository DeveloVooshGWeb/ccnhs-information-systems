<?php
$connect = mysqli_connect("localhost", "83825", "test1234");
mysqli_select_db($connect, "83825");
$students = mysqli_query($connect, "SELECT * FROM student_records");
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

input {
border: 2px solid white;
background-color: #232323;
}
</style>
<body bgcolor="#121212">
<button id="back-btn" onclick="location='index.php'">Back</button>
<br>
<br>
<br>
<br>
<form action="search.php" method="GET">
<input type="text" name="searched" />
<button>Search</button>
</form>
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
</html>