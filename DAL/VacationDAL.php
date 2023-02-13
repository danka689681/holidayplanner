<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'\DAO\VacationDAO.php');


class VacationDAL {
    public function getVacationDataByUserId($userId) {
        $dao = new VacationDAO();
        $vacation = $dao->getVacationDataByUserId($userId);
        return $vacation;
    }

    public function insertVacationData($vacation) {
        $dao = new VacationDAO();
        $dao->insertVacationData($vacation);
    }
}

?>