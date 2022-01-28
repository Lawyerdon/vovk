<?php

namespace db;

class Task
{
    private $connect;

    public function __construct()
    {
        $connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public function all()
    {
        if ($this->connect->connect_errno != 0) {
            exit($this->connect->connect_error);
        }

        $query = "SELECT * FROM tasks;";
        $result = $this->connect->query($query);

        if (!$result) {
            //TODO log of error
            return null;
        }

        $tasks = $result->fetch_all(MYSQLI_ASSOC);

        return $tasks;
    }

    public function add()
    {

    }

}
