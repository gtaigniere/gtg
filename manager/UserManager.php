<?php

namespace Manager;

use Model\UserForSnip;
use Model\User;
use PDO;

class UserManager extends Manager
{
    /**
     * UserManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct(User::class, $db);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM user');
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objs = [];
        foreach ($results as $assocs) {
            $objs[] = $this->convInObj($assocs);
        }
        return $objs;
    }

    /**
     * @param int $id
     * @return User|null
     */
    public function findOne(int $id): ?User
    {
        $stmt = $this->db->prepare('SELECT * FROM user WHERE idUser = :id');
        $stmt->execute([':id' => $id]);
        $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $assocs ? $this->convInObj($assocs) : null;
    }

    /**
     * @param int $id
     * @return UserForSnip|null
     */
    public function findOneForSnippet(int $id): ?UserForSnip
    {
        $stmt = $this->db->prepare('SELECT idUser, pseudo FROM user WHERE idUser = :id');
        $stmt->execute([':id' => $id]);
        $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($assocs ? $this->convInObj($assocs, UserForSnip::class) : null);
    }

    /**
     * @param User $user
     * @return User|null
     */
    public function insert(User $user): ?User
    {
        $stmt = $this->db->prepare(
            'INSERT INTO user (pseudo, email, pwd, confirmKey, confirmed)
                        VALUES (:pseudo, :email, :pwd, :confirmKey, :confirmed)'
        );
        if ($stmt->execute(
            [
                ':pseudo' => $user->getPseudo(),
                ':email' => $user->getEmail(),
                ':pwd' => $user->getPwd(),
                ':confirmKey' => $user->getConfirmKey(),
                ':confirmed' => $user->isConfirmed() ? 1 : 0
            ]
        )) {
            $id = $this->db->lastInsertId();
            return $this->findOne($id);
        }
        return null;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM user WHERE idUser = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount() > 0;
    }

    /**
     * @param User $user
     * @return User|null
     */
    public function update(User $user): ?User
    {
        $stmt = $this->db->prepare(
            'UPDATE user
                        SET pseudo=:pseudo, email=:email, pwd=:pwd, confirmKey=:confirmKey, confirmed=:confirmed
                        WHERE idUser=:id'
        );
        $pseudo = $user->getPseudo();
        $stmt->bindParam(':pseudo', $pseudo);
        $email = $user->getEmail();
        $stmt->bindParam(':email', $email);
        $pwd = $user->getPwd();
        $stmt->bindParam(':pwd', $pwd);
        $confirmKey = $user->getConfirmKey();
        $stmt->bindParam(':confirmKey', $confirmKey);
        $isConfirmed = $user->isConfirmed();
        $stmt->bindParam(':confirmed', $isConfirmed, PDO::PARAM_BOOL);
        $idUser = $user->getIdUser();
        $stmt->bindParam(':id', $idUser);
        if ($stmt->execute()) {
            return $this->findOne($user->getIdUser());
        }
        return null;
    }

}