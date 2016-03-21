<?php
class SQLQuery{
    protected $_db;
    protected $_result;

    /**
     * connect db
     *
     * @param $address
     * @param $account
     * @param $pwd
     * @param $name
     * @return bool
     */
    public function connect($address, $account, $pwd, $name)
    {
        $this->_db = mysqli_connect($address, $account, $pwd, $name);
        if ($this->_db != 0) {
            return true;
        } else {
            return false;
        }
    }

    public function disconnect()
    {
        if (mysqli_close($this->_db) != 0) {
            return true;
        } else {
            return false;
        }
    }

    public function selectAll()
    {
        $query = 'select * from `'.$this->_table.'`';
        return $this->query($query);
    }

    public function query($query, $singleResult = 0)
    {
//        $this->_result = mysqli_query($this->_db, $query);
//        $result = array();
//        $field = array();
//        $tempResults = array();
//        $numOfFields = mysqli_fie($this->_result);
    }
}