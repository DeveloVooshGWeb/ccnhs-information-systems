<?php
if (isset($_POST['username'])) {
$con = mysqli_connect("localhost", "83825", "test1234");
mysqli_select_db($con, "83825");
$confirm = mysqli_query($con, "SELECT * FROM accounts WHERE Username='". $_POST['username'] ."' OR Email='". $_POST['email'] ."'");
$numfound = mysqli_num_rows($confirm);
if ($numfound < 1) {
$command = "INSERT INTO accounts VALUES (0, '". $_POST['username'] ."', '". $_POST['password'] ."', ". $_POST['age'] .", ". $_POST['phone'] .", '". $_POST['email'] ."', false)";
mysqli_query($con, $command);
} else {
echo "There Is An Existing Account With The Name ". $_POST['username'];
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="logo.jpg" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="everyfont.css" />
<title>Information Systems | Complete Registration</title>
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
<script>
window.location = "login.php";
</script>
</html>