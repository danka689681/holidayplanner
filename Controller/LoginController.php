<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'\Model\User.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'\DAL\UserDAL.php');
require __DIR__ . '/Controller.php';


class LoginController extends Controller {
  private $userDAL; 
    
  function __construct() {
    $this->userDAL = new UserDAL();
  }

  public function index() {
    require __DIR__ . "/../View/Login/index.php";
    session_start();

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
      if ($_SESSION["access"] == "admin") {
        header("location: admin.php");
      } else {
        header("location: /dashboard");
      }
      exit;
    }
    $email = $password = "";
    $login_err = "";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = trim($_POST["email"]);
      $password = trim($_POST["password"]);
      // Validate credentials
      $UserDAL = new UserDAL();
      $user = $UserDAL->getUserByEmail($email);
      if(!empty($user)){  
        # echo password_hash("admin", PASSWORD_DEFAULT);
        if (password_verify($password, $user->getPassword())) {
          session_start();
          $_SESSION['loggedin'] = true;  
          $_SESSION["userId"] = $user->getId();
          $_SESSION["name"] = $user->getName();
          $_SESSION["groupId"] = $user->getGroupId();
          $_SESSION["vacationHours"] = $user->getVacationHours();
          $_SESSION["vacationHoursSpent"] = $user->getVacationHoursSpent();
          if ($user->getAdmin() == 1) {
            $_SESSION["access"] = "admin";    
            header("location: /admin");
          } else {
            $_SESSION["access"] = "employee";    
            header("location: /dashboard");
          }
        } else {
          $login_err = 'Invalid password.';
        }
      } else {
        $login_err =  'User does not exist!';
      }        
      if(!empty($login_err)){
        echo '<div class="alert alert-danger">' . $login_err . '</div>';
      }     
    }
  }       
}
?>