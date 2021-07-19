<?php
    $subject = new Datasubject();
    if(isset($_GET['q'])){
        $function = $_GET['q'];
        $subject->$function();
    }
    class Datasubject {
        
        function __construct(){
            if(!isset($_SESSION['id'])){
                header('location:../../');   
            }
        }
        
        function getsubject($sem,$id){
            $q = "select * from class where teacher=$id and sem='$sem' order by subject asc";   
            $r = mysql_query($q);
            return $r;
        }
        
        function getallsubject($id){
            $q = "select * from class where teacher=$id order by subject asc";   
            $r = mysql_query($q);
            return $r;
        }
    }
?>