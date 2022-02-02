<?php

namespace db;

class Task
{
    private $connect;

    public function __construct()
    {
        $this->connect = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public function all()
    {
        if ($this->connect->connect_errno != 0) {
            exit($this->connect->connect_error);
        }

        $query = "SELECT * FROM task;";
        $result = $this->connect->query($query);

        if (!$result) {
            //TODO log of error
            return [];
        }

        $tasks = $result->fetch_all(MYSQLI_ASSOC);

        return $tasks;
    }

    public function add($name)
    {
        $query = "INSERT INTO `task` (`id`, `name`) VALUES (NULL, '$name');";

        $this->connect->query($query);

    }

    public function change($id, $name)
    {
        $query = "UPDATE `task` SET `name` = '$name' WHERE `task`.`id` = $id;";

        $this->connect->query($query);
    }

    public function delete($id)
    {
        $query = "DELETE FROM `task` WHERE `task`.`id` = $id";

        $this->connect->query($query);
    }

    public  function getItem($id)
    {
      $query = "SELECT * FROM `task` WHERE task.id =$id";

      $result = $this->connect->query($query);

      $task = $result->fetch_assoc();

      return $task;

    }

}
