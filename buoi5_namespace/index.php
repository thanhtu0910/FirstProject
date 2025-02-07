<?php
require "./nsp1.php";
require "./nsp2.php";

// trong trường hợp use  2 class trùng tên mà đã đặt khác name space
// thìta cần phải đặt bí danh cho nó
use nps1\SinhVien2;
use nps2\SinhVien2 as SinhVien3;// -> đặt bí danh, sử dug bí danh thay cho tên class

// Trường hợp sử dụng 2 class trùng tên nhau thì ta phải sử dụng namespace
// - namespace trong php giúp tạo ra vùng định danh riêng cho class
// - namespace luôn luôn được đặt ở đầu file php
// - namespace đóng vai trò là không gian đại diện cho class or function or biến ở tring file đó
// - namespace giải quyết các trường hợp các file khác nhưng có class function biến giống nhau

// cách sửdungj 
//- cách 1 sử dụng cho các namespace ngắn
// cú pháp : $tenDoiTuong = new TenNameSpace\Tenclass()

$aa = new nps1\SinhVien2("binh", 2004);
$aa->hienThiThongTin();


$bb = new nps2\SinhVien2("binh hoang", "ph49776");
$bb->hienThiThongTin();
 
// Cách2: sử dụng cho các namespace dài 
// cú pháp: use TenNameSpace\Tenclass;      thường được đặt ở đầu file bên dưới namespace
//          $tenDoiTuong = new TenClass();

$sv1 = new SinhVien2("hoang", "2004");

$sv1->hienThiThongTin();


$sv1 = new SinhVien3("hoang", "ph2004");

$sv1->hienThiThongTin();