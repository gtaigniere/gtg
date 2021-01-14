<?php

namespace Manager;

use Model\{
    UserForSnip,
    User
};
use PDO;

/**
 * Class UserManager
 * @package Manager
 */
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
     * @return User[]
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
        if ($assocs) {
            $user = $this->convInObj($assocs);
            if ($user != null) {
                $userFS = new UserForSnip();
                $userFS->setIdUser($user->getIdUser());
                $userFS->setPseudo($user->getPseudo());
                return $userFS;
            }
        }
        return null;
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
                ':pseudo' => htmlentities($user->getPseudo()),
                ':email' => htmlentities($user->getEmail()),
                ':pwd' => htmlentities($user->getPwd()),
                ':confirmKey' => htmlentities($user->getConfirmKey()),
                ':confirmed' => htmlentities($user->isConfirmed()) ? 1 : 0
            ]
        )) {
            $id = $this->db->lastInsertId();
            return $this->findOne($id);
        }
        return null;
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
        $pseudo = htmlentities($user->getPseudo());
        $stmt->bindParam(':pseudo', $pseudo);
        $email = htmlentities($user->getEmail());
        $stmt->bindParam(':email', $email);
        $pwd = htmlentities($user->getPwd());
        $stmt->bindParam(':pwd', $pwd);
        $confirmKey = htmlentities($user->getConfirmKey());
        $stmt->bindParam(':confirmKey', $confirmKey);
        $isConfirmed = htmlentities($user->isConfirmed());
        $stmt->bindParam(':confirmed', $isConfirmed, PDO::PARAM_BOOL);
        $idUser = $user->getIdUser();
        $stmt->bindParam(':id', $idUser);
        if ($stmt->execute()) {
            return $this->findOne($user->getIdUser());
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

}
