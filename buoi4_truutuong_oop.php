<?php
// trừu tượng của OOP
//cái gì mà chúng ta ko thể cụ thể hóa nó đc thì trừu tượng hóa nó lên

// Demo tính trừu tượng

abstract class Crush
{
    // một số đặc điểm của abstract class:

    // - một class đc gọi là abstract class khi nó chứa các abstract function (Phương thức trừu tượng)
    abstract public function thichtoi();
    // abstract function chỉ đc phép khai báo bên trong abstract class và không đc phép triển khai nội dung
    
    // nếu không phải là abstract function thì vẫn triển khai như bình thường
    public function diChuyen()
    {
        echo 'di chuyển bằng hai chân';
    }

    // abstract public $hoTen; LỖI
    // - chỉ có phương thức trừu tượng ko có thuộc tính trừu tượng

    // - Phạm vi truy cập trong abstract class chỉ đc khai báo bằng public và protected
    // abstract private function test(); LỖI
    

}

    // mục đính sinh ra abstract class là để được kế thừa nên ko đc phép khởi tạo đối tượng từ abstract class
    // $crush = new Crush LỖI
    // các class kế thừa lại abstract class thì phải định nghĩa và triển khai lại tất các phương thức trừu tượng có trong abstract class đó
    class NYC extends Crush
    {
        // phương thức trừu tượng ko thể sử dụng với parent::
        // parent:: thichtoi(); LỖI

        public function thichtoi()
        {
            echo "hihihaha";
        }
    }
    $nyc = new NYC();
    $nyc->thichtoi();
    $nyc->diChuyen();