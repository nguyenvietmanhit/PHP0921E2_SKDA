<?php
//oop_basic.php
// Các thuật ngữ trong lập trình hướng đối tượng
// 1/ Class: lớp, là 1 khuôn mẫu cho các đối tượng sinh ra từ nó
// 1 lớp: 1 bản thiết kế trên giấy ngôi nhà
// -> sinh ra nhiều object từ class này: xây nhà Linh, xây nhà Tuấn -> mọi ngôi nhà đều dựa trên bản
//thiết kế -> mọi đôí tượng sinh ra từ 1 class đều dựa trên khung của class đó
class House {
  // Khai báo thuộc tính/phương thức
  public $number_floor; //số tầng của ngôi nhà
}

// 2/ Object: là đối tượng chỉ đc sinh ra từ class, có thông tin cụ thể của chính nó nhưng luôn
//luôn phải dựa từ khung của class
// Object cụ thể hóa - truy cập thuộc tính/phương thức - các thông tin từ class
$house_a = new House();
// Truy cập thuộc tính từ class, gán giá trị cụ thể cho obj này
$house_a->number_floor = 5;

$house_b = new House();
$house_b->number_floor = 10;
// 3 / Thuộc tính của class (Member variable)
// Mô tả các thông tin cho class đó, class có đặc điểm gì
class MemberVariable { //convention: tên class viết hoa ký tự đầu của từng từ
  // Khai báo thuộc tính cho class, thuộc tính bên trong class <=> biến thông thường
  public $name;
  public $age;
  public $created_at;
}
// Dùng obj sinh ra để truy cập thuộc tính public của class
$member1 = new MemberVariable();
$member1->name = 'manhnv';
$member1->age = 31;
$member1->created_at = '16/12/2021';

$member2 = new MemberVariable();
$member2->name = 'manhnv2';
$member2->age = 22;
$member2->created_at = '22/12/2022';
// 4 / Phương thức của class (Member function)
// - Là các hành vi của class -> class có thể làm đc gì -> là các hàm của PHP thuần
class MemberFunction {
  // Thuộc tính
  public $name;

  // Phương thức
  public function getName($name) {
    echo "Tên của bạn: $name";
  }

  public function show() {
    echo "Show";
  }
}
$function1 = new MemberFunction();
$function1->getName('manhnv'); //Tên của bạn: manhnv
$function1->show(); //Show

$function2 = new MemberFunction();
$function2->getName('manhnv2'); //Tên của bạn: manhnv2
$function2->show(); //Show

// 5 - Phương thức khởi tạo của class (Constructor function)
// + Là 1 phương thức đc tự động chạy sau khi khởi tạo đối tượng với từ khóa new
// + Phải là public
class ConstructorClass1 {
  // Phương thức khởi tạo ko có tham số
  public function __construct() {
    echo "Constructor chạy tự động ngay sau khi khởi tạo obj";
  }

  public $name;

  public function showInfo() {
    echo "showInfo";
  }
}
$construct1 = new ConstructorClass1();

class ConstructorClass2 {
  //Phương thức khởi tạo có tham số
  public function __construct($name, $age) {
    echo "Name: $name, Age: $age";
  }

//  public function __destruct()
//  {
//    // TODO: Implement __destruct() method.
//  }
}
// Nếu class có phương thức khởi tạo có tham số, thì bắt buộc phải truyền vào giá trị
//tương ứng khi khởi tạo đối tượng
$construct2 = new ConstructorClass2('manhnv', 31);
// Name: manhnv, Age: 31

// 6 - Từ khóa this: sử dụng bên trong class, tham chiếu đến chính class đó
class ThisTest {
  public $name;
  public $age;

  public function showName() {
    // Sử dụng this khi muốn tham chiếu đến chính thuộc tính/phương thức trong nội bộ class đó
    $this->name = 'ABC';
    echo $this->name;
  }

  public function test() {
    $this->showName();
  }
}
$this_test_1 = new ThisTest();
$this_test_1->showName(); //ABC

// 7 - Phạm vi truy cập: là các từ khóa đặt trc tên thuộc tính/phương thức để gán quyền truy cập
// Có 3 pham vi truy cập: private, protected, public
// + private
class TestPrivate {
  public $name;
  private $age;

  public function showName() {
    echo "showName";
    // Bên trong class truy cập thoải mái
    $this->age = 31; //ok
  }

  private function showAge() {
    echo "showAge";
  }
}
$test_private_1 = new TestPrivate();
// Obj sinh ra ko thể truy cập đc TT/PT private của class
//$test_private_1->age = 31;
//echo $test_private_1->age; //31 ?

// + protected: chỉ truy cập đc TT/PT bên trong nội bộ class và bên trong class kế thừa từ nó
class TestProtected {
  private $name;
  protected $age;
}

class ChildrenProtected extends TestProtected {
  public function test() {
    $this->age = 30; //ok
    // $this->name = 'abc'; // báo lỗi
  }
}

$children1 = new ChildrenProtected();
//$children1->age = 123; // báo lỗi

// + public: truy cập đc từ mọi nơi, ko qtrong trong hay ngoài class

// 8 - Từ khóa static: đứng trước tên TT/PT và đứng sau phạm vi truy cập, tạo ra các TT/PT tĩnh
class TestStatic {
  public static $name;

  public static function show() {
    // Từ khóa self giống như $this: đc sử dụng bên trong chính class của nó, tuy nhiên self dùng để tham
    //chiếu đến TT/PT tĩnh bên trong class
    self::$name = 'manhnv';
    // TestStatic::$name = 'manhnv'; //ok, nhìn ko chuyên nghiệp -> self
    //$this->name = 'abcdef'; // báo lỗi
    echo "show";
  }
}
//$test_static = new TestStatic();
//$test_static->name = 'abc'; // -> báo lỗi ko thể truy cập thuộc tính tĩnh sử dụng obj
// Mà bắt buộc sử dụng cú pháp sau để truy cập TT/PT tĩnh:
TestStatic::$name = 'abc'; // ok
TestStatic::show(); //show

// 9 - Từ khóa extends: thể hiện cho tính kế thừa trong OOP, PHP chỉ hỗ trợ đơn kế thừa
// Tính kế thừa giúp class con sử dụng lại các TT/PT từ class cha ở 2 phạm vi truy cập protected và public
class Person {
  public $name;
  protected $age;
  private $address;

  public function run() {
    echo "run";
  }
}

class Student extends Person {
  // class Student truy cập đc TT/PT protected và public từ class Person
  public $student_id; //mã sinh viên

  public function getAge() {
    $this->age = 31;
    $this->name = 'abc';
    // $this->address = 'a'; // báo lỗi
  }
}

class Engineer extends Person {
  // class Engineer truy cập đc TT/PT protected và public từ class Person
}

// Tính kế thừa thể hiện quan hệ thực tế is-a trong thế giới thật
//class Dog extends Person {
//
//}

// 10 - Từ khóa abstract: thể hiện cho tính trừu tượng của OOP, dùng cho thiết kế hệ thống để tạo ra các
//khung mẫu -> tạo ra 1 chuẩn nào đó cho hệ thống
abstract class TestAbstract {
  public $name;
  public $age;

  public function show() {
    echo "show";
  }

  // Class abstract chứa các phương thức abstract, là phương thức ko có body
  abstract public function run();
}
// class trừu tượng chỉ đc dùng cho mục đích kế thừa, ko thể khởi tạo obj từ class trừu tượng này
 // $test_abstract_1 = new TestAbstract(); // báo lỗi
class ChildrenAbstract extends TestAbstract {
  // Class con bắt buộc phải định nghĩa lại phương thức trừu tượng của class trừu tượng
  public function run() {
    echo "Run childrend abstract";
  }
}

// - Từ khóa implements: thể hiện cho tính đa hình trong OOP, sử dụng thông qua interface
// Interface cũng dùng trong thiết kế hệ thống như abstract
// 1 class có thể thực thi (implement) nhiều interface
// Nghĩ interface như các plugin khi cài phần mềm
interface Config {
  // Không thể khai báo thuộc tính
  // Phương thức trong interface bắt buộc phải là public, ko đc có body
  public function sendMail();

  public function readMail();
}

class TestConfig implements Config {
  public function sendMail() {
    echo "Send mail";
  }

  public function readMail() {
    echo "Read mail";
  }
}
// + Giống nhau giữa Abstract và Interface
// - Mục đích tạo ra khung cho hệ thống, nằm ở mức thiết kế hệ thống
// - Đều chứa các phương thức ko có nội dung để class khi extends/implement bắt buộc phải định nghĩa lại
// + Khác nhau:
// - Từ khóa thực thi, abstract -> extends, interface -> implements
// - 1 class chỉ kế thừa đc 1 abstract, nhưng có thể thực thi nhiều interface
// - class abstract có thể chứa các TT/PT bình thường, tuy nhiên interface thì ko

// - 4 TÍNH CHẤT CỦA LẬP TRÌNH HƯỚNG ĐỐI TƯỢNG
// + Tính trừu tượng (Abstraction): thể hiện qua từ khóa abstract, từ các đối tượng giống nhau sẽ trừu tượng
//hóa lên 1 class trừu tượng, định nghĩa ra các phương thức chung cho mọi đối tượng triển khai theo ý nó ->
//tạo các chuẩn chung cho class con
// - Tính đóng gói (Encapsulation): thế hiện qua 3 từ khóa phạm vi truy cập, giúp che giấu thông tin của class
//đó với thế giới bên ngoài
// - Tính kế thừa (Inheritance): thể hiện qua từ khóa extends, giúp dựng 1 class dựa trên (kế thừa) từ 1 class
//có sẵn -> code tối ưu hơn
// - Tính đa hình (Polymorphism): thể hiện qua implement các interface, cùng 1 phương thức các class sẽ có
//cách triển khai (implement) khác nhau -> linh hoạt khi triển khai các phương thức


