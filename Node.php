<?php 
class Node
{
    public $id;
    public $parentid = '';
    public $offset = '';
    public $data='';

    public function __construct($id, $parentid=0, $data='',$offset=''){
    	$this->id=$id;
    	$this->parentid=$parentid;
        $this->data=$data;
        $this->offset=$offset;
    }
}