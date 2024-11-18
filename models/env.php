<?php
const DBNAME = 'duan1';
const DBUSER = 'root';
const DBPASS = '';
const DBHOST = '127.0.0.1';
const DBCHARSET = 'utf8';

$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>
