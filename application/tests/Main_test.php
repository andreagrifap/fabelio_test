<?php

class Main_test extends TestCase{
    public function test(){
        $a = 5;
        $this->assertSame(5,$a);
    }
}