<?php
ob_start();
//La ob_start()funzione crea un buffer di output. È possibile passare una funzione di callback per eseguire l'elaborazione del contenuto del buffer prima che venga scaricato dal buffer. I flag possono essere utilizzati per consentire o limitare ciò che il buffer è in grado di fare.

//BUFFER: area di memoria temporanea (letteralmente «tampone»,) utilizzata generalmente per l'input/output dei dati. In un b. si memorizzano dati che verranno successivamente trasmessi a unità di elaborazione o dati che devono essere scambiati con un dispositivo esterno.

session_start();
// session_destroy();

//definire COSTANTI per la directory
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR); //nomeCartella/nomeSottoCartella/nomeFile.xxx

defined('FRONT_END') ? null : define('FRONT_END', __DIR__ . DS . 'templates/front'); //risorsa/templates/front
defined('BACK_END') ? null : define('BACK_END', __DIR__ . DS . 'templates/back'); //risorsa/templates/back
defined('IMG_UPLOADS') ? null : define('IMG_UPLOADS', __DIR__ . DS . 'immagini'); //risorsa/immagini
//echo IMG_UPLOADS;


//Configurare database
define('DB_HOST', 'localhost'); //nome host
define('DB_UTENTE', 'root'); //user
define('DB_PASSWORD', 'root'); //password
define('DB_NOME', 'progetto_finale'); //nome database

//Connessione al database
$connessione = mysqli_connect(DB_HOST, DB_UTENTE, DB_PASSWORD, DB_NOME);
//$connessione =new  mysqli(DB_HOST, DB_UTENTE, DB_PASSWORD, DB_NOME); meglio usare questo metodo

//verifica della connessione 
if (!$connessione) {
    echo 'Non sei connesso';
}
//else{
//     echo 'Sei connesso';
//}


require_once('funzioni.php');

// $connessione -> close();