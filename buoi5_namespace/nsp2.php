<?php

// - tạo 1 class có ten là sinh viên: hoTen, maSinhVien
// tạo contract set giá trị cho các thuộc tính
// tạo phương thức hiển thị các thông tin trên
namespace nps2;

class SinhVien2
{
    public $hoTen;
    public $maSinhVien;

    public function __construct($hoTen, $maSinhVien)
    {
        $this->hoTen = $hoTen;
        $this->maSinhVien = $maSinhVien;
    }
    public function hienThiThongTin()
    {
        echo "Họ tên: " . $this->hoTen . "\n";
        echo "<br>";
        echo "mã sinh viên: " . $this->maSinhVien . "\n";
    }
}
