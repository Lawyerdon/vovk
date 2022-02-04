<?php

namespace db;

use http\Encoding\Stream;
use mysqli;

class News
{
    /**
     * @var mysqli
     */
    private $connect;

    protected $table = 'news';

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

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * add new task to the storage
     * @param $name task name
     * @return bool|\mysqli_result
     */
    public function add(string $title, string $text)
    {
        $query = "INSERT INTO {$this->table} (title, text) VALUES ('$title', '$text');";
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
