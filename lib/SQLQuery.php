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

    /**
     * disconnect db
     *
     * @return bool
     */
    public function disconnect()
    {
        if (mysqli_close($this->_db) != 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * select all from table
     *
     * @param $table
     * @return array
     */
    public function selectAll($table)
    {
        $query = 'select * from `'.$table.'`';
        return $this->query($query);
    }

    public function query($query, $singleResult = 0)
    {
        $this->_result = mysqli_query($this->_db, $query);
        $result = array();
        while ($arr = mysqli_fetch_assoc($this->_result)) {
            array_push($result, $arr);
        }
        return $result;
    }

    public function getError()
    {
        return mysqli_error($this->_db);
    }
}