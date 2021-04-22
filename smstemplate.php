<?php
    include "header.php";
?>
            <form class="card card-sm" action="" method="post">
                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <div class="card-body row no-gutters align-items-center">

                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Create Template Format</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <br>
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <th> Title    </th>
                            <th> SMS Body </th>
                            <th> Limit </th>
                            <th> Delete  </th>
                            <th> Edit  </th>
                        </tr>
                        <?php if( isset($_REQUEST["id"])){ 
                                  $templete_id=$_REQUEST["id"]; 
                                 if($templete_id!="" && $_REQUEST["action"]=="delete"){ $result = mysqli_query($con, "DELETE FROM tbl_templete_format WHERE templete_id ='$templete_id'");}
                                                     }  ?>
                        
                        <?php
                                $numbers = mysqli_query($con, "SELECT templete_id, templete_name, text1,text2,text3,text4,text5,text6,text7,text8,text9,text10, col1, col2, col3, col4, col5, col6, col7, col8, col9, col10,smslimit  FROM tbl_templete_format WHERE 1");
                                while($row = mysqli_fetch_assoc($numbers)){
                                ?>
                                <tr>
                                    <td><?php echo $row["templete_name"] ?></td>
                                    <td><?php echo $row["text1"] ?> <?php if($row["col1"]!=""){ echo "<strong>[".$row["col1"]."]</strong>"; } ?> 
                                        <?php echo $row["text2"] ?> <?php if($row["col2"]!=""){ echo "<strong>[".$row["col2"]."]</strong>"; } ?> 
                                        <?php echo $row["text3"] ?> <?php if($row["col3"]!=""){ echo "<strong>[".$row["col3"]."]</strong>"; } ?> 
                                        <?php echo $row["text4"] ?> <?php if($row["col4"]!=""){ echo "<strong>[".$row["col4"]."]</strong>"; } ?> 
                                        <?php echo $row["text5"] ?> <?php if($row["col5"]!=""){ echo "<strong>[".$row["col5"]."]</strong>"; } ?> 
                                        <?php echo $row["text6"] ?> <?php if($row["col6"]!=""){ echo "<strong>[".$row["col6"]."]</strong>"; } ?> 
                                        <?php echo $row["text7"] ?> <?php if($row["col7"]!=""){ echo "<strong>[".$row["col7"]."]</strong>"; } ?> 
                                        <?php echo $row["text8"] ?> <?php if($row["col8"]!=""){ echo "<strong>[".$row["col8"]."]</strong>"; } ?> 
                                        <?php echo $row["text9"] ?> <?php if($row["col9"]!=""){ echo "<strong>[".$row["col9"]."]</strong>"; } ?> 
                                        <?php echo $row["text10"] ?><?php if($row["col10"]!=""){echo "<strong>[".$row["col10"]."]</strong>"; } ?> 
                                        </td>
                                         <td> <strong> <?php echo $row["smslimit"] ?> </strong> </td>
                                        <td> <a data='<?php echo $row["templete_id"] ?>' href='#' class="btn btn-danger delete"> Delete </a> </td>
                                        <td> <a data='<?php echo $row["templete_id"] ?>' href='#' class="btn btn-success edit"> Edit </a> </td>
                                </tr>
                                <?php
                                }  
                      ?>
                    </table>
                </div>
            </form>
        </div>
        
        
        
        
        
 
        
        
        
        
        
              
        <!-- Modal create template 222222222222222222222222222-->
        <div id="myModal2" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Template Format</h4>
              </div>
              
              <div class="modal-body" style="padding:60px;">
                <form class="form-horizontal" action="#" method="post">
                 
                  <div class="form-group">
                    <label for="email">Format Name:</label>
                    <input type="text" class="form-control" name="format_name" value="Template-X">
                  </div>
                  <br><br><br><label for="email">input Text and Data:</label>
                 <div class="form-group">
                     
                    <input name="text1" type="text" class="form-control"  value="">
                    <p  align="right"><select name="column1">
                         <option value="">              Select Data      </option>
                         <option value="accountnumber"> Account Number   </option>
                         <option value="name">          Account Name     </option>
                         <option value="icnumber">      IC Number        </option>
                         <option value="phonenumber">   Phone Number     </option>
                         <option value="vehiclenumber"> Vehicle Number   </option>
                         <option value="type">          Account Type     </option>
                         <option value="Reference">     Reference Number </option>
                         <option value="officer">       Officer name     </option>
                         <option value="amount">        Amount           </option>
                    </select><br><br> 
                    
                     <input  name="text2" type="text" class="form-control"  value="">
                     <select name="column2">
                         <option value="">              Select Data      </option>
                         <option value="accountnumber"> Account Number   </option>
                         <option value="name">          Account Name     </option>
                         <option value="icnumber">      IC Number        </option>
                         <option value="phonenumber">   Phone Number     </option>
                         <option value="vehiclenumber"> Vehicle Number   </option>
                         <option value="type">          Account Type     </option>
                         <option value="Reference">     Reference Number </option>
                         <option value="officer">       Officer name     </option>
                         <option value="amount">        Amount           </option>
                    </select> <br> <br>
                    
                    
                    <input  name="text3" type="text" class="form-control"  value="">
                     <select name="column3">
                         <option value="">              Select Data      </option>
                         <option value="accountnumber"> Account Number   </option>
                         <option value="name">          Account Name     </option>
                         <option value="icnumber">      IC Number        </option>
                         <option value="phonenumber">   Phone Number     </option>
                         <option value="vehiclenumber"> Vehicle Number   </option>
                         <option value="type">          Account Type     </option>
                         <option value="Reference">     Reference Number </option>
                         <option value="officer">       Officer name     </option>
                         <option value="amount">        Amount           </option>
                    </select> <br> <br>
                    
                    
                    
                                        
                    <input  name="text4" type="text" class="form-control"  value="">
                     <select name="column4">
                         <option value="">              Select Data      </option>
                         <option value="accountnumber"> Account Number   </option>
                         <option value="name">          Account Name     </option>
                         <option value="icnumber">      IC Number        </option>
                         <option value="phonenumber">   Phone Number     </option>
                         <option value="vehiclenumber"> Vehicle Number   </option>
                         <option value="type">          Account Type     </option>
                         <option value="Reference">     Reference Number </option>
                         <option value="officer">       Officer name     </option>
                         <option value="amount">        Amount           </option>
                    </select> <br> <br>
                    

                    <input  name="text5" type="text" class="form-control"  value="">
                     <select name="column5">
                         <option value="">              Select Data      </option>
                         <option value="accountnumber"> Account Number   </option>
                         <option value="name">          Account Name     </option>
                         <option value="icnumber">      IC Number        </option>
                         <option value="phonenumber">   Phone Number     </option>
                         <option value="vehiclenumber"> Vehicle Number   </option>
                         <option value="type">          Account Type     </option>
                         <option value="Reference">     Reference Number </option>
                         <option value="officer">       Officer name     </option>
                         <option value="amount">        Amount           </option>
                    </select> <br> <br>
  
 
 
                    <input  name="text6" type="text" class="form-control"  value="">
                     <select name="column6">
                         <option value="">              Select Data      </option>
                         <option value="accountnumber"> Account Number   </option>
                         <option value="name">          Account Name     </option>
                         <option value="icnumber">      IC Number        </option>
                         <option value="phonenumber">   Phone Number     </option>
                         <option value="vehiclenumber"> Vehicle Number   </option>
                         <option value="type">          Account Type     </option>
                         <option value="Reference">     Reference Number </option>
                         <option value="officer">       Officer name     </option>
                         <option value="amount">        Amount           </option>
                    </select> <br> <br>
  
 
                     <input  name="text7" type="text" class="form-control"  value="">
                     <select name="column7">
                         <option value="">              Select Data      </option>
                         <option value="accountnumber"> Account Number   </option>
                         <option value="name">          Account Name     </option>
                         <option value="icnumber">      IC Number        </option>
                         <option value="phonenumber">   Phone Number     </option>
                         <option value="vehiclenumber"> Vehicle Number   </option>
                         <option value="type">          Account Type     </option>
                         <option value="Reference">     Reference Number </option>
                         <option value="officer">       Officer name     </option>
                         <option value="amount">        Amount           </option>
                    </select> <br> <br>
 

                    <input  name="text8" type="text" class="form-control"  value="">
                     <select name="column8">
                         <option value="">              Select Data      </option>
                         <option value="accountnumber"> Account Number   </option>
                         <option value="name">          Account Name     </option>
                         <option value="icnumber">      IC Number        </option>
                         <option value="phonenumber">   Phone Number     </option>
                         <option value="vehiclenumber"> Vehicle Number   </option>
                         <option value="type">          Account Type     </option>
                         <option value="Reference">     Reference Number </option>
                         <option value="officer">       Officer name     </option>
                         <option value="amount">        Amount           </option>
                    </select> <br> <br>
  
                    <input  name="text9" type="text" class="form-control"  value="">
                     <select name="column9">
                         <option value="">              Select Data      </option>
                         <option value="accountnumber"> Account Number   </option>
                         <option value="name">          Account Name     </option>
                         <option value="icnumber">      IC Number        </option>
                         <option value="phonenumber">   Phone Number     </option>
                         <option value="vehiclenumber"> Vehicle Number   </option>
                         <option value="type">          Account Type     </option>
                         <option value="Reference">     Reference Number </option>
                         <option value="officer">       Officer name     </option>
                         <option value="amount">        Amount           </option>
                    </select> <br> <br>

                     <!--<input  name="text10" type="text" class="form-control"  value=" on this contact number +6034567890. Thank you.">
                     <select name="column10">
                         <option value="">              Select Data      </option>
                         <option value="accountnumber"> Account Number   </option>
                         <option value="name">          Account Name     </option>
                         <option value="icnumber">      IC Number        </option>
                         <option value="phonenumber">   Phone Number     </option>
                         <option value="vehiclenumber"> Vehicle Number   </option>
                         <option value="type">          Account Type     </option>
                         <option value="Reference">     Reference Number </option>
                         <option value="officer">       Officer name     </option>
                         <option value="amount">        Amount           </option>
                    </select> <br></p> -->
                  </div>
                  
                  <div class="form-group">
                      <label for="email">SMS Limit:</label>
                    <input name="txtLimit" type="number" class="form-control" value="1" min="1">
                  </div>

                  <div class="form-group">
                    <button type="submit" name="btnAdd2" class="btn btn-primary">Save This</button>
                  </div>
                  <?php
                    if(isset($_POST["btnAdd2"])){
                        $templete_name = $_POST["format_name"];
                        
                        $text1 = $_POST["text1"];
                        $text2 = $_POST["text2"];
                        $text3 = $_POST["text3"];
                        $text4 = $_POST["text4"];
                        $text5 = $_POST["text5"];
                        $text6 = $_POST["text6"];
                        $text7 = $_POST["text7"];
                        $text8 = $_POST["text8"];
                        $text9 = $_POST["text9"];
                        //$text10= $_POST["text10"];
                        
                        $col1 = $_POST["column1"];
                        $col2 = $_POST["column2"];
                        $col3 = $_POST["column3"];
                        $col4 = $_POST["column4"];
                        $col5 = $_POST["column5"];
                        $col6 = $_POST["column6"];
                        $col7 = $_POST["column7"];
                        $col8 = $_POST["column8"];
                        $col9 = $_POST["column9"];
                       // $col10= $_POST["column10"];
                        $limit = $_POST["txtLimit"];
                        mysqli_query($con, "INSERT INTO tbl_templete_format (templete_name,     text1,      col1,    text2,    col2,    text3,    col3,    text4,    col4,    text5,    col5,    text6,    col6,    text7,    col7,    text8,    col8,    text9,    col9,smslimit)VALUES ('$templete_name', '$text1',  '$col1', '$text2', '$col2', '$text3', '$col3', '$text4', '$col4', '$text5', '$col5', '$text6', '$col6', '$text7', '$col7', '$text8', '$col8', '$text9', '$col9','$limit' )");
                        echo '<script>window.location.href="smstemplate.php"</script>';
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
        
        
        
 
       
       
       
       
       
       
       
       
      
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
    <!-- start Modal for edit template-->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit Template</h4>
            </div>
            <div class="modal-body" id="bodydetails">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>
    
          <?php
                    if(isset($_POST["btn_edit_save"])){  //data  came from smstemplate-edit-get.php by myModal above
                        $templete_id = $_POST["templete_id"];
                        $templete_name = $_POST["templete_name"];
                        $text1 = $_POST["text1"];
                        $text2 = $_POST["text2"];
                        $text3 = $_POST["text3"];
                        $text4 = $_POST["text4"];
                        $text5 = $_POST["text5"];
                        $text6 = $_POST["text6"];
                        $text7 = $_POST["text7"];
                        $text8 = $_POST["text8"];
                        $text9 = $_POST["text9"];
                        //$text10= $_POST["text10"];
                        
                        $col1 = $_POST["column1"];
                        $col2 = $_POST["column2"];
                        $col3 = $_POST["column3"];
                        $col4 = $_POST["column4"];
                        $col5 = $_POST["column5"];
                        $col6 = $_POST["column6"];
                        $col7 = $_POST["column7"];
                        $col8 = $_POST["column8"];
                        $col9 = $_POST["column9"];
                        //$col10= $_POST["column10"];
                        $limitf=$_POST["txtLimitE"];
                        
                       $result = mysqli_query($con,  "UPDATE tbl_templete_format SET
                       templete_name     = '$templete_name', 
                       text1 = '$text1',
                       text2 = '$text2',
                       text3 = '$text3',
                       text4 = '$text4',
                       text5 = '$text5',
                       text6 = '$text6',
                       text7 = '$text7',
                       text8 = '$text8',
                       text9 = '$text9',
                       text10='$text10',
                       
                       col1  = '$col1',
                       col2  = '$col2',
                       col3  = '$col3',
                       col4  = '$col4',
                       col5  = '$col5',
                       col6  = '$col6',
                       col7  = '$col7',
                       col8  = '$col8',
                       col9  = '$col9',
                       col10 ='$col10',
                       smslimit='$limitf'
                       WHERE templete_id = '$templete_id'" );
                       echo '<script>window.location.href="smstemplate.php"</script>';
                       }
                  ?>
       <script>
       $(".edit").on("click", function(event){
            event.preventDefault();
            var id = $(this).attr("data");
            $.ajax({
                url: "smstemplate-edit-get.php",
                type: "post",
                data: {id : id},
                success: function (result)
                {
                    $('#myModal').modal('show');
                    $("#bodydetails").html(result);
                },
                error: function (xhr, desc, err)
                {
                    console.log("error");
                }
            });
        });
        
        
        $(".delete").on("click", function(event){
            event.preventDefault();
            var order_id = $(this).attr("data");

            if(confirm("Are you sure want to delete this Template ?")){
                $.ajax({
                    url: "smstemplate-delete.php",
                    type: "post",
                    data: {id : order_id},
                    success: function (result)
                    {
                        console.log(result);
                        if(result=="success"){
                            //window.location.href="http://idslbd.com/noton/smstemplate.php";
                            location.reload();
                        }else{
                            alert("Failed");
                        }
                    },
                    error: function (xhr, desc, err)
                    {
                        console.log("error");
                    }
                });
            }
        });
        
       </script>
  <!--end  Modal for edit template-->      
       
       
       
       
        
        
        
        
        
    </body>
</html>