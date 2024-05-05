# Backend Gestione Hotel Bootstrap PHP


## Referenze 

- Indice Progetto: [Link Indice Proj](https://github.com/vittorioPiotti/GestioneHotel-Bootstrap-PHP/tree/main)
- Documentazione Generale: [Link Doc Generale](https://github.com/vittorioPiotti/GestioneHotel-Bootstrap-PHP/tree/main/project)
- Documentazione Frontend: [Link Doc Client](https://github.com/vittorioPiotti/GestioneHotel-Bootstrap-PHP/tree/main/project/Client)


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




