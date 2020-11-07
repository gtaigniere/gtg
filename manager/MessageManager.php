<?php

namespace Manager;

use DateTime;
use Exception;
use Model\Message;
use PDO;

/**
 * Class MessageManager
 * @package Manager
 */
class MessageManager extends Manager
{
    /**
     * messageManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        Parent::__construct(Message::class, $db);
    }

    /**
     * @return Message[]
     */
    public function findAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM message');
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objs = [];
        foreach ($results as $assocs) {
            $objs[] = $this->convInObj($assocs);
        }
        return $objs;
    }

    /**
     * @param int $id
     * @return Message|null
     */
    public function findOne(int $id): ?Message
    {
        $stmt = $this->db->prepare('SELECT * FROM message WHERE id = :id');
        $stmt->execute([':id' => $id]);
        $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $assocs ? $this->convInObj($assocs) : null;
    }

    /**
     *
     * @param Message $message
     * @return Message|null
     * @throws Exception
     */
    public function insert(Message $message): ?Message
    {
        $dateNull = $message->getReceived() == null;
        $stmt = $this->db->prepare(
            'INSERT INTO message (firstname, mail, object, ' . (!$dateNull ? 'received, ' : '') . 'message)
                        VALUES (:firstname, :mail, :object, ' . (!$dateNull ? ':received, ' : '') . ':message)');
        $params = [
            ':firstname' => htmlentities($message->getFirstname()),
            ':mail' => htmlentities($message->getMail()),
            ':object' => htmlentities($message->getObject()),
            ':message' => htmlentities($message->getMessage())
        ];
        if (!$params) {
            $params[':received'] = $message->getReceived();
        }
        if ($stmt->execute($params)) {
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
        $stmt = $this->db->prepare('DELETE FROM message WHERE id=:id');
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount() > 0;
    }

}