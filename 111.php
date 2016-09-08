<?php 

ini_set('display_errors', 1); /////////////////////////////
	error_reporting(E_ALL);///////////////////////////////////

class A {
    private function foo() {
        echo "a!\n";
    }
    public function test() {
        $this->foo();        
    }
}



class C extends A {
    private function foo() {
        echo "c!\n";/* исходный метод заменен; область действия нового метода С */
    }
}


$c = new C();
$c->test();   //не верно
?>