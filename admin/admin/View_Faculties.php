<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysqli_query($db,"DELETE FROM facuties_tbl WHERE faculties_id=$id");
	if($del_sql)
		$msg="1 Record Deleted... !";
	else
		$msg="Could not Delete :".mysqli_error();	
			
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::. Springlight School Manager.::</title>
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
</head>

<body>
<div id="style_div" >
<form method="post">
<table width="755">
	<tr>
    	<td width="200px" style="font-size:18px; color:#006; text-indent:30px;">View Faculties</td>
        <td><a href="?tag=faculties_entry"><input type="button" title="Add new Faculties" name="butAdd" value="Add New" id="button-search" /></a></td>
        <td><input type="text" name="searchtxt" title="Enter name for search " class="search" autocomplete="off"/></td>
        <td style="float:right"><input type="submit" name="btnsearch" value="Search" id="button-search" title="Search Facuty" /></td>
    </tr>
</table>
</form>
</div><!--end of style_div -->
<br />

<div id="content-input">
	<form method="post">
    <table border="1" width="805px" align="center" cellpadding="3" class="mytable" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Faculties Name</th>
            <th width="250px">Note</th>
            <th colspan="2">Operation</th>
      	</tr>
        
         <?php
		 $key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysqli_query($db,"SElECT * FROM facuties_tbl WHERE faculties_name  like '%$key%' ");
	else
    		$sql_sel=mysqli_query($db,"SELECT * FROM facuties_tbl");
			
			
			$i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    	?>
      <tr bgcolor="<?php echo $color?>">
            <td><?php echo $i;?></td>
            <td><?php echo $row['faculties_name'];?></td>
            <td><?php echo $row['note'];?></td>
            <td align="center"><a href="?tag=faculties_entry&opr=upd&rs_id=<?php echo $row['faculties_id'];?>" title="Upate"><img src="picture/update.png" /></a></td>
            <td align="center"><a href="?tag=view_faculties&opr=del&rs_id=<?php echo $row['faculties_id'];?>" title="Delete"><img src="picture/delete.png" /></a></td>
        </tr>
    <?php	
    }
    ?>
   	</table>
 	</form>
</div><!--end of content_input -->
</body>
</html>