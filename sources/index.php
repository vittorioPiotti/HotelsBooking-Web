<?php


/*
  Hotels Booking Web v1.0.0 (https://github.com/vittorioPiotti/HotelsBooking-Web/releases/tag/1.0.0)
  Copyright 2024 Vittorio Piotti
  Licensed under GPL-3.0 (https://github.com/vittorioPiotti/HotelsBooking-Web/blob/main/LICENSE.md)
*/
/*
  Bootstrap v4.0.0 (https://getbootstrap.com)
  Copyright 2011-2018 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
*/


$sessionTTL = 360; 
session_set_cookie_params($sessionTTL);//tempo in cui client mantiene cookie
ini_set('session.gc_maxlifetime', $sessionTTL);//tempo in cui il server mantiene cookie
session_start();//da cancellare al logout con session_destroy
?>
<!doctype html>

<html lang="en" data-bs-theme="auto">
    
  <head>
    

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <meta property="og:title" content="Gestione Hotels">
    <meta property="og:description" content="Sito web per Gestione Hotel con account Cliente per Prenotazioni delle Stanze Hotel e account Admin per gestire il caricamento dei dati su Hotel e Stanze.">
    <meta property="og:url" content="https://vittoriopiotti.altervista.org/GestioneHotels/Online/Client/index.php">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://github.com/vittorioPiotti/Gestione-Hotels-Web/blob/main/socialpreview80.png?raw=true">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="640">
    <title>GH Gestione Hotel</title>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,700'>

    <link rel="stylesheet" href="assets/css/calendar.css">
    <link href="assets/css/header.css" rel="stylesheet">
    <link href="assets/css/footer.css" rel="stylesheet">
    <link href="assets/css/global.css" rel="stylesheet">
    <link href="assets/css/hotel.css" rel="stylesheet">
    <link href="assets/css/patterns.css" rel="stylesheet">
    <link href="assets/css/colors.css" rel="stylesheet">
    <link href="assets/css/carousel.css" rel="stylesheet">
    <link href="assets/css/hotels.css" rel="stylesheet">
    <link href="assets/css/auth.css" rel="stylesheet">
    <link href="assets/css/rooms.css" rel="stylesheet">
    <link href="assets/css/nunito.css" rel="stylesheet">
    <link href="assets/css/book.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="https://lh3.googleusercontent.com/u/0/drive-viewer/AKGpihYM4UvN1lHUxGRk1WO27xyDGstVx2tMkuzODUjk8C7EWyxhAkMGnk3XzyNBzHcMaaPSYhtdmfe5tqkIDoWdB5qTxwrp-EuQCxs=w2880-h1626" sizes="16x16">


  </head>

<body class="<?php echo ((isset($_GET['page']) && $_GET['page'] !== 'hotel' && $_GET['page'] !== 'auth') && (!isset($_GET['method']) || $_GET['method'] !== 'bookings')) ? 'pattern-mono' : 'pattern-color'; ?>">

    <?php
    require_once __DIR__ . '/src/autoloader.php';



          // Verifica se la variabile di sessione 'email' è valorizzata
          if (isset($_SESSION['email']) && isset($_SESSION['is_admin'])) {
              
              $at_index = strpos($_SESSION['email'], '@');

              $truncated_email = substr($_SESSION['email'], 0, $at_index);
              
              $dinamicHeaderTitle =  $truncated_email;
              $dinamicHeaderBody =  ($_SESSION['is_admin'])?'Admin':'Cliente';
            
          } 
          $page = '';

          // Verifica se è impostato il parametro 'page' nella query string
          if (isset($_GET['page'])) {
              // Assegna il valore del parametro 'page' alla variabile $page
              $page = $_GET['page'];
          }
          $method = '';
          if (isset($_GET['method'])) {
            // Assegna il valore del parametro 'page' alla variabile $page
            $method = $_GET['method'];
        }
        

// da php
$today = date('Y-m-d');
$tomorrow = date('Y-m-d', strtotime('+1 day'));

// Costruire l'URL in base al ruolo dell'utente
$is_admin = isset($_SESSION['is_admin']) ? $_SESSION['is_admin'] : 0;

// Costruisci l'URL in base al ruolo dell'utente
$url = $is_admin == 1 ?
    SERVER_ORIGIN . 'type=hotel&method=getHotelsByIdAdmin&idAdmin=' . $_SESSION['user_id'] :
    SERVER_ORIGIN . 'type=hotel&method=getAllHotels&today=' . urlencode($today) . '&tomorrow=' . urlencode($tomorrow);

// Ottenere i dati JSON degli hotel
$json_data = file_get_contents($url);

// Decodificare i dati JSON
$hotels_data = json_decode($json_data, true) ?? array();

// Inizializzare un array per memorizzare gli oggetti hotel
$hotels = array();
// Ciclare attraverso i dati degli hotel e creare gli oggetti hotel
foreach ($hotels_data as $hotel_data) {
    $hotel = new EHotel(
        $hotel_data['id'],
        $hotel_data['name'],
        $hotel_data['image'],
        $hotel_data['description'],
        $hotel_data['idAdmin'],
        $hotel_data['totalRooms'],
        $hotel_data['availability']
    );
    $hotels[] = $hotel;
}


// Verifica se è stato selezionato un hotel
if (isset($_GET['selectedHotel'])) {
    $selectedHotel = $_GET['selectedHotel'];
    // Effettua una ricerca per trovare l'ID dell'hotel corrispondente
    foreach ($hotels as $hotel) {
        if ($hotel->getName() === $selectedHotel) {
            // Reindirizza alla pagina della stanza con l'ID dell'hotel corrispondente
            header("Location: http://vittoriopiotti.altervista.org/GestioneHotels/Online/Client/index.php?page=room&hotelId=" . $hotel->getId());
            exit(); // Assicura che lo script si interrompa qui e non prosegua ulteriormente
        }
    }
    // Se l'hotel corrispondente non viene trovato, puoi gestire qui l'errore o reindirizzare altrove
}
?>






    <script>
      const dinamicHeaderTitle = "<?php echo $dinamicHeaderTitle; ?>";
      const dinamicHeaderBody = "<?php echo $dinamicHeaderBody; ?>";
    </script>

    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>


    <header class="navbar navbar-expand-lg bg-light sticky-top bg-light border border-bottom-1 ">
      <div class="container-fluid">
        <img src="https://lh3.googleusercontent.com/fife/ALs6j_Eu5dk6Dxczf1cUHtS-SDwnnL1XbNXgJ8vJfJlqOChaTxyEM3kGRMMhaeZoCelMbPKyeVOM7Wkaf1NivU1sk02_iXu_5qYDN2JmwdXjepc2zKN-e17hLZ_I80Ghalrl5UsdQbuhUVpnG5dbBpjlX2aB7f2EpM5fGJZQBL-rF0X6wrKSoIn9-DIFs-Z5hzegyyO76oOAwuTuU4BPCPVBqXPi1ZA5tiL9GTJqgQjnPEhvDIcpPEqo6A2EonS0h1UuxOmZizx_tBS4TLscaipedHWnkfTp4e_95uR71mRrE_nj5W3jCt_btUMp14PxbedVFPq83i-kJ59KQrnY8xtQlr80xtt-gxxRbihkCv2uS4HC4QJhrnv6Uqka_1T0RwDT5pyv91BgDR6zMh_bOGAwMf6Dy6Jc8KvxPa7ZUUpe6MSpdMmwSX-TnPEiWCKHohRRyh7mi5BVVo7yNMmYw3Y6DkAoE4MKM_NaYtVjGHCzn8JjL2xxjXwdRSbYmkyq4Z52_KOiBO35EiLa6KM6aKCujeSF-pir67erx23pVa2PoP_Dvj2aMcdyiViE8Y_Et3z-UKrPjgRgrmT0P0ygdRQItq3rdvnogyQ_u9x_X9EMGXIzs6O526KbR1uhFqLKdD8iS-ZDelMEauAlDRIi0iCEbS0ezpiNjOEW7kSb2bA87C7jBtuy_tIDGuKU-y-fGJBLivDsdTmIzdJjDwRAW_NeyIEJ47UCTShBHXyvwUWrdaLIC9epWon-m71u2eFbOmyRpygoOc3dsiZZmGyqchylPk6J7JfPFqWBVhCDXM7rZJW_EPAvVWoohi9W3Qcr4Cyd2uFvZ3bGD8FLfnaII_pqw7Ysf5TDGIy1f5WoH5cWqgog0wS0KCLS3a2av1Rj5uUjchD3X6l0dtxbOUJL6Q8-p9oCt9eEGLaM43MllbVpsfmxlob-S5LcgfuwlqRzYJ_3miusPPDGrDf1qaGdRBrFZuzHIPDlFB4Tzu6VAkZbOOzlVj2sHxqagfT0O6ajVK1hvbOX7Oow8GZ-AocFv_8I0cN-GOQ2s-iFvULUs5EKhqu0q_rFqocDEyMgyk-StQ5Ktg6LlBYipcMqInRUNlES95KI1RBQ9ZoX7Ds94Y-_GIQiQPR05WkMtyg8PX1alc0AQZ93ro-Exq1F9Aho6hKMrKj8Nedxb0M2WvkU0VcIiZsKJnl8HEknQzVTXPgK7dEwhsJheLlV9rrWroPbRDULyILibi1O_1NfagGq4z2qt5TNatp8pjoDGBHJvS7kSOuTCU6UcbbGRqskObnrurt7ijlg7rSsl8nd4jvhxXdOLprIrCebIndMc2RmRbK_0_rYiqqN-Z0CV-eqd_SFySI6EkAiXFNa-E5Byh7ag_yIBDoUKUe-Uq9hy90NS3wFhAIZWVTO_i9Fj3yqD44BzV-pR9IoyT9Bf3BuKPtOTQJuMTvLUa68ZArZgFrDyHGH4SBXN7D8_tRQG53WvGqCy2yk2hxtz4dbypF_R6mlUEiKMDlPl5x4icUU4NMTy7Dz1-VcAoqWhIyFyIXlAquj9aX8glPlKn2jcTYrkZQiICdUDSB5ZIrjuvKJPx_1TftxL3_s4i13wjghqm370Qt4Ag=w2880-h1626" class="logo-header" alt="Logo">
        <a class="navbar-brand" href="#">
            <span class="text-title-first-header custom-green">Gestione</span>
            <span class="text-title-second-header custom-red">Hotels</span>
        </a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarScroll" style="">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 200px;">
    <li class="nav-item">
        <a id="nav-profilo" class="nav-link fs-5 <?= ($page === 'auth') ? 'active' : '' ?>" aria-current="page" href="http://vittoriopiotti.altervista.org/GestioneHotels/Online/Client/index.php?page=auth&authState=login">Profilo</a>
    </li>
    <li class="nav-item">
        <a id="nav-hotels" class="nav-link fs-5 <?= (empty($page) || $page === 'hotel' || $page === 'home' || $page === 'room' || ($page === 'book' && $method == 'prebook')) ? 'active' : '' ?>" href="index.php">Hotels</a>
    </li>
    <li class="nav-item">
        <a id="nav-prenotazioni" class="nav-link fs-5 <?= ($page === 'book' && $method != 'prebook') ? 'active' : '' ?>" href="http://vittoriopiotti.altervista.org/GestioneHotels/Online/Client/index.php?page=book&method=bookings">Prenotazioni</a>
    </li>
    <li class="nav-item">
        <a id="nac-applicazione" href="https://www.figma.com/file/BpWZ6Xun7IkvYqavXrUkGt/GestioneHotel?type=design&mode=design&t=YAuFXEu2nwqNnR1v-1"  target="_blank" class="nav-link fs-5 ">App</a>
    </li>
</ul>

          <div id="dinamic-nav-item" class="d-none">
<!-- Modulo di ricerca -->
<form class="d-flex" role="search" method="get" action="index.php">
    <div class="input-group">
        <input class="form-control" list="datalistOptions" name="selectedHotel" id="selectedHotel" placeholder="Type to search...">
        <datalist id="datalistOptions">
            <?php foreach ($hotels as $hotel) : ?>
                <option value="<?php echo htmlspecialchars($hotel->getName()); ?>">
            <?php endforeach; ?>
        </datalist>
        <button class="input-group-text btn btn-outline-success" type="submit">Cerca</button>
    </div>
</form>

        </div>
        </div>
      </div>
    </header>
    <?php if (empty($_GET['page']) || $_GET['page'] === 'hotel'): ?>
      <section class="text-center pattern-mono ">
          <div class="col-lg-6 col-md-8 mx-auto p-3" style="max-width: 1000px">
              <div class="mt-4">
                  <div id="dinamic-header-title"></div>
                  <div id="dinamic-header-body"></div>
                  <div id="dinamic-header-btn"></div>       
              </div>
          </div>
      </section>
    <?php endif; ?>



    
<main id="main-content">

<?php



if ($page) {
    
    
    switch ($page) {
        case 'auth':
            $controller = new CAuth();
            break;
        case 'book':
            $controller = new CBooking();
            break;
        case 'room':
            $controller = new CRoom();
            break;
        case 'hotel':
        default:
            $controller = new CHotel();
            break;
    }
} else {
    $controller = new CHotel();
}

  ob_start();
  
  $controller->index();
  $content = ob_get_clean();
  echo $content;
 

?>

</main>


<footer id="footer" class="d-flex flex-wrap d-none  justify-content-between align-items-center py-3 my-4 border-top mb-0 p-2 bg-light border border-top-1 ">
  <p class="col-md-4 mb-0 text-body-secondary">
    <span class="text-title-first-footer custom-green">Gestione</span>
    <span class="text-title-second-footer custom-red">Hotels</span>
  </p>

  <a href="#" class="col-md-4 d-flex align-items-center justify-content-center  mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
    <img src="https://lh3.googleusercontent.com/fife/ALs6j_Eu5dk6Dxczf1cUHtS-SDwnnL1XbNXgJ8vJfJlqOChaTxyEM3kGRMMhaeZoCelMbPKyeVOM7Wkaf1NivU1sk02_iXu_5qYDN2JmwdXjepc2zKN-e17hLZ_I80Ghalrl5UsdQbuhUVpnG5dbBpjlX2aB7f2EpM5fGJZQBL-rF0X6wrKSoIn9-DIFs-Z5hzegyyO76oOAwuTuU4BPCPVBqXPi1ZA5tiL9GTJqgQjnPEhvDIcpPEqo6A2EonS0h1UuxOmZizx_tBS4TLscaipedHWnkfTp4e_95uR71mRrE_nj5W3jCt_btUMp14PxbedVFPq83i-kJ59KQrnY8xtQlr80xtt-gxxRbihkCv2uS4HC4QJhrnv6Uqka_1T0RwDT5pyv91BgDR6zMh_bOGAwMf6Dy6Jc8KvxPa7ZUUpe6MSpdMmwSX-TnPEiWCKHohRRyh7mi5BVVo7yNMmYw3Y6DkAoE4MKM_NaYtVjGHCzn8JjL2xxjXwdRSbYmkyq4Z52_KOiBO35EiLa6KM6aKCujeSF-pir67erx23pVa2PoP_Dvj2aMcdyiViE8Y_Et3z-UKrPjgRgrmT0P0ygdRQItq3rdvnogyQ_u9x_X9EMGXIzs6O526KbR1uhFqLKdD8iS-ZDelMEauAlDRIi0iCEbS0ezpiNjOEW7kSb2bA87C7jBtuy_tIDGuKU-y-fGJBLivDsdTmIzdJjDwRAW_NeyIEJ47UCTShBHXyvwUWrdaLIC9epWon-m71u2eFbOmyRpygoOc3dsiZZmGyqchylPk6J7JfPFqWBVhCDXM7rZJW_EPAvVWoohi9W3Qcr4Cyd2uFvZ3bGD8FLfnaII_pqw7Ysf5TDGIy1f5WoH5cWqgog0wS0KCLS3a2av1Rj5uUjchD3X6l0dtxbOUJL6Q8-p9oCt9eEGLaM43MllbVpsfmxlob-S5LcgfuwlqRzYJ_3miusPPDGrDf1qaGdRBrFZuzHIPDlFB4Tzu6VAkZbOOzlVj2sHxqagfT0O6ajVK1hvbOX7Oow8GZ-AocFv_8I0cN-GOQ2s-iFvULUs5EKhqu0q_rFqocDEyMgyk-StQ5Ktg6LlBYipcMqInRUNlES95KI1RBQ9ZoX7Ds94Y-_GIQiQPR05WkMtyg8PX1alc0AQZ93ro-Exq1F9Aho6hKMrKj8Nedxb0M2WvkU0VcIiZsKJnl8HEknQzVTXPgK7dEwhsJheLlV9rrWroPbRDULyILibi1O_1NfagGq4z2qt5TNatp8pjoDGBHJvS7kSOuTCU6UcbbGRqskObnrurt7ijlg7rSsl8nd4jvhxXdOLprIrCebIndMc2RmRbK_0_rYiqqN-Z0CV-eqd_SFySI6EkAiXFNa-E5Byh7ag_yIBDoUKUe-Uq9hy90NS3wFhAIZWVTO_i9Fj3yqD44BzV-pR9IoyT9Bf3BuKPtOTQJuMTvLUa68ZArZgFrDyHGH4SBXN7D8_tRQG53WvGqCy2yk2hxtz4dbypF_R6mlUEiKMDlPl5x4icUU4NMTy7Dz1-VcAoqWhIyFyIXlAquj9aX8glPlKn2jcTYrkZQiICdUDSB5ZIrjuvKJPx_1TftxL3_s4i13wjghqm370Qt4Ag=w2880-h1626" class="logo-footer" alt="Logo">

  </a>

  <ul  id="nav-tabs"class="nav col-md-4 justify-content-end">
  <li class="nav-item">
        <a id="footer-profilo" href="http://vittoriopiotti.altervista.org/GestioneHotels/Online/Client/index.php?page=auth&authState=login" class="nav-link px-2 text-body-secondary fs-5 <?= ($page === 'auth') ? 'fw-bold' : '' ?>">Profilo</a>
    </li>
    <li class="nav-item">
        <a id="footer-hotels" href="index.php" class="nav-link px-2 text-body-secondary fs-5 <?= (empty($page) || $page === 'hotel' || $page === 'home' || $page === 'room' || ($page === 'book' && $method == 'prebook')) ? 'active' : '' ?>">Hotels</a>
    </li>
    <li class="nav-item">
        <a id="footer-prenotazioni" href="#" class="nav-link px-2 text-body-secondary fs-5 <?= ($page === 'book' && $method != 'prebook') ? 'active' : '' ?>">Prenotazioni</a>
    </li>
    <li class="nav-item">
        <a id="footer-applicazione" href="https://www.figma.com/file/BpWZ6Xun7IkvYqavXrUkGt/GestioneHotel?type=design&mode=design&t=YAuFXEu2nwqNnR1v-1" class="nav-link px-2 text-body-secondary fs-5 "  target="_blank">App</a>
    </li>
  </ul>
</footer>

<div class="modal fade" id="modal-feed" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div id="modal-content"class="modal-content pattern-mono-js">
                    <div class="modal-body text-center m-1 pt-4" >
                      <div id="modal-svg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-x-circle text-danger" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                          </svg>
                          </div>

                        <p class="fw-bold fs-3 mt-4" id="modal-title">             
                            Invalid input
                        </p>
                        <p class="fs-6 text-muted" id="modal-desc">
                            Please enter only integers
                        </p>
                        <button id="modal-btn-conferma"class="btn btn-success text-white pe-3 ps-3 p-1 fw-ligh float-end d-none ms-3" data-bs-target="#modal-feed" data-bs-toggle="modal">Conferma</button>
                        <button id="modal-btn-annulla" class="btn btn-secondary text-white pe-3 ps-3 p-1 fw-ligh float-end d-none " data-bs-target="#modal-feed" data-bs-toggle="modal">Annulla</button>

                        <button id="modal-btn-chiudi"class="btn btn-info text-white pe-3 ps-3 p-1 fw-ligh float-end" data-bs-target="#modal-feed" data-bs-toggle="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>


<script src="assets/dist/js/jquery.min.js"></script>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
<script src='https://npmcdn.com/react@15.3.0/dist/react.min.js'></script>
<script src='https://npmcdn.com/react-dom@15.3.0/dist/react-dom.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment-with-locales.min.js'></script>
<script src='https://npmcdn.com/react@15.3.0/dist/react.min.js'></script>
<script src='https://npmcdn.com/react-dom@15.3.0/dist/react-dom.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment-with-locales.min.js'></script>
<script src="assets/js/objects.js"></script>
<script src="assets/js/ajax.js"></script>
<script src="assets/js/index.js"></script>
<script  src="assets/js/calendar.js"></script>
<script  src="assets/js/hotel.js"></script>
<script src="assets/js/hotel.js"></script>
<script src="assets/js/auth.js"></script>
<script src="assets/js/home.js"></script>
<script src="assets/js/room.js"></script>
<script src="assets/js/book.js"></script>
<script src="assets/js/admin.js"></script>


    </body>
</html>





