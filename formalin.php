<?php

$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "formalin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT nonformal, formal FROM formal";
$result = $conn->query($sql);
$trans = $result->fetch_all(MYSQLI_NUM);
array_unshift($trans, null);
$trans = call_user_func_array('array_map', $trans);

$pesan = sprintf("Assalamualaikum %s. saya %s NIM %s dari %s. maaf mengganggu waktunya. %s. terima kasih atas waktunya.", $_GET['pb'], $_GET['nama'], $_GET['nim'], $_GET['afiliasi'], $_GET['konten']);

$pesan = str_ireplace($trans[0], $trans[1], $pesan);

echo $pesan;

// echo '<pre>';
// var_dump($trans);
// echo '</pre>';

?>