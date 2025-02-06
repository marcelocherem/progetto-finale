<?php

session_start(); //invocazione della sessione aperta
session_destroy(); //distruzione della sessione (a scopo protezione/sicurezza)

header ("Location: index.php"); 
