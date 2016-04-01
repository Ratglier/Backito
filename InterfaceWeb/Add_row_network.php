<?php
    //$serv = 'ssh idir@10.104.2.96  "crontab -l"'
    $var = exec('sudo crontab -u webuser -l');
    $elems = shell_exec("crontab -l");
    $lines = explode("\n", $elems);
    
    function display_row($lines) {
        $num = count($lines);
        $co = 0;
        while ($co!=$num-1) {
            $pattern = "/[^\*\/][ ]?/";
            $ele = explode(" /", $lines[$co]);
            preg_match_all($pattern, $ele[0], $matches);
            $dotw = explode(" ", $matches[4]);
            if (($matches[0][0]) == " ")
                $matches[0][0] = "-";
            if (($matches[0][1]) == " ")
                $matches[0][1] = "-";
            if (($matches[0][2]) == " ")
                $matches[0][2] = "-";
            if (($matches[0][3]) == " ")
                $matches[0][3] = "-";
            if (($matches[0][4]) == " ")
                $matches[0][4] = "-";
            display_row_html($ele, $matches, $dotw);
            $co++;
        }
    }

    function display_row_html($ele, $matches, $dotw) {
        echo '<form action="delete.php" method="post">';
        echo "<tr>";
        echo "<td>Server ID</td>";
        echo "<td>/".$ele[1]."</td>";
        echo "<td>/".$ele[2]."</td>";
        echo "<td><input name='min' size='5' type='number' min='0' max='23' value=".$matches[0][0]." READONLY/>
            <input name='hour' type='number' min='0' max='59' value=".$matches[0][1]." READONLY/>
            <input name='day' type='number' min='0' max='31' value=".$matches[0][2]." READONLY/>
            <input name='month' type='number' min='0' max='12' value=".$matches[0][3]." READONLY/>
            <input name='dotw' type='number' min='0' max='7' value=".$matches[0][4]." READONLY/></td>";
        
        echo '<input type="hidden" name="chemin" value="'.$ele[1].'"/>';
        echo '<input type="hidden" name="dest" value="'.$ele[2].'"/>';
        echo '<input type="hidden" name="time" value="'.$ele[0].'"/>';
        echo '<td><button type="submit" class="btn btn-danger btn-sm">remove</button></td>';
        echo "</tr>";
        echo "</form>";
    }
    display_row($lines);
?>