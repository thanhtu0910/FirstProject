<?php
session_start();
include_once(__DIR__ . '/../../models/ConnectDatabase.php'); 
$category_id = $_GET['category_id'];
$sql = "DELETE FROM `categories` WHERE category_id=$category_id";
$query = mysqli_query($conn, $sql);
header('Location: index.php?page_layout=danhmuc');
?>