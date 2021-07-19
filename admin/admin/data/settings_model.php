<?php
    $settings = new Datasettings();
    if(isset($_GET['q'])){
        $settings->$_GET['q']();
    }

    class Datasettings {
        
        function __construct(){
            if(!isset($_SESSION['id'])){
                header('location:../../');   
            }
        }
        
        function changepassword(){
            include('../../config.php');
            $username = $_GET['username'];
            $current = sha1($_POST['current']);
            $new = sha1($_POST['new']);
            $confirm = sha1($_POST['confirm']);
            $q = "select * from userdata where username='$username' and password='$current'";
            $r = mysql_query($q);
            if(mysql_num_rows($r) > 0){
                if($new == $confirm){
                    $r2 = mysql_query("update userdata set password='$new' where username='$username' and password='$current'");
                    header('location:../settings.php?msg=success&username='.$username.'');   
                }else{
                    header('location:../settings.php?msg=error&username='.$username.'');   
                }
            }else{
                header('location:../settings.php?msg=error&username='.$username.'');   
            }   
        }
        
        function addaccount(){
            include('../../config.php');
            $level = $_GET['level'];
            $id = $_GET['id'];
            $q = "select * from $level where id=$id";
            $r = mysql_query($q);
            $row = mysql_fetch_array($r);
            if($level == 'student'){
                $username = $row['studid'];                
                $fname = $row['fname'];
                $lname = $row['lname'];
                $password = sha1($username.'-'.$fname);
            }else{
                $username = $row['teachid'];                
                $fname = $row['fname'];
                $lname = $row['lname'];
                $password = sha1($username.'-'.$fname);
            }
            $verify = $this->verifyusername($username);
            if($verify){
                $q2 = "insert into userdata values(null,'$username','$password','$fname','$lname','$level')";
                mysql_query($q2);
                header('location:../'.$level.'list.php?r=added an account');
            }else{
                  header('location:../'.$level.'list.php?r=updated'); 
            }
            
        }
        
        function verifyusername($user){
            $q = "select * from userdata where username='$user'";
            $r = mysql_query($q);
            if(mysql_num_rows($r) < 1){
               return true;
            }else{
                return false;   
            }
        }
        
        function getuser($search){
            $user = $_SESSION['id'];
            $q = "select * from userdata where username !='$user' and username like '%$search%' order by lname asc";   
            $r = mysql_query($q);
            return $r;
        }
    }
?>