<?php
    shell_exec('crontab -r');
    echo "lol";
    header('Location: ./Saves.php'); 
?>