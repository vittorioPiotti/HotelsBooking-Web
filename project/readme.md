# Progetto Gestione Hotels Bootstrap PHP

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



## Albero di Path Backend

```bash
$ tree
.
└── GestioneHotel
    └── Server
    	├── /src
    	│   ├── /foundations: gestori API
    	│   │   ├── FAPI.php: main gestore API
    	│   │   ├── FAuth.php: gestore API Profilo
    	│   │   ├── FBooking.php: gestore API Prenotazioni
    	│   │   ├── FDB.php: gestore connessione DB
    	│   │   ├── FHotel.php: gestore API Alberghi
    	│   │   └── FRoom.php: gestore API Room
    	│   ├── /models: gestori Query DB
    	│   │   ├── MAdmin.php: 
    	│   │   ├── MBooking.php: gestore Query DB Prenotazioni
    	│   │   ├── MClient.php: 
    	│   │   ├── MHotel.php: gestore Query DB Alberghi
    	│   │   ├── MRoom.php: gestore Query DB Stanze
    	│   │   └── MUser.php: gestore Query DB Utente
    	│   ├── /serializers: serializzazione risposte Query
    	│   │   ├── SBooking.php
    	│   │   ├── SHotel.php
    	│   │   └── SRoom.php
    	│   └── autoloader.php
    	└── index.php

```



