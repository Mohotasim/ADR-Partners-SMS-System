<?php
    include "header.php";
    $createdby=$_SESSION["id"];
?>
      
                
                <div class="col-md-12">
                    <br>
                    
                    <h2>SMS Log</h2>
                    
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <th>User Name</th>
                            <th>Role</th>
                            <th> Account   </th>
                            <th> Phone    </th>
                            <th> SMS Body </th>
                            <th> Status   </th>
                            <th> Date    </th>
                           <!-- <th> Delete  </th>  -->
                        </tr>
                        <?php if( isset($_REQUEST["id"])){  $id=$_REQUEST["id"]; 
                              if($id!=""){ $result = mysqli_query($con, "DELETE FROM tbl_smslog WHERE id ='$id'");}
                                                     }  ?>
                        
                        <?php
                            $role=$_SESSION["role"];

                            if($role=="Admin"){

                                    $numbers = mysqli_query($con, "SELECT a.id, `templete_id`, `accountnumber`, `phonenumber`, `body`, `type`, a.status,a.createdon, a.created_by, `count`,b.displayname,b.email,b.role FROM `tbl_smslog` a INNER JOIN tbl_user b ON a.created_by=b.id  ORDER BY id DESC LIMIT 0,50");

                            }else{
                                $numbers = mysqli_query($con, "SELECT a.id, `templete_id`, `accountnumber`, `phonenumber`, `body`, `type`, a.status,a.createdon, a.created_by, `count`,b.displayname,b.email,b.role FROM `tbl_smslog` a INNER JOIN tbl_user b ON a.created_by=b.id WHERE a.created_by='$createdby' ORDER BY id DESC LIMIT 0,50");

                            }
                                

                                while($row = mysqli_fetch_assoc($numbers)){
                                    $result_array=explode("&",$row["status"]);
                                    $res=$result_array["0"];
                                    if(!empty($result_array["1"])){

                                        $desc=$result_array["1"];

                                        $desc_array=explode("=",$desc);

                                        $errormsg=$desc_array["1"];
                                    }
                                    

                                    if($res=="status=0"){
                                        $statusval="Success";
                                    }
                                    elseif($res=="status=1"){
                                        $statusval="Failed";
                                    }
                                    elseif($res=="status=2"){
                                        $statusval="Insufficient Credit";
                                    }
                                    elseif($res=="status=3"){
                                        $statusval="Invalid Number";
                                    }else{
                                        $statusval=$errormsg;
                                    }

                                ?>
                                <tr>
                                    <td><?php echo $row["email"] ?></td>
                                    <td><?php echo $row["role"] ?></td>
                                    <td><?php echo $row["accountnumber"] ?></td>
                                    <td><?php echo $row["phonenumber"] ?></td>
                                    <td><?php echo substr($row["body"], 0,100) ?> ....</td>
                                    <td><?php echo  str_replace("+"," ",$statusval);; ?></td>
                                    <td><?php echo $row["createdon"] ?></td>
                                <!--<td> <a  href='smslog.php?id=<?php //echo $row["id"] ?>'> </a> </td>-->   
                                </tr>
                                <?php
                                }  
                      ?>
                    </table>
                </div>
        </div>
        
    </body>
</html>