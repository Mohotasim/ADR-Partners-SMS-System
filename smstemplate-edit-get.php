<?php
session_start();
include "connect_db.php";
$templete_id=$_REQUEST["id"];  

$numbers = mysqli_query($con, "SELECT templete_name, text1,text2,text3,text4,text5,text6,text7,text8,text9,text10, col1, col2, col3, col4, col5, col6, col7, col8, col9, col10,smslimit  FROM tbl_templete_format WHERE templete_id ='$templete_id'");
while($row = mysqli_fetch_assoc($numbers)){ 
                                            $templete_name = $row["templete_name"]; 
                                            $t1= $row["text1"];  $c1=$row["col1"];
                                            $t2= $row["text2"];  $c2=$row["col2"];
                                            $t3= $row["text3"];  $c3=$row["col3"];
                                            $t4= $row["text4"];  $c4=$row["col4"];
                                            $t5= $row["text5"];  $c5=$row["col5"];
                                            $t6= $row["text6"];  $c6=$row["col6"];
                                            $t7= $row["text7"];  $c7=$row["col7"];
                                            $t8= $row["text8"];  $c8=$row["col8"];
                                            $t9= $row["text9"];  $c9=$row["col9"];
                                           //$t10= $row["text10"]; $c10=$row["col10"];
                                            $limit=$row["smslimit"];
                                          }
//echo "$text1 $data1 $text2 $data2 $text3 $data3 $text4 $data4 $text5 $data5 $text6 $data6 $text7 $data7 $text8 $data8 $text9 $data9 $text10 $data10";                          
?>
              <div class="modal-body" style="padding:20px;">
                <form class="form-horizontal" action="#" method="post">
                 
                  <div class="form-group">
                    <label for="email">Template Name:</label>
                    <input type="text" class="form-control" name="templete_name" value="<?php echo $templete_name ?>">
                  </div>
                  <br><br><br><label for="email">Start of Text and Data:</label>
                 <div class="form-group">
                     
                    <input name="text1" type="text" class="form-control"  value="<?php echo $t1 ?>">
                    <p  align="right"><select name="column1">
                        <?php if($c1!=""){echo "<option value='$c1'> $c1 </option>";}  ?>
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
                    
                     <input  name="text2" type="text" class="form-control"  value="<?php echo $t2 ?>">
                     <select name="column2">
                          <?php if($c2!=""){echo "<option value='$c2'> $c2 </option>";}  ?>
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
                    
                    
                    <input  name="text3" type="text" class="form-control"  value="<?php echo $t3 ?>">
                     <select name="column3">
                          <?php if($c3!=""){echo "<option value='$c3'> $c3 </option>";} ?>
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
                    
                    
                    
                                        
                    <input  name="text4" type="text" class="form-control"  value="<?php echo $t4 ?>">
                     <select name="column4">
                          <?php if($c4!=""){echo "<option value='$c4'> $c4 </option>";}  ?>
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
                    

                    <input  name="text5" type="text" class="form-control"  value="<?php echo $t5 ?>">
                     <select name="column5">
                          <?php if($c5!=""){echo "<option value='$c5'> $c5 </option>";}  ?>
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
  
 
 
                    <input  name="text6" type="text" class="form-control"  value="<?php echo $t6 ?>">
                     <select name="column6">
                          <?php if($c6!=""){echo "<option value='$c6'> $c6 </option>";}  ?>
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
  
 
                     <input  name="text7" type="text" class="form-control"  value="<?php echo $t7 ?>">
                     <select name="column7">
                          <?php if($c7!=""){echo "<option value='$c7'> $c7 </option>";}  ?>
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
 

                    <input  name="text8" type="text" class="form-control"  value="<?php echo $t8 ?>">
                     <select name="column8">
                          <?php if($c8!=""){echo "<option value='$c8'> $c8 </option>";}  ?>
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
  
                    <input  name="text9" type="text" class="form-control"  value="<?php echo $t9 ?>">
                     <select name="column9">
                          <?php if($c9!=""){echo "<option value='$c9'> $c9 </option>";}  ?>
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

                   <!--  <input  name="text10" type="text" class="form-control"  value="<?php echo $t10 ?>">
                     <select name="column10">
                          <?php //if($c10!=""){echo "<option value='$c10'> $c10 </option>";} else {echo "<option value=''> Select Data </option>";} ?>
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
                    <input  name="txtLimitE" type="number" min="1" class="form-control"  value="<?php echo $limit ?>">
                  </div>
                  <div class="form-group">
                    <input  name="templete_id" type="hidden"  value="<?php echo $templete_id ?>">
                    <button type="submit" name="btn_edit_save" class="btn btn-primary">Save This </button>
                  </div>
                  <!-- data will submit through smstemplate.php -->
                </form>
            </div>