<?php
    include "header.php";
?>
            <form class="card card-sm" action="" method="post">
                
                <div class="col-md-12">
                    <br>
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>User name</th>
                            <th>Officer name</th>
                            <th>Roles</th>
                            <th>Status</th>
                            <?php 
                                if($sessionrole=="Admin"){
                            ?>
                            <th>Edit</th>
                            <?php
                                }
                            ?>
                            
                        </tr>
                        <?php
                        if($sessionrole=="Admin"){
                            $numbers = mysqli_query($con, "SELECT id, email, displayname, role, status, password, expire FROM tbl_user");
                        }else{
                            $numbers = mysqli_query($con, "SELECT id, email, displayname, role, status, password, expire FROM tbl_user WHERE id='$sessionid'");
                        }
                            while($row = mysqli_fetch_assoc($numbers)){
                            ?>
                            <tr>
                                <td><?php echo $row["id"] ?></td>
                                <td><?php echo $row["email"] ?></td>
                                <td><?php echo $row["displayname"] ?></td>
                                <td><?php echo $row["role"] ?></td>
                                <td><?php echo $row["status"] ?></td>
                                <?php 
                                if($sessionrole=="Admin"){
                                ?>
                                <td><a class="btn btn-info useredit" href='#' data='<?php echo $row["id"] ?>'>Edit</a></td>
                                <?php
                                }
                                ?>
                                
                            </tr>
                            <?php
                            }
                        ?>
                    </table>
                </div>
                <?php 
                    if($sessionrole=="Admin"){
                    ?>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New</button>
                </div>
                <?php
                    }
                    ?>
            </form>
        </div>
        <!-- Add Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New User</h4>
              </div>
              <div class="modal-body" style="padding:40px;">
                <form class="form-horizontal" action="#" method="post">
                  <div class="form-group">
                    <label for="email">User Name:</label>
                    <input type="text" class="form-control" name="txtUsername" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Display Name:</label>
                    <input type="text" class="form-control" name="txtDisplayname" required>
                  </div>
                  <div class="form-group">
                    <label for="pwd">Role:</label>
                    <select name="txtRole" class="form-control" required>
                        <option value=''>Select Role</option>
                        <option value='Admin'>Admin</option>
                        <option value='Staff'>Staff</option>
                        
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <button type="submit" name="btnAdd" class="btn btn-primary">Submit</button>
                  </div>
                  <?php
                    if(isset($_POST["btnAdd"])){
                        $Username = $_POST["txtUsername"];
                        $Displayname = $_POST["txtDisplayname"];
                        $Role = $_POST["txtRole"];
                        //$Password = $_POST["txtPassword"];

                        $usersql=mysqli_query($con,"SELECT `id`, `email`, `displayname`, `role`, `status`, `password`, `expire` FROM `tbl_user` WHERE email='$Username' OR displayname='$Displayname' ");
                        $resrow=mysqli_num_rows($usersql);
                        if($resrow>0){
                            echo '<script>alert("Duplicate user name or displayname");</script>';

                        }else{
                            mysqli_query($con, "INSERT INTO tbl_user(email, displayname, role, password) VALUES ('$Username', '$Displayname', '$Role', '')");
                            echo '<script>window.location.href="user.php"</script>';
                        }
                        
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
        
        <!-- Edit Modal -->
        <div id="editModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit User</h4>
              </div>
              <div class="modal-body" style="padding:40px;">
                <form class="form-horizontal" action="#" method="post" >
                    <div id="tblSearch">
                      
                    </div>
                  <?php
                    if(isset($_POST["btnEdit"])){
                        $Userid = $_POST["txtUserid"];
                        $username=$_POST["txtUsername"];
                        $dispayname=$_POST["txtDisplayname"];
                        $Role = $_POST["txtRole"];
                        $Status = $_POST["txtStatus"];
                        $Password = $_POST["txtPassword"];
                        if($Status=="Suspend"){
                                mysqli_query($con,"DELETE FROM `tbl_user` WHERE `id`='$Userid' ");
                        }else{
                        
                        mysqli_query($con, "UPDATE tbl_user SET email='$username',displayname='$dispayname', role='$Role', status='$Status', password='$Password' WHERE id='$Userid'");
                        }
                        echo '<script>window.location.href="user.php"</script>';
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
        <script>
            //$(".useredit").on("click", function(){
            $(document).on("click", ".useredit", function(e){
                var userid = $(this).attr("data");
                //alert(userid);
                
                $.ajax({
                    url: "model/editusermodal.php",
                    type: "post",
                    data: {userid: userid},
                    success: function (response) {
                        $("#editModal").modal("show");
                        $('#tblSearch').html(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                    }
                });
            });
            
            $(document).on("click", "#btnaddofficer", function(e){
                e.preventDefault();
                var officername = $("#txtOfficername").val();
                var Userid = $("#txtUserid").val();
                //alert(officername + Userid);
                $.ajax({
                    url: "model/addofficer.php",
                    type: "post",
                    data: {officername: officername, Userid: Userid },
                    success: function (response) {
                        $('#officerlist').html(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                    }
                });
            });
        </script>
        <script>
            $(document).on("click", ".btnDeleteDisplayName", function(e){
                e.preventDefault();
                var rid=$(this).attr("value");
                //alert(rid);
                if(confirm("Are your sure? ")){
                $(this).closest("tr").remove();
                $.ajax({
                    url: "model/deletedisplay.php",
                    type: "post",
                    data: {rid: rid },
                    success: function (response) {
                        //$('#officerlist').html(response);
                        //$(this).closest("tr").remove();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                    }
                });

            }
            });
        </script>
    </body>
</html>