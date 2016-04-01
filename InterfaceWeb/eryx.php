<?php

function path()
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

function save()
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
function tar()
{
	$i = 2;
	while ($i == 2)
	{
		$tar = readline("Do you want to compress the backup archive?[y/n]\n=> ");
		if (strcasecmp($tar, "yes") == 0 || strcasecmp($tar, "y") == 0)
		{
			echo "OUI\n";
			$i = 1;
		}
		elseif (strcasecmp($tar, "no") == 0 || strcasecmp($tar, "n") == 0)
		{
			echo "NON\n";
			$i = 0;
		}
		else
		{
			echo "please answer yes or no";
		}
	}
	return $i;
}

// function copy($compress)
// {
// 	if ($compress == 1)
// 	{

// 	}
// }

function add()
{
	$directory = path();
	$backup = save();
	$compress = tar();
	echo $directory . "\n" . $backup . "\n" . $compress . "\n";

}
function action($arg)
{
	if($arg == "add")
	{
		echo "appel a la fonction add\n";
		add();
	}
	elseif ($arg == "update")
		echo "appel a la fonction update\n";
	elseif ($arg == "remove")
		echo "appel a la fonction remove\n";
	else
		echo "Unknown command\n";
}

action($argv[1]);