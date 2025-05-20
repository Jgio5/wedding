<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include il file di configurazione per la connessione al database
    include 'config.php';

    // Prepara i dati del form
    $name = htmlspecialchars($_POST['name']);
    $guests = htmlspecialchars($_POST['guests']);
    $guestNames = htmlspecialchars($_POST['guestNames']);
    $intolleranze = htmlspecialchars($_POST['intolleranze']);
    $message = htmlspecialchars($_POST['message']);

    // Inserisci i dati nel database
    $stmt = $conn->prepare("INSERT INTO prenotazioni (nome, numero_ospiti, nomi_ospiti, intolleranze, messaggio) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $name, $guests, $guestNames, $intolleranze, $message);

    if ($stmt->execute()) {
        // Email inviata con successo
        $to = "info@wedding-elvira-giorgio.it"; // <-- cambia con la tua email
        $subject = "Nuova Prenotazione per il matrimonio";

        $body = "Nome e Cognome: $name\n";
        $body .= "Numero di ospiti: $guests\n";
        if (!empty($guestNames)) {
            $body .= "Nomi altri ospiti: $guestNames\n";
        }
        if (!empty($intolleranze)) {
            $body .= "Intolleranze o preferenze alimentari: $intolleranze\n";
        }
        if (!empty($message)) {
            $body .= "Note o messaggi extra: $message\n";
        }

        $headers = "From: info@wedding-elvira-giorgio.it";
        
        if (mail($to, $subject, $body, $headers)) {
            // Email inviata, imposta l'accesso e reindirizza
            $_SESSION['access_granted'] = true;
            header("Location: thank-you");
            exit;
        } else {
            echo "Errore nell'invio della mail.";
        }
    } else {
        echo "Errore nell'inserimento dei dati nel database.";
    }

    // Chiudi la connessione
    $stmt->close();
    $conn->close();
}
?>