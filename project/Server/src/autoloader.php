<?php
    spl_autoload_register(function ($className) {
        // Directory radice delle classi
        $classDir = 'src/';

        // Mappa la prima lettera del nome della classe alla directory corrispondente
        $classMap = [
            'S' => 'serializers',
            'F' => 'foundation',
            'M' => 'models'

        ];
        // Estrai la prima lettera del nome della classe
        $firstLetter = strtoupper($className[0]);

        // Verifica se la mappatura esiste e imposta la directory corrispondente
        $classSubDir = $classMap[$firstLetter] ?? null;
        if (!$classSubDir) {
            // Se la mappatura non esiste, esci senza fare nulla
            return;
        }

        // Costruisci il percorso del file della classe
        $classFile = $classDir . $classSubDir . '/' . $className . '.php';
        // Verifica se il file della classe esiste e lo includi
        if (file_exists($classFile)) {
            include_once $classFile;
        }
    });

?>
