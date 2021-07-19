<?php
	session_start();
	
	require("conection/connects.php");
	$tag="";
	if (isset($_GET['tag']))
	$tag=$_GET['tag'];
	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FUD School Manager.::</title>
<link rel="stylesheet" type="text/css" href="css/everyone_format.css" />
<link rel="stylesheet" type="text/css" href="css/menu.css"/>
<link rel="stylesheet" type="text/css" href="css/home.css"/>

</head>

<body>

   <div id="top">
      <div><a href="index.php" style="color:#FFFFFF; font-size:17px;">Logout</a>&nbsp;&nbsp;<b>language:</b>
            <select name="#">
                <option value="#">English &nbsp; &nbsp; &nbsp; </option>
              
        </select>
      </div>
</div>
<br />
<div id="admin">
	
        <div id="lmain">
                <a href="#" title="logo" ><img src="picture/logo.png" /></a>
                <div id="leftmanu">
                	<div >
                        <a href="?tag=home" title="HOME (Shift+Ctrl+H)">HOME</a><br />
                	</div>
                    
                   <?php /*?> 
                    <?php 
						$sql_menu=mysql_query("SELECT * FROM  article_tbl WHERE loca_id=1");
						while($row=mysql_fetch_array($sql_menu)){
						?>
						 <div><a href="?tag=view&v_id=<?php echo $row['a_id'];?>"><?php echo $row['title'];?></a></div>
						<?php	
							}
						?>  <?php */?>
                    
                    
                 <div>
                    	<a href="everyones.php?tag=student_entry" title="Shift+1"> &nbsp;Students Entry </a><br />
                    </div>
                    
                    <div>
                    	<a href="everyones.php?tag=view_assignment" class="customer" title="Shift+2">&nbsp;View Entry</a>
                    </div>
                     <div>
                    	<a href="everyones.php?tag=payment" class="customer" title="Shift+2">&nbsp;Payment Gateway</a>
                    </div>
                     
                </div><!-- end of leftmanu -->
        </div><!--end of lmaim -->
        
        <div>
        
        
        </div>
    <div id="rmain">
    	<div id="pic_manu">
    		<a href="#" title="Studnt"><img src="picture/student.png" hspace="10px" /></a>
            <a href="#" title="Teacher"><img src="picture/teacher.png" hspace="20px" /></a>
            <a href="#" title="Faculties"><img src="picture/faculties.png" hspace="15px" /></a>
            <a href="#" title="Subject"><img src="picture/subject.png" hspace="10px" /></a>
            <a href="#" title="Score"><img src="picture/score.png" hspace="20px" /></a>
            <a href="#" title="User"><img src="picture/user.png" hspace="10px" /></a>
            <a href="#" title="Location"><img src="picture/location.png" hspace="10px" /></a>
            <a href="#" title="Article"><img src="picture/article.png" hspace="10px" /></a>
            <a href="#" title="About us"><img src="picture/about us.png" hspace="15px" /></a>
            <a href="#" title="Contact"><img src="picture/contact.png" hspace="10px" /></a>
         </div><!--end of pic_manu -->
        
        
        
        
         <div id="menu2">
                
                <div style="width:4px; height:37px; padding:0px; margin:0px; float:left;"></div>
                
                <li id="li_menu"><a href="">Students</a>
                
                    
                    <ul>
                        <li id="li_submenu">
                        <a href="everyones.php?tag=student_entry" class="sales">Students Entry</a></li>
                        <li id="li_submenu"><a href="everyones.php?tag=view_students" class="stocks">View Students</a></li>
                        <li id="li_submenu"><a href="everyones.php?tag=view_students" class="stocks">View Students</a></li>
                       
                    </ul>
                
                
                </li>
                
               
                 
                </li>
                           
      </div><!--end of menu2--> 
            
            
            <div id="contents">
            
            	<div id="informations">
                	<div id="in_informations">
				<?php
   						if($tag=="home" or $tag=="")
							include("homes.php");
                        elseif($tag=="student_entry")
                            include("Students_Entrys.php");
                       	elseif($tag=="view_assignment")
                            include("View_assignment.php");
							elseif($tag=="payment")
                            include("confirmation.php");
							elseif($tag=="paypal_entry")
                            include("paypal_entry.php");
                       	
                       
                        ?>
                    </div><!--end of in_informations -->
                </div><!--end of informations -->
    		</div><!--end of contens -->   
     </div><!--end of rmain -->
    	
    </div><!--end of admin -->

</body>
</html>