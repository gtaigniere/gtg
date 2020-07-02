<?php

namespace Manager;

use DateTime;
use Exception;
use Model\Contact;
use PDO;

class ContactManager extends Manager
{
    /**
     * ContactManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        Parent::__construct(Contact::class, $db);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM contact');
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objs = [];
        foreach ($results as $assocs) {
            $objs[] = $this->convInObj($assocs);
        }
        return $objs;
    }

    /**
     * @param int $id
     * @return Contact|null
     */
    public function findOne(int $id): ?Contact
    {
        $stmt = $this->db->prepare('SELECT * FROM contact WHERE idCont = :id');
        $stmt->execute([':id' => $id]);
        $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $assocs ? $this->convInObj($assocs) : null;
    }

    /**
     *
     * @param Contact $contact
     * @return Contact|null
     * @throws Exception
     */
    public function insert(Contact $contact): ?Contact
    {
        $stmt = $this->db->prepare(
            'INSERT INTO Contact (firstname, mail, object, received, message)
                        VALUES (:firstname, :mail, :object, :received, :message)');
        if ($stmt->execute(
            [
                ':firstname' => htmlentities($contact->getFirstname()),
                ':mail' => htmlentities($contact->getMail()),
                ':object' => htmlentities($contact->getObject()),
                ':received' => (new DateTime())->format('Y-m-d H:i:s'),
                ':message' => htmlentities($contact->getMessage())
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
        $stmt = $this->db->prepare('DELETE FROM Contact WHERE idCont=:id');
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount() > 0;
    }

}