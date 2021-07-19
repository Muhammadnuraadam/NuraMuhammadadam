<?php
    
    $grade = new Datagrade();

    function __construct(){
            if(!isset($_SESSION['id'])){
                header('location:../../');   
            }
        }

    class Datagrade {
        
        function __construct(){
            if(!isset($_SESSION['id'])){
                header('location:../../');   
            }
        }
        
        function getid(){
            $studid = $_SESSION['id'];
            $r = mysql_query("select * from student where studid='$studid'");
            $row = mysql_fetch_array($r);
            $id = $row['id'];
            return $id;
        }
        
        function getsubject(){
            $id = $this->getid();
            $q = "select * from studentsubject where studid=$id";
            $r = mysql_query($q);
            $data = array();
            while($row = mysql_fetch_array($r)){
                $classid = $row['classid'];
                $q2 = "select * from class where id=$classid";   
                $r2 = mysql_query($q2);  
                $data[] = mysql_fetch_array($r2);
            }
            return $data;
        }
        
        function getgrade($classid){
            $studid = $this->getid();
            $q = "select * from studentsubject where studid='$studid' and classid='$classid'";
            $r = mysql_query($q);
            if($row = mysql_fetch_array($r)){
                $att1 = ($row['att1']) * .10;   
                $att2 = ($row['att2']) * .10;   
                $att3 = ($row['att3']) * .10; 
                
                $exam1 = ($row['exam1']) * .50;   
                $exam2 = ($row['exam2']) * .50;   
                $exam3 = ($row['exam3']) * .50; 
                
                $quiz1 = ($row['quiz1']) * .20;   
                $quiz2 = ($row['quiz2']) * .20;   
                $quiz3 = ($row['quiz3']) * .20; 
                
                $project1 = ($row['project1']) * .20;   
                $project2 = ($row['project2']) * .20;   
                $project3 = ($row['project3']) * .20; 
                
                $prelim = $att1 + $exam1 + $quiz1 + $project1;
                $midterm = $att2 + $exam2 + $quiz2 + $project2;
                $final = $att3 + $exam3 + $quiz3 + $project3;
                
                $total = ($prelim * .30) + ($midterm * .30) + ($final * .40);
                
                $data = array(
                    'prelim' => $prelim,
                    'midterm' => $midterm,
                    'final' => $final,
                    'total' => $total,
                    'att1' => $row['att1'],
                    'att2' => $row['att2'],
                    'att3' => $row['att3'],
                    'exam1' => $row['exam1'],
                    'exam2' => $row['exam2'],
                    'exam3' => $row['exam3'],
                    'quiz1' => $row['quiz1'],
                    'quiz2' => $row['quiz2'],
                    'quiz3' => $row['quiz3'],
                    'project1' => $row['project1'],
                    'project2' => $row['project2'],
                    'project3' => $row['project3']
                );
            }
            
            return $data;
        }
        
        function getteacher($teachid){
            $r = mysql_query("select * from teacher where id=$teachid");
            $result = mysql_fetch_array($r);
            $data = $result['fname'].' '.$result['lname'];
            return $data;
        }
        
    }
?>