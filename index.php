<?php
require_once "controllers/Bookcc.php";
require_once "models/Book.php";

$aa = new Bookcc();
$bb = isset($_GET['act']) ? $_GET['act'] : "/";
switch ($bb) {
    case 'add':
        $aa->addbook();
        break;
    case 'list':
        $aa->listbook();
        break;
    case 'edit':
        $aa->editbook();
        break;
    case 'delete':
        $aa->deletebook();
        break;
    case 'register':
        $aa->register();
        break;
    case 'login':
        $aa->login();
        break;
    case 'dangxuat':
        $aa->dangxuat();
        break;
    case 'binh':
        $aa->binh();
        break;

    default:
        $aa->listbook();
        break;
}
