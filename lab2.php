<?php 
// Bài 1: 
// Tạo một class NguoiDung gồm các thuộc tính:
// Họ tên, Địa chỉ, Năm sinh, Email, SĐT
// Tạo phương thức set giá trị cho các thuộc tính trên (hàm __construct)
// Tạo phương thức tính tuổi của người dùng = năm hiện tại - năm sinh
// Tạo phương thức hiển thị toàn bộ thông tin của người dùng
// Họ tên, Địa chỉ, Năm sinh, Tuổi, Email, SĐT

// Tạo một class SinhVien kế thừa lại class NguoiDung
// Có thêm các thuộc tính: diemPHPCB, diemPHP1, diemPHP2
// Tạo phương thức set giá trị cho các thuộc tính trên (hàm __construct)
// Tạo phương thức tính điểm trung bình của sinh viên
// Tạo phương thức hiển thị toàn bộ thông tin của sinh viên
// Họ tên, Địa chỉ, Năm sinh, Tuổi, Email, SĐT, Điểm PHP TB

// Tạo một class GiangVien kế thừa lại class NguoiDung
// Có thêm các thuộc tính: luongCoBan, soGioDay
// Tạo phương thức set giá trị cho các thuộc tính trên (hàm __construct)
// Tạo phương thức tính lương của giảng viên = luongCoBan * soGioDay
// Tạo phương thức hiển thị toàn bộ thông tin của giảng viên
// Họ tên, Địa chỉ, Năm sinh, Tuổi, Email, SĐT, Tổng lương

// Yêu cầu: Khởi tạo 2 đối tượng sinh viên và giảng viên
// có đầy đủ các thuộc tính của cả class cha và class con


// Bài 2: Áp dụng kiến thức để sử dụng tính kế thừa vào bài Lab 1
echo "<h3>Thông tin người dùng</h3>";
class NguoiDung 
{
    public $hoTen;
    public $diaChi;
    public $namSinh;
    public $email;
    public $sdt;

    public function __construct($name,$address,$birthdate,$email,$phoneNumber)
    {
        $this->hoTen = $name;
        $this->diaChi = $address;
        $this->namSinh = $birthdate;
        $this->email = $email;
        $this->sdt = $phoneNumber;
    }

    public function caculateAge()
    {
        $namHienTai = date("Y");
        return $namHienTai -  $this->namSinh;
    }

    public function newinfo()
    {
        echo  $this->hoTen . '-' .
        $this->diaChi . '-' .
        $this->namSinh . '-' .
        $this->email . '-' .
        $this->sdt . '-' .
        $this->caculateAge() ;
    }
}
$nguoiDung = new NguoiDung('TtT','Thái Nguyên',2005,'abc@gmail.com','0326857005');
$nguoiDung-> caculateAge();
$nguoiDung->newinfo();

echo '</br>';

// Có thêm các thuộc tính: diemPHPCB, diemPHP1, diemPHP2
// Tạo phương thức set giá trị cho các thuộc tính trên (hàm __construct)
// Tạo phương thức tính điểm trung bình của sinh viên
// Tạo phương thức hiển thị toàn bộ thông tin của sinh viên
// Họ tên, Địa chỉ, Năm sinh, Tuổi, Email, SĐT, Điểm PHP TB
echo "<h3>Thông tin sinh viên</h3>";
class SinhVien extends NguoiDung
{
    public $diemPHPCB;
    public $diemPHP1;
    public $diemPHP2;
    

    public function __construct($name,$address,$birthdate,$email,$phoneNumber,$pointPHPCB,$pointPHP1,$pointPHP2)
    {
        parent::__construct($name,$address,$birthdate,$email,$phoneNumber);
        $this->diemPHPCB = $pointPHPCB;
        $this->diemPHP1 = $pointPHP1;
        $this->diemPHP2 = $pointPHP2;
    }

    public function GPA(){
        return ($this->diemPHPCB + $this->diemPHP1 + $this->diemPHP2) / 3;
    }

    public function info()
    {
        echo  $this->hoTen . '-' .
        $this->diaChi . '-' .
        $this->namSinh . '-' .
        $this->email . '-' .
        $this->sdt . '-' .
        $this->diemPHPCB . '-' .
        $this->diemPHP1 . '-' .
        $this->diemPHP2 . '-' .
        $this->GPA();
    }
}

$sv = new SinhVien('TtT','Thái Nguyên',2005,'abc@gmail.com','0326857005',7,7,7);
$sv->info();
echo '</br>';
echo $sv->GPA();

// Tạo một class GiangVien kế thừa lại class NguoiDung
// Có thêm các thuộc tính: luongCoBan, soGioDay
// Tạo phương thức set giá trị cho các thuộc tính trên (hàm __construct)
// Tạo phương thức tính lương của giảng viên = luongCoBan * soGioDay
// Tạo phương thức hiển thị toàn bộ thông tin của giảng viên
// Họ tên, Địa chỉ, Năm sinh, Tuổi, Email, SĐT, Tổng lương

// Yêu cầu: Khởi tạo 2 đối tượng sinh viên và giảng viên
// có đầy đủ các thuộc tính của cả class cha và class con

echo "<h3>Thông tin giáo viên</h3>";
class GiaoVien extends NguoiDung
{
    public $luongCoBan;
    public $soGioDay;

    public function __construct($name,$address,$birthdate,$email,$phoneNumber,$basicSalary,$hoursTeaching)
    {
        parent::__construct($name,$address,$birthdate,$email,$phoneNumber);
        $this->luongCoBan = $basicSalary;
        $this->soGioDay = $hoursTeaching;
    }

    public function Salary()
    {
        return $this->luongCoBan * $this->soGioDay;
    }

    public function infomation()
    {
        echo  $this->hoTen . '-' .
        $this->diaChi . '-' .
        $this->namSinh . '-' .
        $this->email . '-' .
        $this->sdt . '-' .
        $this->luongCoBan . '-' .
        $this->soGioDay . '-' .
        $this->Salary();
    }
}

$gv = new GiaoVien('TtT','Thái Nguyên',2005,'abc@gmail.com','0326857005',70,3);
$gv->infomation();