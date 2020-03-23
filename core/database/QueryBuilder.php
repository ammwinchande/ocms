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

    public function selectAll($table, $has_is_deleted_at)
    {
        if ($has_is_deleted_at) {
            $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE is_deleted <> 1");
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_CLASS);
        }
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectOne($table, $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = {$id}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
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
            gender_id=:gender_id, updated_at=:updated_at WHERE id=:id
        ");

        $now = new DateTime('now');

        $statement->bindParam(':first_name', $first_name);
        $statement->bindParam(':last_name', $last_name);
        $statement->bindParam(':town_name', $town_name);
        $statement->bindParam(':gender_id', $gender_id);
        $statement->bindParam(':updated_at', $now->format('Y-m-d H:i:s'));
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
			UPDATE {$table} SET gender_name=:gender_name, updated_at=:updated_at WHERE id=:id
        ");

        $now = new DateTime('now');
        $statement->bindParam(':gender_name', $gender_name);
        $statement->bindParam(':updated_at', $now->format('Y-m-d H:i:s'));
        $statement->bindParam(':id', $id);

        $statement->execute();
        return true;
    }

    public function deleteGender($table, $id)
    {
        try {
            $statement = $this->pdo->prepare("DELETE FROM {$table} WHERE id = {$id}");
            $statement->execute();
            return true;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Do a soft delete
     */
    public function setDeletedAt($table, $id)
    {
        $statement = $this->pdo->prepare("
			UPDATE {$table} SET deleted_at=:deleted_at WHERE id=:id
        ");

        $now = new DateTime('now');

        $statement->bindParam(':deleted_at', $now->format('Y-m-d H:i:s'));
        $statement->bindParam(':id', $id);

        $statement->execute();
    }

    public function setIsDeleted($table, $id)
    {
        try {
            $statement = $this->pdo->prepare("
                UPDATE {$table} SET is_deleted=:is_deleted, deleted_at=:deleted_at WHERE id=:id
            ");

            $now = new DateTime('now');
            $statement->bindParam(':is_deleted', 1);
            $statement->bindParam(':deleted_at', $now->format('Y-m-d H:i:s'));
            $statement->bindParam(':id', $id);

            dd($statement->execute());
            return true;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
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
