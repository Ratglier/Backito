<?php
    $min = '*';
    $hour = '*';
    $day = '*';
    $month ='*';
    $Dotw = '*';

    $chemin = $_POST['chemin'];
    $dest = $_POST['dest'];
    if ($_POST['min'] != '')
    {    if ($_POST['min'] == '0')
            $min = '0';
        else
           $min = '*/'.$_POST['min'];
    }     
    if ($_POST['hour'] != '')
    {    if ($_POST['hour'] == '0')
            $hour = '0';
        else
            $hour = '*/'.$_POST['hour'];
    }
    if ($_POST['day'] != '')
    {    if ($_POST['day'] == '0')
            $day = '0';
        else
            $day = '*/'.$_POST['day'];
    }
    if ($_POST['month'] != '')
    {     if ($_POST['month'] == '0')
            $month = '0';
        else
            $month = '*/'.$_POST['month'];
    }
    if ($_POST['dotw'] != ''){
        if ($_POST['dotw'] == '0')
             $Dotw = '0';
        else
            $Dotw = '*/'.$_POST['dotw'];
    }    
    $output = shell_exec('crontab -l');
    file_put_contents('/tmp/crontab.txt', $output."$min $hour $day $month $Dotw cp $chemin $dest".PHP_EOL);
    echo exec('crontab /tmp/crontab.txt');
    echo "$min $hour $day $month $Dotw cp $chemin $dest";
    header('Location: ./Saves.php');

var_dump($_POST['dotw']);
$day = $_POST['day'];
$month = $_POST['month'];
$year = date('Y');

function verif_date($day, $month, $year)
{
    if (checkdate($month, $day, $year))
    {
        echo "ok dude";
    }
    else
    {
        echo "invalid date dude";
    }
}
?>