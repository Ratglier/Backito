<?php include('index.htm'); ?>
<h3>Local Saves in process</h3>
<div id='contain' class='table-responsive'>
    <h5>The save will process each : Hours, Minutes, Days, Months, Day of the week on your computer</h5>
    <h6>( If left blank, save will process each "left blank categorie" )</h6>
     <table class="table table-striped">
         <table id='tableID' class="table table-hover">
             <script>
               jQuery(document).ready(function($) {
                    $(".clickable-row").click(function() {
                        //window.document.location = $(this).data("href");
                        $(this).toggleClass('clicked');
                    });
                });
                $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip(); 
              });
            </script>
            <thead>
              <tr>
                <th>Backup source</th>
                <th>Backup destination</th>
                <th>Minutes | Hours | Days | Months | Day of week
                <a href="#" data-toggle="tooltip" title="Please note that some combination might not work">?</a>
                </th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <form action="add_cron.php" method="post">
                <tr>
                  <td><input type="text" size="35" name="chemin" placeholder="File to Backup"/></td>
                  <td><input type="text" size="35" name="dest" placeholder="Backup destination"/></td>
                  <td>
                    <input name="min" size="5" type="number" min="0" max="23"/>
                    <input name="hour" size="5" type="number" min="0" max="59"/>
                    <input name="day" size="5" type="number" min="0" max="31"/>
                    <input name="month" size="5" type="number" min="0" max="12"/>
                    <input name="dotw" size="5" type="number" min="0" max="7"/>
                  </td>
                  <td><button type="submit" class="btn btn-info btn-sm">Submit</button></td>
                </tr>
              </form>
                <?php include ("Add_row.php"); ?>
            </tbody>
        </table>
    </table>
</div>
<form action="delete_all.php">
    <button id="button" type="submit" class="btn btn-danger btn-md" onclick="return confirm('Are you sure?');">Delete Everything</button> 
</form>
</body>
</html> 