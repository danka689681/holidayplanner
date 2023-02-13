<?php
class SwitchRouter {
    public function route($uri) {    
        // using a simple switch statement to route URL's to controller methods
        switch($uri) {

            case '': 
                require __DIR__ . '\Controller\LoginController.php';
                $controller = new LoginController();
                $controller->index();
                break;

            case 'dashboard': 
                require __DIR__ . '\Controller\DashboardController.php';
                $controller = new DashboardController();
                $controller->index();
                break;

            default:
                http_response_code(404);
                break;
        }
    }
}
?>