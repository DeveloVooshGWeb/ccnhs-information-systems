<?php
$con = mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($con, "tutorial");
$command = "INSERT INTO accounts VALUES (0, '". $_GET['username'] . "', '". $_GET['password'] . "', ". $_GET['age'] . ")";
$accounts = mysqli_query($con, $command);
echo($command);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Mysql</title>
</head>
<body>
</body>
<script>
    setTimeout(() => {
    window.location = "index.php";
    }, 200);
</script>
</html>