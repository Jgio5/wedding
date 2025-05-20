<?php
// Dati di connessione al database
$host = '';
$dbname = '';
$username = '';
$password = '';

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
