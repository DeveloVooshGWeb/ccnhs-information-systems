<?php
$con = mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($con, "tutorial");
$accounts = mysqli_query($con, "SELECT * FROM accounts");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <title>PHP Mysql</title>
</head>
<body>
<form action="insert.php" method="GET">
<input type="text" placeholder="Username" id="textbox" name="username" required />
<br>
<br>
<input type="password" placeholder="Password" id="textbox" name="password" required />
<br>
<br>
<input type="number" placeholder="Age" id="textbox" name="age" required />
<br>
<br>
<input type="submit" value="Submit" id="submitbtn" />
</form>
<br>
<table width="1000" border="2" cellpadding="2" cellspacing="2">
    <tr>
    <th>Username</th>
    <th>Password</th>
    <th>Age</th>
</tr>
</table>
</body>
</html>

<?php
while($everything = mysqli_fetch_array($accounts)) {
    echo "<tr>";

    echo "<td>" . $everything["username"] . "<td>";
    echo "                                  ";
    echo "<td>" . $everything["password"] . "<td>";
    echo "                                  ";
    echo "<td>" . $everything["age"] . "<td>";
    echo "                                  ";
    echo "<a href='delete.php?id=". $everything["ID"] . "'>Delete</a>";

    echo "</tr>";
    echo "<br>";
}
?>