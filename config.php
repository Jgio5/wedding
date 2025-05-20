<?php
// Dati di connessione al database
$host = '31.11.39.218';         // Host del database (se in locale, usi 'localhost')
$dbname = 'Sql1862938_1'; // Nome del tuo database
$username = 'Sql1862938';   // Il tuo username per il database
$password = 'Fiogiokiko.20';   // La tua password per il database

// Creazione della connessione
try {
    $conn = new mysqli($host, $username, $password, $dbname);
    
    // Verifica connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }
} catch (Exception $e) {
    echo "Errore durante la connessione al database: " . $e->getMessage();
    exit;
}
?>
