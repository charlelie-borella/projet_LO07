<?php

session_start();

session_destroy();

header('Location: messageAlerte.php?message=4'); 
