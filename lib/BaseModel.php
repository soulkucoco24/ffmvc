<?php
class BaseModel extends SQLQuery
{
    protected  $_table;

    public function __construct()
    {
        $this->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->_table = strtolower(substr(get_class($this). 0, -5));
    }

    function __destruct()
    {
    }
}