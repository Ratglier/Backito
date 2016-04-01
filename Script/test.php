<?php
    function fonction_anonyme($min, $hour, $day, $month, $Dotw, $chemin, $des) {
    
        $output = shell_exec('crontab -l');
        file_put_contents('/tmp/crontab.txt', $output."$min $hour $day $month $Dotw cp $chemin $dest".PHP_EOL);
        echo exec('crontab /tmp/crontab.txt');
        
    }
?>