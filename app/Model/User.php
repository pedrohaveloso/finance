<?php

namespace App\Model;

class User extends Model
{
    public static function insert(
        string $name,
        string $email,
        string $password
    ): bool {
        $query = self::db()->prepare(<<<SQL
            INSERT INTO `User` (`name`, `email`, `password`)
            VALUES (:name, :email, :password)
        SQL);

        $encryptedPassword = password_hash($password, PASSWORD_BCRYPT);

        $query->bindValue(':name', $name);
        $query->bindValue(':email', $email);
        $query->bindValue(':password', $encryptedPassword);

        return $query->execute();
    }

    public static function getByEmail(string $email): array|null
    {
        $query = self::db()->prepare(<<<SQL
            SELECT * FROM `User` WHERE `email` = :email
        SQL);

        $query->bindValue(':email', $email);

        $query->execute();

        return $query->fetchAll()[0] ?? null;
    }

    public static function isValidPassword(
        string $password,
        string $encryptedPassword
    ): bool {
        return password_verify($password, $encryptedPassword);
    }
}