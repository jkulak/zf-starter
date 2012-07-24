<?php

/**
 * List
 *
 * @author Kuba
 * @version $Id$
 * @copyright __MyCompanyName__, 11 October, 2010
 * @package Jkl
 **/

class Jk_List implements Iterator
{
    private $_items = array();
    private $_key;

    function __construct()
    {
        $this->_key = 0;
    }

    public function current()
    {
        return $this->_list[$this->_key];
    }

    public function rewind()
    {
        $this->_key = 0;
    }

    public function key()
    {
        return $this->_key;
    }

    public function next()
    {
        $this->_key++;
    }

    public function valid()
    {
        return isset($this->_items[$this->_key]);
    }

    public function add($item)
    {
        $this->_items[] = $item;
    }

    public function getItems()
    {
        return $this->_items;
    }
}