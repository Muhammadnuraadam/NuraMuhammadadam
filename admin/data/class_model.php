<?php

    $class = new Dataclass();
    if(isset($_GET['q'])){
        $class->$_GET['q']();
    }
    class Dataclass {
        
        function __construct(){
            if(!isset($_SESSION['id'])){
                header('location:../../');   
            }
        }
        //get all class info
        function getclass($search){
            $q = "select * from class where course like '%$search%' or year like '%$search%' or section like '%$search%' or sem like '%$search%' order by course,year,section,sem asc";
            $r = mysql_query($q);
            
            return $r;
        }
        
        //get class by ID
        function getclassbyid($id){
            $q = "select * from class where id=$id";
            $r = mysql_query($q);
            
            return $r;
        }
        //add class
        function addclass(){
            include('../../config.php');
            $course = $_POST['course'];
            $year = $_POST['year'];
            $section = $_POST['section'];
            $sem = $_POST['sem'];
            $subject = $_POST['subject'];
            
            echo $q = "insert into class values('','$course','$year','$section','$sem','','$subject')";
            mysql_query($q);
            header('location:../class.php?r=added');
        }
        
        //update class
        function updateclass(){
            include('../../config.php');
            $id = $_GET['id'];
            $course = $_POST['course'];
            $year = $_POST['year'];
            $section = $_POST['section'];
            $sem = $_POST['sem'];
            $subject = $_POST['subject'];
            
            echo $q = "update class set course='$course', year='$year', section='$section', sem='$sem', subject='$subject' where id=$id";
            mysql_query($q);
            header('location:../class.php?r=updated');
        }
        
        //get all students in that class
        function getstudentsubject(){ 
            $classid = $_GET['classid'];
            $q = "select * from studentsubject where classid=$classid";
            $r = mysql_query($q);
            $result = array();
            while($row = mysql_fetch_array($r)){
                $q2 = 'select * from student where id='.$row['studid'].'';
                $r2 = mysql_query($q2);
                $result[] = mysql_fetch_array($r2);
            }
            return $result;
        }
        
        //add student to class
        function addstudent(){
            include('../../config.php');  
            $classid = $_GET['classid'];
            $studid = $_GET['studid'];
            $verify = $this->verifystudent($studid,$classid);
            if($verify){
                echo $q = "INSERT INTO studentsubject (studid,classid) VALUES ('$studid', '$classid');";
                mysql_query($q);
                header('location:../classstudent.php?r=success&classid='.$classid.'');
            }else{
                header('location:../classstudent.php?r=duplicate&classid='.$classid.'');
            }
            
        }
        //verify if he/she is enrolled
        function verifystudent($studid,$classid){
            include('../../config.php');  
            $q = "select * from studentsubject where studid=$studid and classid=$classid";
            $r = mysql_query($q);
            if(mysql_num_rows($r) < 1){
                return true;
            }else{
                return false;   
            }
        }
        //remove student to the class
        function removestudent(){
            $classid = $_GET['classid'];
            $studid = $_GET['studid'];
            include('../../config.php');  
            $q = "delete from studentsubject where studid=$studid and classid=$classid";
            mysql_query($q);
            header('location:../classstudent.php?r=success&classid='.$classid.'');
        }
        
        //update teacher
        function updateteacher(){
            $classid = $_GET['classid'];
            $teachid = $_GET['teachid'];
            include('../../config.php'); 
            $q = "update class set teacher=$teachid where id=$classid";
            mysql_query($q);
            header('location:../classteacher.php?classid='.$classid.'&teacherid='.$teachid.'');
        }
        
    }
?>