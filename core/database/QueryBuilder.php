<?php

/**
 * Responsible for building queries
 */
class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectOne($table, $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = {$id}");
        $statement->execute();

        return $statement->fetch(PDO::FETCH_CLASS);
    }

    public function createCustomer($table, $first_name, $last_name, $town_name, $gender_id)
    {
        $statement = $this->pdo->prepare("
			INSERT INTO {$table}(first_name, last_name, town_name, gender_id)
			VALUES(:first_name, :last_name, :town_name, :gender_id)
		");

        $statement->bindParam(':first_name', $first_name);
        $statement->bindParam(':last_name', $last_name);
        $statement->bindParam(':town_name', $town_name);
        $statement->bindParam(':gender_id', $gender_id);

        $statement->execute();
        return true;
    }

    public function updateCustomer($table, $id, $first_name, $last_name, $town_name, $gender_id)
    {
        $statement = $this->pdo->prepare("
            UPDATE {$table} SET first_name=:first_name, last_name=:last_name, town_name=:town_name,
            gender_id=:gender_id WHERE id=:id
		");

        $statement->bindParam(':first_name', $first_name);
        $statement->bindParam(':last_name', $last_name);
        $statement->bindParam(':town_name', $town_name);
        $statement->bindParam(':gender_id', $gender_id);
        $statement->bindParam(':id', $id);

        $statement->execute();
        return true;
    }

    public function deleteCustomer($table, $id)
    {
        $this->setIsDeleted($table, $id);
        $this->setDeletedAt($table, $id);

        $statement = $this->pdo->prepare("DELETE FROM {$table} WHERE id = {$id}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function createGender($table, $gender_name)
    {
        $statement = $this->pdo->prepare("
			INSERT INTO {$table}(gender_name)
			VALUES(:gender_name)
		");

        $statement->bindParam(':gender_name', $gender_name);

        $statement->execute();
        return true;
    }

    public function updateGender($table, $id, $gender_name)
    {
        $statement = $this->pdo->prepare("
			UPDATE {$table} SET gender_name=:gender_name WHERE id=:id
		");

        $statement->bindParam(':gender_name', $gender_name);
        $statement->bindParam(':id', $id);

        $statement->execute();
        return true;
    }

    public function deleteGender($table, $id)
    {
        $this->setDeletedAt($table, $id);
        $statement = $this->pdo->prepare("DELETE FROM {$table} WHERE id = {$id}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function setDeletedAt($table, $id)
    {
        $statement = $this->pdo->prepare("
			UPDATE {$table} SET deleted_at=:deleted_at WHERE id=:id
		");

        $statement->bindParam(':deleted_at', new DateTime('now'));
        $statement->bindParam(':id', $id);

        $statement->execute();
    }

    public function setIsDeleted($table, $id)
    {
        $statement = $this->pdo->prepare("
			UPDATE {$table} SET is_deleted=:is_deleted WHERE id=:id
		");

        $statement->bindParam(':is_deleted', 1);
        $statement->bindParam(':id', $id);

        $statement->execute();
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s(%s %s) values(%s %s)',
            $table,
            implode(' ,', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (Exception $e) {
            die('Whoops, something went really wrong' . $e->getMessage());
        }
    }
}
