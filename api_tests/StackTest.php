<?php
class StackTest extends PHPUnit_Framework_TestCase {
    public function setUp()
    {
    }

    public function testStackIsInitiallyEmpty()
    {
        $stack = array('foo');
        $this->assertEmpty($stack);
        return $stack;
    }

    /**
     * @depends testStackIsInitiallyEmpty
     */
    public function testPushingAnElementOntoTheStackWorks(array $stack)
    {
        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        return $stack;
    }

    /**
     * @depends testPushingAnElementOntoTheStackWorks
     */
    public function testPoppingAnElementOffTheStackWorks(array $stack)
    {
        $this->assertEquals('foo', array_pop($stack));
        $this->assertEmpty($stack);
    }
}
?>
