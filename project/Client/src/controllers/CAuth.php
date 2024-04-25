<?php
/**
 * @access public
 * @package views
 * @author Vittorio Piotti
 * Class CAuth
 */

class CAuth {
    
   
    public function index() {
        // Verifica se è stata richiesta la disconnessione
        if (isset($_GET['action']) && $_GET['action'] == 'logout') {
            $this->logout();
            return; // Interrompi l'esecuzione dopo la disconnessione
        }

        // Verifica se è stata richiesta la cancellazione dell'account
        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
            $this->deleteAccount();
            return; // Interrompi l'esecuzione dopo la cancellazione dell'account
        }

        // Altrimenti, gestisci normalmente l'autenticazione
        $authState = isset($_GET['authState']) ? $_GET['authState'] : ''; // Definizione di $authState
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($authState == 'register') {
                $this->register(); 
            } elseif ($authState == 'login') {
                $this->login(false); 
            } 
        } else {
            $this->doAuthAction($authState);
        }
    }
    
    // Metodo per gestire la disconnessione
  private function logout() {
    if (!session_id()) {
        session_start();
    }
    session_destroy();
    ?>
    <script>window.location.href = "../../index.php?page=auth&authState=login";</script>
    <?php
    exit(); 
}

    // Metodo per gestire la cancellazione dell'account
    private function deleteAccount() {
        $this->sendDeleteRequest();
        session_destroy();
        ?>
        <script>window.location.href = "../../index.php?page=auth&authState=login";</script>
        <?php
    }


    // Metodo per inviare la richiesta di eliminazione dell'account al server
    private function sendDeleteRequest() {
        $data = array(
            'userId' => $_SESSION['user_id']
        );

        $options = array(
            'http' => array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($data)
            )
        );

        $context = stream_context_create($options);
        $response = file_get_contents(SERVER_ORIGIN . 'type=auth&method=delete&authState=' . urlencode($_SESSION['is_admin']  == 1 ? 'admin' : 'cliente'), false, $context);

        return json_decode($response, true);
    }

    // Metodo per gestire l'azione di autenticazione
    private function doAuthAction($authState) {
        $view = new VAuth();
        if (isset($_SESSION['email']) && isset($_SESSION['is_admin'])) {   
            $view->viewAuthenticated($authState);
        } else {
            $view->viewAuthentication($authState);
        }
    }

    // Metodo per la registrazione di un nuovo utente
    private function register() {
        $authState = isset($_GET['authState']) ? $_GET['authState'] : ''; // Definizione di $authState
        $email = $_POST['email'];
        $password = $_POST['password'];
        $registerAsAdmin = isset($_POST['registerAsAdmin']);
        $hashedPassword = hash('sha3-256', $password);

        $data = array(
            'email' => $email,
            'password' => $hashedPassword, 
        );
        $options = array(
            'http' => array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $success = file_get_contents(SERVER_ORIGIN . 'type=auth&method=register&authState='. urlencode((!$registerAsAdmin) ?'client' :'admin'), false, $context);
        $response = json_decode($success, true); 
        $registered = $response['register']; 
        if ($registered == false) {
            $this->doAuthAction($authState);
        } else {
            $this->login($registerAsAdmin); 
        }
    }

    // Metodo per il login dell'utente
    private function login($lastState) {
        $authState = isset($_GET['authState']) ? $_GET['authState'] : ''; // Definizione di $authState
        if ($lastState) {
            $loginAsAdmin = true;
        } else {
            $loginAsAdmin = isset($_POST['loginAsAdmin']);
        }
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashedPassword = hash('sha3-256', $password);

        $data = array(
            'email' => $email,
            'password' => $hashedPassword, 
        );
        $options = array(
            'http' => array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $userIdJson = file_get_contents(SERVER_ORIGIN . 'type=auth&method=login&authState='. urlencode(($loginAsAdmin) ?'admin' :'client'), false, $context);

        $response = json_decode($userIdJson, true); 
        $userId = $response['userId']; 

        if ($userId == false) {                
            $this->doAuthAction($authState);
        } else {
            $_SESSION['user_id'] = $userId;
            $_SESSION['email'] = $email;
            $_SESSION['is_admin'] = $loginAsAdmin ? true : false;
            $this->doAuthAction($authState);
        }
    }
}

?>



