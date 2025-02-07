<?php
// Tính kế thừa trong OOP

//- Một class đc kế thừa từ class cha của nó
// thì nó có thể sử dụng thuộc tính và phương thức từ class cha đó

//- Class con có thể có thêm các thuộc tính và phương thức riêng của nó mà không ảnh hưởng đến class cha

// DEMO tính kế thừa

class Human
{
    public $hoTen;
    public $namSinh;
    public $queQuan;

    public function __construct($name,$birthdate,$hometown)
    {
        $this->hoTen = $name;
        $this->namSinh = $birthdate;
        $this->queQuan = $hometown;

    }

    public function anUong() {
        echo "Human eat and drink </br>";
    }
}

class Child extends Human
{
    public function info()
    {
        // Gọi lại phương thức từ class cha
        parent::anUong();

        echo "Họ tên: " . $this->hoTen;
        echo "</br>";
    }
}

$treCon = new Child("Nguyễn Van A", 2000, "Thái nguyên");
// Sử dụng lại class cha
$treCon->anUong();
// sử dụng phương thức ở class con
$treCon-> info();

// tạo 1 class NguoiLon kế thừa lại class Human
// Khai báo thêm thuộc tính nghề nghiệp
// Khai báo phương thức để xét giá trị cho thuộc tính đó
// Khai báo 1 phương thức hiện thị toàn bộ thông tin 

class NguoiLon extends Human
{
    public $ngheNghiep;

    public function __construct($name,$birthdate,$hometown,$job)
    {
        parent::__construct($name,$birthdate,$hometown);
        $this->ngheNghiep = $job;

    }
    public function newinfo()
    {
        echo  $this->hoTen . '-' .
         $this->namSinh . '-' .
         $this->queQuan . '-' .
          $this->ngheNghiep;

    }
}
$nguoiLon = new NguoiLon("Nguyễn Van A", 2000, "Thái nguyên","Sinh viên");
$nguoiLon-> newinfo();

// Phạm vi truy cập trong class
// - public: có thể truy cập ở mọi nơi
// - private: Chỉ sử dụng được bên trong class
// -  protected: Chỉ sử dụng được bên trong class và class kế thừa

class TruyCap
{
    public $public = "Đây là public ";
    private $private = "Đây là private ";
    protected $protected = "Đây là protected ";

    public function getPrivate()
    {
        return $this->private;
    }
}
$truyCap = new TruyCap();
// chỉ có phạm vi truy cập là public mới sử dụng được 
echo $truyCap->getPrivate();
echo '</br>';
class TruyCap2 extends TruyCap
{
    public function getProtected(){
        return $this->protected;
    }
}

$truyCap2 = new TruyCap2();

echo $truyCap2->getProtected();
echo '</br>';