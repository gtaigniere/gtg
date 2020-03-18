<?php

namespace Manager;

use PDO;
use Model\User;

/*
require_once ROOT_DIR . 'manager/Manager.php';
require_once ROOT_DIR . 'config/MyPdo.php';
require_once ROOT_DIR . 'model/User.php';
*/

class UserManager extends Manager
{
    /**
     * UserManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct('User', $db);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        try {
            $this->db->exec("set names utf8");
            $stmt = $this->db->query('SELECT * FROM user');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $objs = [];
            foreach ($results as $assocs) {
                $objs[] = $this->convInObj($assocs);
            }
            return $objs;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param int $id
     * @return User|null
     */
    public function findOne(int $id): ?User
    {
        try {
            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT * FROM user WHERE idUser = :id');
            $stmt->execute([':id' => $id]);
            $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $assocs ? $this->convInObj($assocs) : null;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param User $user
     * @return User|null
     */
    public function insert(User $user): ?User
    {
        try {
            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare(
                'INSERT INTO user (idUser, pseudo, email, pwd, confirmKey, confirmed)
                            VALUES (idUser=:id, pseudo=:pseudo, email=:email, pwd=:pwd, confirmKey=:confirmKey, confirmed=:confirmed'
            );
            if ($stmt->execute(
                [
                    ':id' => $user->getIdUser(),
                    ':pseudo' => $user->getPseudo(),
                    ':email' => $user->getEmail(),
                    ':pwd' => $user->getPwd(),
                    ':confirmKey' => $user->getConfirmKey(),
                    ':confirmed' => $user->isConfirmed()
                ]
            )) {
                $id = $this->db->lastInsertId();
                return $this->findOne($id);
            }
            return null;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        try {
            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('DELETE FROM user WHERE idUser = :id');
            $stmt->execute([':id' => $id]);
            return $stmt->rowCount();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param User $user
     * @return User|null
     */
    public function update(User $user): ?User
    {
        try {
            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare(
                'UPDATE user
                            SET pseudo=:pseudo, email=:email, pwd=:pwd, confirmKey=:confirmKey, confirmed=:confirmed
                            WHERE idUser=:id');
            if ($stmt->execute(
                [
                    ':pseudo' => $user->getPseudo(),
                    ':email' => $user->getEmail(),
                    ':pwd' => $user->getPwd(),
                    ':confirmKey' => $user->getConfirmKey(),
                    ':confirmed' => $user->isConfirmed(),
                    ':id' => $user->getIdUser()
                ]
            )) {
                return $this->findOne($user->getIdUser());
            }
            return null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}