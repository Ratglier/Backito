<?php include('index.htm'); ?>
    <h3>Access to distant servers</h3>
    <h5>The save will process each : Hours, Minutes, Days, Months, Day of the week on a distant server</h5>
            <div class="table-responsive">
                <table class="table table-striped">
                    <table id='tableID' class="table table-hover">
                        <script>
                            jQuery(document).ready(function($) {
                            $(".clickable-row").click(function() {
                                        //window.document.location = $(this).data("href");
                                        $(this).toggleClass('clicked');
                                    });
                                });
                            </script>
                            <thead>
                              <tr>
                                <th>Server Id</th>
                                <th>Backup source</th>
                                <th>Backup destination</th>
                                <th>Hours | Minutes | Days | Months | Day of week</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <form action="add_cron.php" method="post">
                                <tr>
                                  <td><input type="text" size="25" name="Server" placeholder="Server adress"/></td>
                                  <td><input type="text" size="35" name="chemin" placeholder="File to Backup"/></td>
                                  <td><input type="text" size="35" name="dest" placeholder="Backup destination"/></td>
                                  <td>
                                    <input name="hour" size="5" type="number" min="0" max="23"/>
                                    <input name="min" size="5" type="number" min="0" max="59"/>
                                    <input name="day" size="5" type="number" min="0" max="31"/>
                                    <input name="month" size="5" type="number" min="0" max="12"/>
                                    <input name="dotw" size="5" type="number" min="0" max="7"/>
                                  </td>
                                  <td><button type="submit" class="btn btn-info btn-sm">Submit</button></td>
                                </tr>
                              </form>
                                <?php include ("Add_row_network.php"); ?>
                            </tbody>
                        </table>
                    </table>
            </div>
            <div class="col-.col-md-8">
                <img src="./css/Backup SERVICE.jpg" class="img-rounded" alt="Backup" width="1050" height="750">
            </div>
        </div>
    </body>
</html>