<?php
	session_start();
	
	require("conection/connects.php");
	
	$msg="";
	if(isset($_POST['btn_log'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		$sql=mysqli_query($db,"SELECT * FROM stu_tbl
								WHERE username='$username' AND password='$password' 
								
							");
						
		$cout=mysqli_num_rows($sql);
			if($cout>0){
				$row=mysqli_fetch_array($sql);
				$_SESSION['uname'] =$row['username'];
				$_SESSION['pass'] =$row['password'];
				$_SESSION['stu_id'] =$row['stu_id'];
				$_SESSION['stu_name'] =$row['f_name'].' '.$row['l_name'];
				
					if($row['type']=='admin')
						$msg="UNILAG School Student!.....";	
					else
						header("location: everyones.php");
					
			}
			
			else
					$msg="Login Username and Password Wrong......";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>::. FUD School Manager.::</title>
<link rel="stylesheet" type="text/css" href="css/login.css" />
</head>

<body>
	<form method="post">
    	<fieldset>
        	<fieldset></fieldset>
            	<div id="login_back">
        			<div id="msg"OHG  >
                    
        			</div>
                    
                    <div id="login_form">
                    	<label for="login">Username:</label>
                    	<input type="text" class="fields" name="username" title="Enter username here"  />
                        <div class="clear"></div>
                        <label for="login">Password:</label>
                        <input type="password" class="fields" name="password"  title="Enter Password here"  autocomplete="off"/>
                        <div class="clear"></div>
                        
                        <div id="space_div"></div>
                        <input type="submit" class="button" name="btn_log" value="Log in" />	
                    
                    </div>
        		</div>
    	</fieldset>
    </form>
	<h2 style="color:#00F;" align="center">
	<?php echo $msg; ?>
	</h2>
</body>
</html>