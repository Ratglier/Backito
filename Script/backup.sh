#!/bin/bash

re="^(\/[\/a-zA-Z0-9 _\.]+)$"
#ree="([a-zA-Z0-9 ._]+[\/]?)$"
re2="^([1-59]+)$"
re3="^([1-24]+)$"

option=$1
chemin1=$2
chemin2=$3
nb=$4
time=$5
input="k"

function error()
{
    if [[ $option != "delete" && $option != "save" ]]; then
        echo "Options entered are not valid\n";
    fi   
}

function delete() 
{
    if [[ $option == "delete" ]]; then
        while [ $input != "y" ] && [ $input != "Y" ] && \
        [ $input != "n" ]; do
            echo -e "\033c"
            echo "You're about to delete all of the automatic save process of \
$chemin1"
            echo -e "Are you sure you want to do that ? (Y/n)\n> \c"
            read -r input
            if [[ $input = "y" ]] || [[ $input = "Y" ]] ; then
                crontab -l | grep -v "$chemin1" | crontab -
                echo "All automatics save of $chemin1 have been deleted !"
            elif [[ $input = "y" ]] || [[ $input = "Y" ]] ; then
                echo "Nothing have been modified !"
            fi
        done
    fi
}

function start() 
{
    if [[ -f $chemin1 ]]; then
        if [[ $option == "save" && $time == "m" ]]; then
            (crontab -l 2>/dev/null; \
            echo "*/$nb * * * * cp $chemin1 $chemin2";)| crontab
        elif [[ $option == "save" && $time == "h" ]]; then
            (crontab -l 2>/dev/null; \
            echo "* */$nb * * * cp $chemin1 $chemin2";)| crontab
        fi
        echo -e "\n$chemin1 will be saved each $nb$time as $chemin2\n"
    elif [[ -d $chemin1 ]]; then
        if [[ $option == "save" && $chemin2 =~ $re && \
        $nb =~ $re2 && $time == "m" ]]; then
            (crontab -l 2>/dev/null; \
            echo "*/$nb * * * * cp -R $chemin1 $chemin2";)| crontab
        elif [[ $option == "save" && $chemin2 =~ $re \
        && $nb =~ $re3 && $time == "h" ]]; then
            (crontab -l 2>/dev/null; \
            echo "* */$nb * * * cp -R $chemin1 $chemin2";)| crontab
        fi
        echo -e "\n$chemin1 will be saved each $nb$time as $chemin2\n"
    else
        echo -e "File or directory doesn't exist\nPlease select a valid element"
    fi
}

function check_files(){
        start
}
error
check_files
delete