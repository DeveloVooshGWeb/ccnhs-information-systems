<?php
$con = mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($con, "tutorial");
$accountdelete = mysqli_query($con, "DELETE FROM accounts WHERE ID='$_GET[id]'");
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
</html>

<?php
echo "Successful!!!";
echo "<br><a href='index.php'>Back</a>";
?>