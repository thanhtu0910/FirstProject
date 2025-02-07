<?php
// lập trình hướng đối tượng có 4 tính chất:
// + tính đóng gói
// + Tính kế thừa
// + Trừu tượng
// + Đa hình

// Tính đóng gói
// được thể hiện thông qua CLASS.
// Class sẽ đóng gói lại toàn bộ thuộc tính và phương thức

// Từ class có thể tạo ra nhiều đối tượng có chung nhiều thuộc tính và phương thức

//class TenClass
//{
    // khai báo các thuộc tính và phương thức ở đây

    // thuộc tính chính là biến trong class
    // phương thức là hàm trong class
//}

// Khởi tạo 1 đối tượng 
// create an entity

// $name_entity = new NameClass();

// bài tập
// khai báo 1 class sinh viên gồm các thuộc tính 
// + họ tên
// + mã SV
// + địa chỉ
// Tạo phương thức thực hiện set giá trị cho các thuộc tính trên
// Tạo 1 phương thức hiển thị toàn bộ thông tin sv ra màn hình
// Khởi tạo ba entity từ phương thức đó


class InfoSinhVien
{
    public $name;
    public $ID;
    public $address;
    public function __construct($name,$ID,$address){
    $this->name = $name;
    $this->ID = $ID;
    $this->address = $address;
    }

    public function hienThiThongTin()
    {
        echo $this->name . '-'.
             $this->ID . '-'.
             $this->address . '</br>';
    }


}

$name1 = new InfoSinhVien('Tutt','PH49773', 'ThaiNguyen');
$name1 ->hienThiThongTin();