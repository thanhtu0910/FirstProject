<?php

// tính đa hình trong oop(interface)

// - interface ko phải là 1 class
// interface là khuôn mẫu để tạo bộ khung cho các class
// interface giông như bản hợp đồng ràng buộc 
// bắt buộc lớp sử dụng phải có đầy đủ các phương thức trong interface đó
interface diChuyen
{
    // Một số đặc điểm của innterface

    // - không được phéo khai báo thuộc tính
    // public $hoTen; Lỗi

    // chỉ được phép khai báo phương thức và khoogn được triển khai nội dung trong phương thức đó
    public function diBo();
    // protected function test1(); LỖI
    // phạm vi truy cập
    // chỉ được sử dụng public khai báo
}
// - không được khởi tạo đối tượng từ interface
// $dongVat = new Dichuyen(); LỖI

class DongVat implements DiChuyen
{
    public function diBo()
    {
        echo "heheheheh";
    }
} 
$conNguoi = new DongVat();
$conNguoi->diBo();

// một class có thể implements nhiều interface

interface DiChuyen2
{
    public function chayBo();
}

    class ConCho implements DiChuyen,Dichuyen2
    {
        public function diBo()
        {
            echo "hehahdhahdsaahfj";
        }

        public function chayBo()
        {
            echo "hihihi hehahdhahdsaahfj";
        }
    }

    // - các interface có thể kế thừa lẫn nhau
    interface DiChuyen3 extends Dichuyen,Dichuyen2
    {
        public function bay();
    }
