# Frontend Hotels React PHP

Sito web per Gestione Hotel con account Cliente per Prenotazioni delle Stanze Hotel e account Admin per gestire il caricamento dei dati su Hotel e Stanze


## Documentazione 

- Documentazione Sito Web Backend: [Link Doc Client](https://github.com/vittorioPiotti/GestioneHotel-Bootstrap-PHP/tree/main/project/Client)
- Documentazione Applicazione Web: [Link Doc Server](https://github.com/vittorioPiotti/GestioneHotel-Bootstrap-PHP/tree/main/project/Server)



## Referenze

- Sito Web Frontend: [Link al Frontend](https://gestionehotelclient.000webhostapp.com/) 
- Sito Web Backend: [Link al Backend](https://gestionehotelserver.000webhostapp.com/)
- Mockup Appplicazione Web: [Link al Mokcup](https://www.figma.com/proto/BpWZ6Xun7IkvYqavXrUkGt/GestioneHotel?type=design&scaling=scale-down&page-id=0%3A1&node-id=78-38&starting-point-node-id=71%3A150)
- Applicazione Web: [Link all'App](https://sl2gz4.csb.app/)





## Albero di Path Frontend

```bash
$ tree
.
└── GestioneHotel
    │
    └── Client
        ├── /assets: immagini,stili e script
        │   ├── /css: stili personalizzati
        │   │   ├── auth.css
        │   │   ├── book.css
        │   │   ├── calendar.css
        │   │   ├── carousel.css
        │   │   ├── colors.css
        │   │   ├── footer.css
        │   │   ├── global.css
        │   │   ├── header.css
        │   │   ├── hotel.css
        │   │   ├── hotels.css
        │   │   ├── nunito.css
        │   │   ├── patterns.css
        │   │   └── rooms.css
        │   ├── /dist: librerie di stili e script
        │   │   ├── /css
        │   |   |   ├── bootstrap.bundle.min.js.map
        │   │   │   └── bootstrap.min.css
        │   │   └── /js
        │   │       ├── bootstrap.bundle.min.js
        │   │       ├── bootstrap.bundle.min.js.map
        │   │       └── jquery.min.js
        │   ├── /images
        │   │   ├── icon.png
        │   │   └── logo.png
        │   └── /js: script personalizzati
        │       ├── admin.js
        │       ├── ajax.js: gestore API js
        │       ├── auth.js
        │       ├── book.js
        │       ├── calnder.js
        │       ├── home.js
        │       ├── hotel.js
        │       ├── index.js
        │       ├── objects.js: oggetti utilizzati
        │       └── room.js
        ├── /src
        │   ├── /controllers: gestori API php
        │   │   ├── CAuth.php: gestore API per Profilo
        │   │   ├── CBooking.php: gestore API per Prenotazioni
        │   │   ├── CHotel.php: gestore API per Alberghi
        │   │   └── CRoom.php: gestore API per Stanze
        │   ├── /entities: entità utilizzate
        │   │   ├── EAdmin.php
        │   │   ├── EBooking.php
        │   │   ├── EClient.php
        │   │   ├── EHotel.php
        │   │   └── ERoom.php
        │   ├── /views: frontend pagine sito
        │   │   ├── VAuth.php
        │   │   ├── VBooking.php
        │   │   ├── VHotel.php
        │   │   └── VRoom.php
        │   └── autoloader.php
        └── index.php

```


