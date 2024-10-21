<?php


/*
  Hotels Booking Web v1.0.0 (https://github.com/vittorioPiotti/HotelsBooking-Web/releases/tag/1.0.0)
  Copyright 2024 Vittorio Piotti
  Licensed under GPL-3.0 (https://github.com/vittorioPiotti/HotelsBooking-Web/blob/main/LICENSE.md)
*/

    define("SERVER_ORIGIN", "https://vittoriopiotti.altervista.org/GestioneHotels/Online/Server/index.php?");
        
    require_once __DIR__ . '/controllers/CAuth.php';
    require_once __DIR__ . '/controllers/CBooking.php';
    require_once __DIR__ . '/controllers/CHotel.php';
    require_once __DIR__ . '/controllers/CRoom.php';

    require_once __DIR__ . '/entities/EAdmin.php';
    require_once __DIR__ . '/entities/EBooking.php';
    require_once __DIR__ . '/entities/EClient.php';
    require_once __DIR__ . '/entities/EHotel.php';
    require_once __DIR__ . '/entities/ERoom.php';

    require_once __DIR__ . '/views/VAuth.php';
    require_once __DIR__ . '/views/VBooking.php';
    require_once __DIR__ . '/views/VHotel.php';
    require_once __DIR__ . '/views/VRoom.php';

?>
