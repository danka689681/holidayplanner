<?php
require_once("config.php");

class VacationDAO extends Database {

    function getVacationDataByUserId($userId) {
        try { 
            $stmt = $this->connection->prepare("SELECT vacation.id AS vacationId, users.id as userId, vacation.plannedHours, vacation.startDate, vacation.endDate, vacation.name FROM `vacation` INNER JOIN users ON users.id = ?");
            $stmt->execute([$userId]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Vacation');
            $vacation = $stmt->fetchAll();
            return $vacation;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function insertVacationData($vacation) {
            $stmt = $this->connection->prepare("INSERT INTO vacation (userId, plannedHours, startDate, endDate, name) VALUES ((SELECT id from users WHERE id=:userId), :plannedHours, :startDate, :endDate, :name)");
            $userId = $vacation->getUserId();
            $plannedHours = $vacation->getPlannedHours();
            $startDate = $vacation->getStartDate();
            $endDate =  $vacation->getEndDate();
            $name = $vacation->getName();

            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':plannedHours', $plannedHours);
            $stmt->bindParam(':startDate', $startDate);
            $stmt->bindParam(':endDate', $endDate);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
    }
}
?>