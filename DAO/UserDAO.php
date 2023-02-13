<?php
require_once("config.php");

class UserDAO extends Database {

    function getUserByEmail($email) {
        try { 
            $stmt = $this->connection->prepare("SELECT id, email, groupId, password, admin, vacationHours, name, vacationHoursSpent FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();
            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
?>