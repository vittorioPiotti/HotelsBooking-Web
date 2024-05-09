# Gestione Hotels Bootstrap PHP

Sito web per Gestione Hotel con account Cliente per Prenotazioni delle Stanze Hotel e account Admin per gestire il caricamento dei dati su Hotel e Stanze


## Documentazione 

- Documentazione Generale: [Link Doc Generale](https://github.com/vittorioPiotti/GestioneHotel-Bootstrap-PHP/tree/main/project)
- Documentazione Frontend: [Link Doc Client](https://github.com/vittorioPiotti/GestioneHotel-Bootstrap-PHP/tree/main/project/Client)
- Documentazione Backend: [Link Doc Server](https://github.com/vittorioPiotti/GestioneHotel-Bootstrap-PHP/tree/main/project/Server)



## Referenze

- Client: [Link al Client](https://gestionehotelclient.000webhostapp.com/) 
- Server: [Link al Server](https://gestionehotelserver.000webhostapp.com/)
- Mockup App Mobile: [Link al Mokcup](https://www.figma.com/proto/BpWZ6Xun7IkvYqavXrUkGt/GestioneHotel?type=design&scaling=scale-down&page-id=0%3A1&node-id=78-38&starting-point-node-id=71%3A150)
- App: [Link all'App]('https://sl2gz4.csb.app/')



## Alberi di Path


### Albero di Path Frontend

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



### Albero di Path Backend

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


## Permessi Utente

###  Permessi Universali

  - Autenticazione
  - Profilo

###  Permessi Cliente

  - Lista degli Hotels
  - Lista Stanze di Hotel
  - Prenotazione Stanza di Hotel
  - Lista Prenotazioni fatte dal Cliente
    
###  Permessi Admin

  - Lista degli Hotels Proprietari
  - Modifica Dati di Hotel Proprietario
  - Lista Prenotazioni ricevute dall'Admin


  
## Icona 

Icona realizzata con  [Figma](https://www.figma.com/)

<img src="https://github.com/vittorioPiotti/GestioneHotel/blob/main/icona.png" alt="Icona" width="200"/>


## Sito Desktop

### Autenticazione 

<img src="https://github.com/vittorioPiotti/GestioneHotel/blob/main/authDesktop.png" alt="Icona" width="400"/>


### Profilo  

<img src="https://github.com/vittorioPiotti/GestioneHotel/blob/main/profileDesktop.png" alt="Icona" width="400"/>


### Lista Hotels Cliente

<img src="https://github.com/vittorioPiotti/GestioneHotel/blob/main/hotelsDesktop.png" alt="Icona" width="400"/>


### Stanze di Hotel Cliente

<img src="https://github.com/vittorioPiotti/GestioneHotel/blob/main/hoteldesktop.png" alt="Icona" width="400"/>


### Prenotazione Client

<img src="https://github.com/vittorioPiotti/GestioneHotel/blob/main/bookDesktop.png" alt="Icona" width="400"/>


### Lista Hotels Admin

<img src="https://github.com/vittorioPiotti/GestioneHotel/blob/main/hotelsAdminDesktop.png" alt="Icona" width="400"/>


### Modifica Hotel Admin

<img src="https://github.com/vittorioPiotti/GestioneHotel/blob/main/hotelAdminDesktop.png" alt="Icona" width="400"/>


### Lista Prenotazioni

<img src="https://github.com/vittorioPiotti/GestioneHotel/blob/main/booksDesktop.png" alt="Icona" width="400"/>




## Sito Mobile


### Autenticazione 

<img src="https://github.com/vittorioPiotti/GestioneHotel/blob/main/authMobile.png" alt="Icona" width="400"/>


### Profilo  

<img src="https://github.com/vittorioPiotti/GestioneHotel/blob/main/profileMobile.png" alt="Icona" width="400"/>


### Lista Hotels Cliente

<img src="https://github.com/vittorioPiotti/GestioneHotel/blob/main/hotelsMobile.png" alt="Icona" width="400"/>


### Stanze di Hotel Cliente

<img src="https://github.com/vittorioPiotti/GestioneHotel/blob/main/hotelMobile.png" alt="Icona" width="400"/>


### Prenotazione Client

<img src="https://github.com/vittorioPiotti/GestioneHotel/blob/main/bookMobile.png" alt="Icona" width="400"/>


### Lista Hotels Admin

<img src="https://github.com/vittorioPiotti/GestioneHotel/blob/main/hotelsAdminMobile.png" alt="Icona" width="400"/>


### Modifica Hotel Admin

<img src="https://github.com/vittorioPiotti/GestioneHotel/blob/main/hotelAdminMobile.png" alt="Icona" width="400"/>


### Lista Prenotazioni

<img src="https://github.com/vittorioPiotti/GestioneHotel/blob/main/booksMobile.png" alt="Icona" width="400"/>



