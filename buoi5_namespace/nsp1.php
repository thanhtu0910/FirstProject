<?php

// - tạo 1 class có ten là sinh viên: hoTen, namSinh
// tạo cóntract set giá trị cho các thuộc tính
// tạo phương thức hiển thị các thông tin trên
namespace nps1;

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
