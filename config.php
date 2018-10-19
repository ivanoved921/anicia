<?php 

class QueryBuilder
{
    public $pdo;

    function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost; dbname=antest", "root", "");
    }

    //Список задач
    function all($table) /// posts , articles, tasks
    {
        $sql = "SELECT * FROM $table ORDER BY id DESC"; //вывод в обратном порядке
        $statement = $this->pdo->prepare($sql); //подготовить
        $statement->execute(); //true || false
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    //Вывод всех задач по property
    function allByProperty($table, $property)
    {
        $sql = "SELECT * FROM $table ORDER BY property=:property DESC";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":property", $property);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    // Вывод одной задачи по логину
    function getOne($table, $login)
    {
        $sql = "SELECT * FROM $table WHERE login=:login";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":login", $login);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    // Вывод одной задачи по id
    function getOneId($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    //Сохранение новой задачи
    function store($table, $data)
    {
        // 1. Ключи массива
        $keys = array_keys($data);
        // 2. Сформировать строку title, content
        $stringOfKeys = implode(',', $keys);

        //3. Сформировать метки
        $placeholders = ":" . implode(', :', $keys);

        $sql = "INSERT INTO $table ($stringOfKeys) VALUES ($placeholders)";

        $statement = $this->pdo->prepare($sql);
        $store = $statement->execute($data); //true || false
        return $store;
    }

    //Изменение\обновление существующей задачи
    function update($table, $data)
    {
        $fields = '';

        foreach($data as $key => $value) {

            $fields .= $key . "=:" . $key . ",";
        }

        $fields = rtrim($fields, ',');


        $sql = "UPDATE $table SET $fields WHERE id=:id";

        $statement = $this->pdo->prepare($sql);
        $statement->execute($data); // true || false
    }

    //Удаление задачи
    function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }
}

?>