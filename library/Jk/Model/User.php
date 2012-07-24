<?php

/**
* 
*/
class Jk_Model_User
{

    protected $_gateway = null;

    protected $_data = array(
        'id' => null,
        'login' => null,
        'password' => null,

        'attachment_id' => null, //added to handle attachments
        );
    
    public function __construct($data, $gateway)
    {
        $this->setGateway($gateway);
        $this->populate($data);
    }

    public function setGateway(Jk_Model_User_Gateway $gateway)
    {
        $this->_gateway = $gateway;
        return $this;
    }

    public function getGateway()
    {
        return $this->_gateway;
    }

    public function populate($data)
    {
        if (!is_array($data)) {
            throw new Exception('Initial data must be an array');
        }

        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
        return $this;
    }

    public function __set($name, $value)
    {
        if (!array_key_exists($name, $this->_data)) {
            throw new Exception('Invalid ' . get_class() . ' property "' . $name . '"');
        }
        $this->_data[$name] = $value;
    }

    public function __get($name)
    {
        if (!array_key_exists($name, $this->_data)) {
            throw new Exception('Invalid property "' . $name . '"');
        }

        return $this->_data[$name];
    }

    public function __isset($name)
    {
        return isset($this->_data[$name]);
    }

    public function __unset($name)
    {
        if (isset($this->$name)) {
            $this->_data[$name] = null;
        }
    }

    public function setNext(Application_Model_Post $value)
    {
        $this->_next = $value;
    }

    public function getNext()
    {
        return $this->_next;
    }

    public function setPrevious(Application_Model_Post $value)
    {
        $this->_previous = $value;
    }

    public function getPrevious()
    {
        return $this->_previous;
    }

    public function setPageNum($value)
    {
        $this->_pageNum = $value;
    }

    public function getPageNum()
    {
        return $this->_pageNum;
    }

    /**
     * Insert or update, depending on existence of _data['id']
     */
    public function save()
    {
        $gateway = $this->getGateway();
        if (null === $this->id) {
            return $gateway->getDbTable()->insert($this->_data);
        } else {
            // update only data that is set, remove null
            $data = $this->_data;
            unset($data['id']);
            foreach ($data as $key => $value) {
                if (null === $value) {
                    unset($data[$key]);
                }
            }
            return $gateway->getDbTable()->update($data, '`id` = "' . $this->_data['id'] . '"');
        }
    }

    /**
     * Returns image URL from Xerocopy
     */
    public function image($format)
    {
        $xerocopy = Zend_Controller_Front::getInstance()->getParam('bootstrap')->getResource('xerocopy');
        return $xerocopy->image($this->_data['attachment_id'], $format);
    }
}