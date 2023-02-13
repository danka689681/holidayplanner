<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'\DAO\UserDAO.php');


class UserDAL {
    public function getUserByEmail($email) {
        $dao = new UserDAO();
        $user = $dao->getUserByEmail($email);
        return $user;
    }
}

?>