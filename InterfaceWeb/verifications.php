<?php
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
        echo "invalid date dude ";
    }
}

function verif_src()
{
    $i = 0;
	while ($i != 1)
	{
		$path = readline("please give the full path of the file you want to backup\n=> ");
		$path = realpath($path);
		if (file_exists($path))
		{
			echo $path . " is a valid file or directory\n";
			$i = 1;
		}
		else
		{
			echo $path . " doesn't exists\n";
		}
	}
	return $path;
}

function verif_localdest()
{
	$i = 0;
	while ($i != 1)
	{
		$save = readline("Where do you want to save the backup?\n=> ");
		$save = realpath($save);
		if (is_dir($save))
		{
			echo $save . " is a valid directory\n";
			$i = 1;
		}
		else
		{
			echo $save . " is not a directory or doesn't exists\n";
		}
	}
	return $save;
}

