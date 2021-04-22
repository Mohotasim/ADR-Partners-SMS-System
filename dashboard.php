<?php
    include "header.php";
?>
            <form class="card card-sm" action="" method="post">
                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <div class="card-body row no-gutters align-items-center">
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="txtNumber" placeholder="Account number">
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-lg btn-success btn-sm" name="btnSearch" type="submit">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-5">
                    <br>
                    <table class="table table-bordered">
                        <tr>
                            <th>Tel Number</th>
                            <th>Type</th>
                        </tr>
                        <?php
                            if(isset($_POST["btnSearch"])){
                                $Number = $_POST["txtNumber"];
                                $_SESSION["account"] = $Number;
						
              $numbers = mysqli_query($con, "SELECT id, accountnumber, name, icnumber, phonenumber, vehiclenumber, type, createdon FROM tbl_sms WHERE accountnumber='$Number'");
                                while($row = mysqli_fetch_assoc($numbers)){
                                  $_SESSION["name"]=$row["name"];
                                ?>
                                <tr>
                                    <td><?php echo $row["phonenumber"] ?></td>
                                    <td><?php echo $row["type"] ?></td>
                                </tr>
                                <?php
                                }  
                            }
                        ?>
                    </table>
                </div>
                <div class="col-md-4">
                    <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New</button>-->
                    <a href="sms.php" class="btn btn-primary" >SMS</a>
                </div>
            </form>
        </div>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Number</h4>
              </div>
              <div class="modal-body" style="padding:40px;">
                <form class="form-horizontal" action="#" method="post">
                  <div class="form-group">
                    <label for="email">Tel Number:</label>
                    <input type="number" class="form-control" name="txtNumber">
                    <input type="hidden" value='<?php echo $_SESSION["account"] ?>' name="txtAccountnumber">
                  </div>
				  
				  <div class ="form-group">
				   <label for="name">Name:</label>
				   <input type="name" class="form-control" name="txtName">
                  	<!--<input type="hidden" value='<?php echo $_SESSION["name"] ?>' name="txtName">-->
                   </div>	

                   <div class="form-group">
                    <label for="email">IC Number:</label>
                    <input type="icnumber" class="form-control" name="txtIcNumber">
                    <!--<input type="hidden" value='<?php echo $_SESSION["icnumber"] ?>' name="txtIcNumber">-->
                  </div>

				   
                  <div class="form-group">
                    <label for="pwd">Type:</label>
                    <select name="txtType" class="form-control">
                        <option value=''>Select Type</option>
                        <option value='CUSTOMER'>CUSTOMER</option>
                        <option value='PARENT'>PARENT</option>
                        <option value='SPOUSE'>SPOUSE</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="btnAdd" class="btn btn-primary">Submit</button>
                  </div>
                  <?php
                    if(isset($_POST["btnAdd"])){
                        $Number = $_POST["txtNumber"];
                        $Type = $_POST["txtType"];
            						$Name = $_POST["txtName"];
            						$IcNumber = $_POST["txtIcNumber"];
            						$Accountnumber = $_POST["txtAccountnumber"];
                        
                        
                        mysqli_query($con, "INSERT INTO tbl_sms(accountnumber, name, icnumber,  phonenumber, type) VALUES ('$Accountnumber', '$Name' , '$IcNumber', '$Number', '$Type')");
                        echo '<script>window.location.href="dashboard.php"</script>';
                    }
                  ?>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
        
          </div>
        </div>
    </body>
</html>