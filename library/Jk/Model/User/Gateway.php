<?php

/**
* 
*/
class Jk_Model_User_Gateway
{

    protected $_db_table;

    public function __construct()
    {
        $this->_db_table = new Jk_Model_User_DbTable();
    }

    /**
     * 
     */
    public function create($data, $fillDefault = false)
    {
        return new Jk_Model_User($data, $this);
    }

    /**
     * 
     */
    public function fetchActive()
    {
        $data = $this->_db_table->fetchAll();
        $result = new Jk_List();

        foreach ($data->toArray() as $key => $value) {
            $result->add(new Jk_Model_User($value, $this));
        }
        return $result;
   }
}