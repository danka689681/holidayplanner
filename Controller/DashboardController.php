<?php
// Initialize the session
require __DIR__ . '/Controller.php';
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'\protected.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'\Model\Vacation.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'\DAL\VacationDAL.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'\Utils.php');


class DashboardController extends Controller {

    function __construct() {
    }

    public function index() {
        require __DIR__ . "/../View/Dashboard/index.php";    
        $userId = $_SESSION["userId"];
        $VacationDAL = new VacationDAL();
        $vacation = $VacationDAL->getVacationDataByUserId($userId);
        generateJsonFile($vacation, "\Model\Vacation.php");
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $dateRange = trim($_POST["daterange"]);
            $vacationName = trim($_POST["vacationName"]);
            list($startDate, $endDate) = explode(" - ", $dateRange);

            $begin = new DateTime($startDate);
            $end = new DateTime($endDate);
            $end->modify('+1 day');
            $interval = DateInterval::createFromDateString('1 day');
            $period = new DatePeriod($begin, $interval, $end);
            $days = 0;
            foreach ($period as $dt) {
                $days++;
            }
          
            $formattedStartDate = $begin->format('Y-m-d');
            $formattedEndDate = $end->format('Y-m-d');
            $newVacation = new Vacation();
            $newVacation->setUserId($userId);
            $newVacation->setPlannedHours(number_format($days * 8), 2);
            $newVacation->setStartDate($formattedStartDate);
            $newVacation->setEndDate($formattedEndDate);
            $newVacation->setName($vacationName);
            $VacationDAL->insertVacationData($newVacation);

            
          
        }
    }

   
}
?>
