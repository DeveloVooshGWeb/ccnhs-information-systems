<?php
$con = mysqli_connect("localhost", "83825", "test1234");
mysqli_select_db($con, "83825");
$username = $_POST['username'];
$password = $_POST['password'];
$title = $_POST['title'];
$comment = $_POST['comment'];
$fname = $_POST['firstname'];
$mname = $_POST['middlename'];
$inital = $_POST['initial'];
$lname = $_POST['lastname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$grade = $_POST['grade'];
$section = $_POST['section'];
$SY = $_POST['sy'];
$LRN = $_POST['lrn'];
$confirmuser = mysqli_query($con, "SELECT * FROM requests WHERE Username='". $username ."'");
$confirmtitle = mysqli_query($con, "SELECT * FROM requests WHERE REQ_TITLE='". $title ."'");
$usercount = mysqli_num_rows($confirmuser);
$titlecount = mysqli_num_rows($confirmtitle);
if ($usercount < 1 && $titlecount < 1) {
mysqli_query($con, "INSERT INTO requests VALUES (0, '". $username ."', '". $password ."', '". $fname ."', '". $mname ."', '". $inital ."', '". $lname ."', ". $age .", '". $gender ."', ". $grade .", '". $section ."', ". $SY .", ". $LRN .", '". $comment ."', '". $title ."')");
echo "<newt>Successfully Inserted Your Request!!!</newt>";
} else {
echo "<newt>We Found ". $usercount ." Users That Already Made A Request And ". $titlecount ." Titles That Were Used</newt>";
}
?>

<!Doctype HTML>
<html>
<head>
<link rel="icon" href="logo.jpg" />
<link rel="stylesheet" href="comreq.css" />
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
<body>
</body>
</html>