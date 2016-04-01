<?php
    $chemin = $_POST['chemin'];
    $dest = $_POST['dest'];
    $time = $_POST['time'];
    var_dump($chemin);
    var_dump($dest);
    var_dump($time);
    if (($chemin == '') || ($dest == ''))
    {
        exec('crontab -l', $data);
        if (($dest == '') && ($chemin != ''))
            $del_val = "$time /$chemin";
        if (($chemin == '') && ($dest != ''))
            $del_val = "$time /$dest";
        if (($chemin == '') && ($dest == ''))
            $del_val = "$time";
        $key = array_search($del_val, $data);
        if($key !== false)
          unset($data[$key]);
        exec ('echo "'.implode("\n", $data).'" | crontab -');
        echo "$val";
    }
    else
    {
        exec('crontab -l', $data);
        $del_val = "$time /$chemin /$dest";
        $key = array_search($del_val, $data);
        if($key !== false)
          unset($data[$key]);
        exec ('echo "'.implode("\n", $data).'" | crontab -');
        echo "$val";
    }
    $output = shell_exec('crontab -l');
    file_put_contents('/tmp/crontab.txt', $output);
    $size =  filesize('/tmp/crontab.txt');
    if ($size == 1)
        shell_exec('crontab -r');
    header('Location: ./Saves.php'); 
?>