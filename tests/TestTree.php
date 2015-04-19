<?php
class TreeTest extends PHPUnit_Framework_TestCase
{
    public function testNodes() {
        $nodes = array('1' => new Tree\Node(1, 2, '1'), '2' => new Tree\Node(2, 4, '2'), '3' => new Tree\Node(3, 4, '3'), '4' => new Tree\Node(4, 0, '4'), '5' => new Tree\Node(5, 2, '5'), '11' => new Tree\Node(11, 2, '11'), '12' => new Tree\Node(12, 4, '12'), '13' => new Tree\Node(13, 4, '13'), '14' => new Tree\Node(14, 0, '14'), '15' => new Tree\Node(15, 2, '15'));
        
        $tree = new Tree\Tree($nodes);
        $tree->setOffset('--');
        $tree->traverse($tree->rootId);
        
        $this->assertEquals((string)$tree, '--4<br/>----2<br/>------1<br/>------5<br/>------11<br/>------15<br/>----3<br/>----12<br/>----13<br/>--14<br/>');
    }
}
