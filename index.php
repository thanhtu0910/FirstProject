<?php
require_once "controllers/Bookcc.php";
require_once "models/Book.php";

$aa = new Bookcc();
$bb = isset($_GET['act']) ? $_GET['act'] : "/";
switch ($bb) {
    case 'danhmuc':
        $aa->danhmuc();
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
    case 'addDM':
        $aa->addDM();
        break;
    case 'editDM':
        $aa->editDM();
        break;
    case 'deleteDM':
        $aa->deleteDM();
        break;
    // case 'xem':
    //     $aa->xem();
    //     break;
    case 'binhluan':
        $aa->binhluan();
        break;
    case 'listuser':
        $aa->listuser();
        break;
    case 'shophtml':
        $aa->shophtml();
        break;
        case 'productDetail':
            $aa->productDetail();
            break;
        
    
        
    default:
        $aa->listbook();
        break;
}
