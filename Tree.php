<?php
require_once dirname(__FILE__).DIRECTORY_SEPARATOR .'Node.php';

const PREORDER_TRAVERSAL=1;
const POSTORDER_TRAVERSAL=2;
const MIDORDER_TRAVERSAL=3;
const BYLEVEL_TRAVERSAL=4;

class Tree
{
    /*
     * $list=array(`parentid`:[`id`]}
     * $elements= {`id`:`element`};
     * joomla: $db->loadObjectList('id');
     */
    public $rootId=0;
    
    private $list = array();
    private $elements = array();
    //output 
    private $output='';
    private $offset='';
    public $offsetPlaceholder='%%OFFSET%%';
    //handlers

    public function __construct($elements) {
    	$this->list[$this->rootId]=array();
    	$this->elements=$elements;
        $this->elements[0]=new Node(0);
        
        foreach ($elements as $el) {
            if (!isset($this->list[$el->parentid])){
            	$this->list[$el->parentid] = array();
            }
            array_push($this->list[$el->parentid],$el->id);
        }
    }
    /**
     * Traverse tree using preorder traversal
     * 
     */ 
    public function traverse($id, $traversalType=PREORDER_TRAVERSAL) {
       if($traversalType==PREORDER_TRAVERSAL){
           return $this->preOrderTraversal($id);
       }

       throw new Exception("Traversal type defined in traverse is not valid or not implemented!", 1);
    }
    
    private function preOrderTraversal($nodeId){
         if($nodeId==$this->rootId)
            $this->output='';

        if (!isset($this->list[$nodeId])||count($this->list[$nodeId])==0) return;

        foreach ($this->list[$nodeId] as $childId) {
            $child=$this->elements[$childId];
           
            $this->dataHandler($child,$this->elements[$nodeId]);            
            $this->outputConstructor($child);
            
            $this->preOrderTraversal($childId);
        }
    }

    public function setOffset($offset){
        $this->offset=$offset;
    }
    
    public function outputConstructor(Node $node){
        $this->output.=$node->offset.$node->data."<br/>";
    }

    public function dataHandler(Node $child, Node $parent){
         $child->offset = $this->offsetPlaceholder.$parent->offset;
    }

    public function __toString(){
        return str_replace($this->offsetPlaceholder,$this->offset,$this->output);
    }
}