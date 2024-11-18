
<?php
      if(isset($_GET["page_layout"])){
        switch ($_GET["page_layout"]) {
            case 'danhmuc':
                include_once 'danhmuc.php';
                break;
            case 'sanpham':
                include_once 'order-management.php';
                break;
            case 'suadm':
                include_once 'edit-category.php';
                break;
            case 'suasp':
                include_once 'edit-product.php';
                break;
            case 'themdm':
                include_once 'add-category.php';
                break;
            case 'themsp':
                include_once 'add-product.php';
                break;
            
          }
      }
      else{
        include_once 'gioithieu.php';
      }
     
      
      ?>