<?php
namespace App\Models;

class User{
    public function getAll()
    {
        echo "đây là model của user";
    }
}

class SinhVien2 
{
    public $hoTen;
    public $namSinh;
    

    public function __construct($hoTen, $namSinh) {
        $this->hoTen = $hoTen;
        $this->namSinh = $namSinh;
    }
        public function hienThiThongTin(){
            echo "Họ tên: ". $this->hoTen. "\n";
            echo "<br>";
            echo "Năm sinh: ". $this->namSinh. "\n";
        }
}
