<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
//--------------add data-----------------	
if(isset($_POST['btn_sub'])){
	extract($_POST);	
	
	
	
	
$sql_ins="INSERT INTO account(id,uname,pass,api) VALUES(NULL,'$uname','$pass','$api')";
$Query = $db->query($sql_ins) or die($db->error);
if($sql_ins==true)
	$msg="1 Row Inserted";
else
	$msg="Insert Error:".mysqli_error();
	
}
//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$f_name=$_POST['fnametxt'];
	$l_name=$_POST['lnametxt'];
	$gender=$_POST['gender'];
	$dob=$_POST['yy']."/".$_POST['mm']."/".$_POST['dd'];
	$pob=$_POST['pobtxt'];
	$addr=$_POST['addrtxt'];
	$phone=$_POST['phonetxt'];
	$mail=$_POST['emailtxt'];
	$note=$_POST['notetxt'];
	$reg_no=$_POST['reg_no'];
	$username=$_POST['username'];
	$password=$_POST['password'];		
	
	$sql_update=mysqli_query($db,"UPDATE stu_tbl SET 
								f_name='$f_name',
								l_name='$l_name' ,
								gender='$gender',
								dob='$dob',
								pob='$pob',
								address='$addr',
								phone='$phone',
								email='$mail',
								note='$note',
								reg_no = '$reg_no',
								username='$username',
								password='$password'
							WHERE
								stu_id=$id
							");
	if($sql_update==true)
		{
			?>
            <script>
			window.location='everyone.php?tag=view_students';
			</script>
			<?php }
	else
		$msg=mysqli_error('Update Fail');
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet"  type="text/css" href="css/style_entry.css" />
<title>::. UNILAG School Manager.::</title>
</head>
<body>
<?php

if($opr=="upd")
{
	$sql_upd=mysqli_query($db, "SELECT * FROM stu_tbl WHERE stu_id=$id");
	$rs_upd=mysqli_fetch_array($sql_upd);
	list($y,$m,$d)=explode('-',$rs_upd['dob']);
?>

<!-- for form Upadte-->

<div id="top_style">
        <div id="top_style_text">
        Students Update </div>
        <!-- end of top_style_text-->
       <div id="top_style_button"> 
       		
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<!-- end of style_informatios -->

<?php	
}
else
{
?>
<!-- for form Register-->
	
<div id="top_style">
        <div id="top_style_text">
        Students Entry
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_assignment"><input type="button" name="btn_view" title="View Students" value="View_Students" id="button_view" style="width:120px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post" enctype="multipart/form-data">
    <div>
   	  <table border="0" cellpadding="4" cellspacing="0">
            <tr>
            	<td>Username:</td>
            	<td>
                	<input type="text" name="uname" id="textbox"/>
                </td>
            </tr>
             <tr>
            	<td>Passsword:</td>
            	<td>
                	<input type="password" name="pass" id="textbox"/>
                </td>
            </tr>
            
         <!--  <tr>
            	<td>Lecturer's Name</td>
            	<td>
                	<select name="teacher_id" id="textbox">
                    	<option>---- Teachers's Name   ----</option>
                            <?php
                                $te_name=mysqli_query($db,"SELECT * FROM teacher_tbl");
								while($row=mysqli_fetch_array($te_name)){
								?>
                                <option value="<?php echo $row['teacher_id'];?>"> <?php echo $row['f_name'] ; echo " "; echo $row['l_name'];?> </option>
                                	
								<?php	
									}
                            ?>
                    </select>
                </td>
            </tr>
            
           -->
            
           
	  </table>
    </div>
  
	<div>
	  <table border="0" cellpadding="4" cellspacing="0">
	  		
            <tr>
            	<td>API SIGNATURE:</td>
            	<td>
                	<input type="text" name="api" id="textbox"/>
                </td>
            </tr>
            
            
            
            <tr>
                <td colspan="2">
                	<input type="reset" value="Cancel" id="button-in"/>
                	<input type="submit" name="btn_sub" value="Submit" id="button-in"  />
                </td>
            </tr>
           
      </table>
      
	</div>
    </form>

</div><!-- end of style_informatios -->
<?php
}
?>
</body>
</html>