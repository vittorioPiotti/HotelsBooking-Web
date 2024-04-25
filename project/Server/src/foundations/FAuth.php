<?php

    /**
     * @access public
     * @package foundation
     *
     * @author Vittorio Piotti
     *
     * Class FAuth
    */
    

    class FAuth {


        public function __construct() {
        }

        public function getRequest($apiMethod) {
            
            switch ($apiMethod) {
                default:
    
    
                // Crea un array con i dati
                $data = array(
                    'email' => 'client77@gmail.com',
                    'password' => 'client', // Utilizza la password hashata
                );
                // Impostazioni della richiesta
                $options = array(
                    'http' => array(
                        'method'  => 'POST',
                        'header'  => 'Content-type: application/x-www-form-urlencoded',
                        'content' => http_build_query($data)
                    )
                );
                
                // Creazione del contesto
                $context  = stream_context_create($options);
                
                // Esecuzione della richiesta POST
                $response = file_get_contents('http://gh.gestionehotel.local:8888/src/foundation/FAPI.php?type=auth&method=login&authState=client', false, $context);
                
                // Output della risposta
                    echo json_encode(array("error" => $response ));

                    
                    break;
            }
        }


        public function postRequest($apiMethod) {
            switch ($apiMethod) {
                case 'login':
                    $authState = isset($_GET['authState']) ? $_GET['authState'] : null;
                    $email = isset($_POST['email']) ? $_POST['email'] : null;
                    $password = isset($_POST['password']) ? $_POST['password'] : null;
                    $model = $authState == 'admin' ? new MAdmin() : new MClient();
                    echo json_encode(array("userId" =>  $model->login($email,$password)));
                    break;
                case 'register':
                    $authState = isset($_GET['authState']) ? $_GET['authState'] : null;
                    $email = isset($_POST['email']) ? $_POST['email'] : null;
                    $password = isset($_POST['password']) ? $_POST['password'] : null;
                    $model = $authState == 'admin' ? new MAdmin() : new MClient();
                    echo json_encode(array("register" =>  $model->register($email,$password)));
                    break;
                case 'delete':
                    $authState = isset($_GET['authState']) ? $_GET['authState'] : null;
                    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
                    $model = $authState == 'admin' ? new MAdmin() : new MClient();
                    echo json_encode(array("delete" =>  $model->deleteAccount($userId)));
                    break;
                default:
                    echo json_encode(array("error" => "Metodo non trovato"));
                    break;
            }
        }

    }


?>

