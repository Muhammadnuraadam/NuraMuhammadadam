<?php

    $teacher = new Datateacher();
    if(isset($_GET['q'])){
        $teacher->$_GET['q']();
    }
    class Datateacher {
        
        function __construct(){
            if(!isset($_SESSION['id'])){
                header('location:../../');   
            }
        }
        
        //get all teacher info
        function getteacher($search){
            $q = "select * from teacher where teachid like '%$search%' or fname like '%$search%' or lname like '%$search%' order by lname,fname,teachid";
            $r = mysql_query($q);
            
            return $r;
        }
        
        //get teacher by ID
        function getteacherbyid($id){
            $q = "select * from teacher where id=$id";
            $r = mysql_query($q);
            
            return $r;
        }
        //add teacher
        function addteacher(){
            include('../../config.php');
            $teachid = $_POST['teachid'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            
            $q = "insert into teacher values('','$teachid','$fname','$lname')";
            mysql_query($q);
            header('location:../teacherlist.php?r=added');
        }
        
        //update teacher
        function updateteacher(){
            include('../../config.php');
            $id = $_GET['id'];
            $teachid = $_POST['teachid'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $q = "update teacher set teachid='$teachid', fname='$fname', lname='$lname' where id=$id";
            mysql_query($q);
            header('location:../teacherlist.php?r=updated');
        }
        
        //remove teacher from class
        function removesubject(){
            include('../../config.php');
            $classid = $_GET['classid'];
            $teachid = $_GET['teachid'];
            mysql_query("update class set teacher=null where id=$classid");
            header('location:../teacherload.php?id='.$teachid.'');
        }
        
    }
?>