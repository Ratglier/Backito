#!/bin/bash
function add()
{
	echo "please give the full path of the file you want to backup"
	read -r path
	if [[ -d $path ]] || [[ -f $path ]]; then
		{
			echo "$path is a valid file or directory"
			echo "where do you want to save the backup?"
			read -r save
			if [[ -d $save ]]; then
				{
					echo "$save is a valid directory"
				}
			else
				echo "directory doesn't exist"
			fi
		}
	else
		{
			echo "$path doesn't exist"
			add
		}
	fi
}

function action()
{
	if [[ $1 = "add" ]]; then
		{
			echo "appelle a fonction add"
			add
		}
	elif [[ $1 = "update" ]]; then
		{
			echo "appelle la fonction update"
	    #update()
	}
elif [[ $1 = "remove" ]]; then
	{
		echo "appelle la fonction remove"
	    #remove()
	}
else
	{
		echo "commande inconnue"
	}
fi
}

action $1