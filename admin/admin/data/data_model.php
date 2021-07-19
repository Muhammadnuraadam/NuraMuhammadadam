<?php
    $data = new Data();
    if(isset($_GET['q'])){
        $data->$_GET['q']();
    }
    class Data {
        
        function __construct(){
            if(!isset($_SESSION['id'])){
                header('location:../../');   
            }
        }
        
        //get all subjects
        function getsubject($search){
            $q = "select * from subject where code like '%$search%' or title like '%$search%' order by code asc";
            $r = mysql_query($q);
            
            return $r;
        }
        //get subject by ID
        function getsubjectbyid($id){
            $q = "select * from subject where id=$id";
            $r = mysql_query($q);
            
            return $r;
        }
        //add subject
        function addsubject(){
            include('../../config.php');
            $code = $_POST['code'];
            $title = $_POST['title'];
            $q = "insert into subject values('','$code','$title')";
            mysql_query($q);
            header('location:../subject.php?r=added');
        }
        
        //update subject
        function updatesubject(){
            include('../../config.php');
            $id = $_GET['id'];
            $code = $_POST['code'];
            $title = $_POST['title'];
            $q = "update subject set code='$code', title='$title' where id=$id";
            mysql_query($q);
            header('location:../subject.php?r=updated');
        }
        
        //GLOBAL DELETION
        function delete(){
            include('../../config.php');
            $table = $_GET['table'];
            $id = $_GET['id'];
            $q = "delete from $table where id=$id";
            mysql_query($q);
            if($table=='subject'){
                header('location:../subject.php?r=deleted');
            }else if($table=='class'){
                header('location:../class.php?r=deleted');
            }else if($table=='student'){
                header('location:../studentlist.php?r=deleted');
            }else if($table=='teacher'){
                header('location:../teacherlist.php?r=deleted');
            }else if($table=='userdata'){
                header('location:../users.php?r=deleted');
            }
        }
    }
?>