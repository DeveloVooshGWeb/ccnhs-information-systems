<?php
class Server {

public function Start() {
$filesdir = "Files/";
$accountsdir = $filesdir ."Accounts/";
$cer2dir = $accountsdir ."Secured/";
if (is_dir($filesdir)) {
if (is_dir($accountsdir)) {
if (is_dir($cer2dir)) {
} else {
mkdir($cer2dir, 0777);
header("Location: index.php");
}
} else {
mkdir($accountsdir, 0777);
header("Location: index.php");
}
} else {
mkdir($filesdir, 0777);
header("Location: index.php");
}
}

public function CreateAccount($username, $password, $age, $email, $admin) {
$filesdir = "Files/";
$accountsdir = $filesdir ."Accounts/";
$existing = 0;
$existingbio = 0;
$existingemail = 0;
$openaccounts = opendir($accountsdir);
while ($accounts = readdir($openaccounts)) {
if ($accounts != "." && $accounts != "..") {
if (base64_encode($username) .".hex" == $accounts) {
$existing = 1;
}
if (base64_encode($username) .".bio.hex" == $accounts) {
$existingbio = 1;
}
if (strpos($accounts, ".bio.hex")) {
$biocontents = file_get_contents($accountsdir . $accounts, true);
$bioexplode = explode(" ", $biocontents);
$biohexdec = "";
for ($i = 0; $i < count($bioexplode); $i++) {
$biohexdec .= chr(hexdec($bioexplode[$i]));
}
$step2 = base64_decode($biohexdec);
$step3 = json_decode($step2, true);
if ($email == base64_decode($step3[base64_encode("Email")])) {
$existingemail = 1;
}
}
}
}
if ($existing == 0 && $existingbio == 0 && $existingemail == 0) {
$hashpass = password_hash($password, PASSWORD_BCRYPT);
$rawuser = "";
for ($i = 0; $i < strlen($username); $i++) {
$rawuser .= dechex(ord($username[$i])) ." ";
}
$hexuser = base64_encode($rawuser);
$rawpass = "";
for ($i = 0; $i < strlen($hashpass); $i++) {
$rawpass .= dechex(ord($hashpass[$i])) ." ";
}
$hexpass = base64_encode($rawpass);
$power = uniqid("", true) . uniqid("", true);
$cerdir = $accountsdir ."Secured/";
$power2 = "";
for ($i = 0; $i < strlen($power); $i++) {
$power2 .= dechex(ord($power[$i])) ." | ";
}
$power3 = base64_encode($power2);
$power4 = array(
$power3 => $hexpass
);
$power5 = json_encode($power4);
$power6 = "";
for ($i = 0; $i < strlen($power5); $i++) {
$power6 .= dechex(ord($power5[$i])) ." | ";
}
file_put_contents($cerdir . base64_encode($username) .".sec", $power6);
$this->accountdataarr = array(
base64_encode("Username") => $hexuser,
base64_encode("Password") => $power3
);
$this->accountdatajson = json_encode($this->accountdataarr);
$this->accountdatajson2 = str_split($this->accountdatajson);
$this->accountdatajson22 = array(
"Data" => base64_encode(json_encode($this->accountdatajson2))
);
$this->accountdatajson3 = base64_encode(json_encode($this->accountdatajson22));
$this->accountdatafinal1 = "";
$this->accountdatafinal2 = "";
$this->accountdatafinal3 = "";
for ($i = 0; $i < strlen($this->accountdatajson3); $i++) {
$this->accountdatafinal1 .= dechex(ord($this->accountdatajson3[$i])) ." | ";
}
$this->accountdatafinal2 = base64_encode($this->accountdatafinal1);
for ($i = 0; $i < strlen($this->accountdatafinal2); $i++) {
$this->accountdatafinal3 .= dechex(ord($this->accountdatafinal2[$i])) ." | ";
}
$this->filename = base64_encode($username);
file_put_contents($accountsdir . $this->filename .".hex", $this->accountdatafinal3);
$this->accountbioarr = array(
base64_encode("Age") => base64_encode($age),
base64_encode("Email") => base64_encode($email),
base64_encode("IsAdmin") => base64_encode(password_hash($admin, PASSWORD_BCRYPT))
);
$this->accountbiojson = json_encode($this->accountbioarr);
$this->accountbiofinal1 = base64_encode($this->accountbiojson);
$this->accountbiofinal2 = "";
for ($i = 0; $i < strlen($this->accountbiofinal1); $i++) {
$this->accountbiofinal2 .= dechex(ord($this->accountbiofinal1[$i])) ." ";
}
file_put_contents($accountsdir . $this->filename .".bio.hex", $this->accountbiofinal2);
echo "Successfully Made An Account Named ". $username;
}
if ($existing == 1 || $existingbio == 1) {
echo "Account Named ". $username ." Used!!!";
echo "<br>";
}
if ($existingemail == 1) {
echo "Email Used!!!";
echo "<br>";
}
}

public function LoginAccount($user, $pass) {
$filesdir = "Files/";
$accountsdir = $filesdir ."Accounts/";
$superencrypteddata = file_get_contents($accountsdir . base64_encode($user) .".hex", true);
$step1 = explode(" | ", $superencrypteddata);
$step2 = "";
for ($i = 0; $i < count($step1); $i++) {
$step2 .= chr(hexdec($step1[$i]));
}
$step3 = base64_decode($step2);
$step4 = explode(" | ", $step3);
$step5 = "";
for ($i = 0; $i < count($step4); $i++) {
$step5 .= chr(hexdec($step4[$i]));
}
$step6 = base64_decode($step5);
$step7 = json_decode($step6, true);
$step8 = base64_decode($step7["Data"]);
$step9 = json_decode($step8, true);
$step10 = join($step9);
$step11 = json_decode($step10, true);
$c1s1 = $step11[base64_encode("Username")];
$c1s2 = base64_decode($c1s1);
$c1s3 = explode(" ", $c1s2);
$c1final = "";
for ($i = 0; $i < count($c1s3); $i++) {
$c1final .= chr(hexdec($c1s3[$i]));
}
$c1final = substr($c1final, 0, strlen($c1final) - 1);
$c2s1 = $step11[base64_encode("Password")];
$c2s2 = base64_decode($c2s1);
$c2s3 = explode(" ", $c2s2);
$c2final = "";
for ($i = 0; $i < count($c2s3); $i++) {
$c2final .= chr(hexdec($c2s3[$i]));
}
$c2final = substr($c2final, 0, strlen($c2final) - 1);
echo "<br>";
$securedacc = file_get_contents("Files/Accounts/Secured/". base64_encode($c1final) .".sec", true);
$explodedpass = explode(" | ", $securedacc);
$accpassb64 = "";
for ($i = 0; $i < count($explodedpass); $i++) {
$accpassb64 .= chr(hexdec($explodedpass[$i]));
}
$accpassb64 = substr($accpassb64, 0, strlen($accpassb64));
echo $accpassb64;
echo "<br>";
print_r(json_decode($accpassb64, true));
}

public function CheckHash($pwd, $hash) {
if (password_verify($pwd, $hash)) {
return 1;
} else {
return 0;
}
}

}
?>