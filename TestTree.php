<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR.'Tree.php';

class TreeTest
{
    public function __construct() {
        $tree = new Tree(self::getTestNodes());
        $tree->setOffset('--');
        $tree->traverse($tree->rootId);
        
        echo $tree;
    }
    
    private static function getTestNodes() {
        return array('1' => new Node(1, 2, '1'), '2' => new Node(2, 4, '2'), '3' => new Node(3, 4, '3'), '4' => new Node(4, 0, '4'), '5' => new Node(5, 2, '5'), '11' => new Node(11, 2, '11'), '12' => new Node(12, 4, '12'), '13' => new Node(13, 4, '13'), '14' => new Node(14, 0, '14'), '15' => new Node(15, 2, '15')
        
        // '1'=>new Node(1,0,'A',''),
        //    '2'=>new Node(2,1,'A',''),
        //    '3'=>new Node(3,0,'A',''),
        //    '11'=>new Node(11,2,'A',''),
        //    '12'=>new Node(12,0,'A',''),
        //    '13'=>new Node(13,0,'A',''),
        //    '14'=>new Node(14,3,'A',''),
        //    '15'=>new Node(15,0,'A',''),
        //    '16'=>new Node(16,0,'A',''),
        //    '22'=>new Node(22,15,'A',''),
        //    '34'=>new Node(34,0,'A',''),
        //    '35'=>new Node(35,0,'A','')
        );
    }
}

$test = new TreeTest;
