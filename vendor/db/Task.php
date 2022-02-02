<?php

namespace db;

use mysqli;

class Task
{
    private $connect;
    protected $table = 'tasks';

    public function __construct()
    {
        $this->connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    /**
     * get tasks list from storage
     * @return array|mixed tasks
     */
    public function all()
    {
        if ($this->connect->connect_errno != 0) {
            exit($this->connect->connect_error);
        }

        $query = "SELECT * FROM {$this->table};";
        $result = $this->connect->query($query);

        if (!$result) {
            return [];
        }

        $tasks = $result->fetch_all(MYSQLI_ASSOC);

        return $tasks;
    }

    /**
     * add new task to the storage
     * @param $name task name
     * @return bool|\mysqli_result
     */
    public function add(string $name)
    {
        $query = "INSERT INTO {$this->table} ( name) VALUES ('$name');";
        return $this->connect->query($query);
    }

    public function change(int $id,string $name)
    {
        $query = "UPDATE {$this->table} SET name = '$name' WHERE id = $id;";
        return $this->connect->query($query);
    }

    public function delete(int $id)
    {
        $query = "DELETE FROM {$this->table} WHERE id = $id";
        return $this->connect->query($query);
    }

    public function getItem(int $id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id =$id";
        $result = $this->connect->query($query);
        $task = $result->fetch_assoc();
        return $task;
    }

}
