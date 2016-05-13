<?php

class FileModel
{
    /* Имя пользователя */
    public $name = '';
    /* Список пользователей */
    public $list = array();
    /* Текущий пользователь: ассоциативный массив
    *	с элементами role и name для существующего пользователя
    *	или только с элементом name для неизвестного пользователя
    */
    public $user = array();

    public function parseUserDB()
    {
        $str = file_get_contents(USER_DB);
//        return unserialize($str);
        $this->list = unserialize($str);
    }

    public function findUserInDB($name)
    {
        $this->parseUserDB();
        $this->user['name'] = $name;
        foreach ($this->list as $key => $item) {

            if ($key == $name) {
                $this->user = array(
                    'name' => $key,
                    'role' => $item
                );
                break;
            }
        }

    }

    public function addUserToDB()
    {

        $this->parseUserDB();
        $this->list[$this->user['name']] = $this->user['role'];

        $NewUserList = serialize($this->list);
        file_put_contents(USER_DB, $NewUserList);

    }

    public function render($file)
    {
        /* $file - текущее представление */
        ob_start();
        include($file);
        return ob_get_clean();
    }
}