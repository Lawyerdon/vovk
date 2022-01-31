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

        $query = "SELECT * FROM tasks;";
        $result = $this->connect->query($query);

        if (!$result) {
            //TODO log of error
            return null;
        }

        $tasks = $result->fetch_all(MYSQLI_ASSOC);

        return $tasks;
    }

    public function add($id = null)
    {
        $article = $this->Articles->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Ваша статья была обновлена.'));
                return $this->redirect(['vendor' => 'index']);
            }
            $this->Flash->error(__('Ошибка обновления вашей статьи.'));
        }

        $this->set('article', $article);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('Статья с id: {0} была удалена.', h($id)));
            return $this->redirect(['vendor' => 'index']);
        }
    }

    public  function getItem($id)
    {
        return array($id);
    }

}
