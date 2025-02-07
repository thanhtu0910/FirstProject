<?php
namespace App\Controllers;

use App\Models\User;
class UserController
{
    public $modelUser;

    public function __construct()
    {
        $this->modelUser = new User();
    }


    
    public function index()
    {
        $user = $this->modelUser->getAll();
        
        echo $user;
        echo "<br/>";
        getMess();

        // sửu dụng autoload trong thư mục demo_namespace
    }

    
}

// class SinhVien2 
// {
//     public $hoTen;
//     public $namSinh;
    
//     public function __construct($hoTen, $namSinh) {
//         $this->hoTen = $hoTen;
//         $this->namSinh = $namSinh;
//     }
//         public function hienThiThongTin(){
//             echo "Họ tên: ". $this->hoTen. "\n";
//             echo "<br>";
//             echo "Năm sinh: ". $this->namSinh. "\n";
//         }
// }