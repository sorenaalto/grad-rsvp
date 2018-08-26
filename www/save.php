<html>
    <pre>
<?php
    $db = mysqli_connect('localhost','www','geek','formdata');
    if($db->connect_errno > 0){
        die('Unable to connect to database [' . $db->connect_error . ']');
    }
    
    $fname = "grad-rsvp-sep2018";
    $qs = "insert into submissions (form_name) values ('$fname')";
    if(!$result = $db->query($qs)){
//        print "qs=$qs";
        die('There was an error running the query [' . $db->error . ']');
    }
    
    $sid = mysqli_insert_id($db);
    
    foreach($_POST as $k => $v) {
//        print "\n$k => $v";        
        $qs = "insert into formvals (submission_id,fieldname,value) values ($sid,'$k','$v')";
        $qstmp = "insert into formvals (submission_id,fieldname,value) values (?,?,?)";
        $stmt = mysqli_prepare($db,$qstmp);
        mysqli_stmt_bind_param($stmt,"iss",$sid,$k,$v);

//        if(!$result = $db->query($qs)){
        if(!$result = mysqli_stmt_execute($stmt)){
            die('There was an error running the query [' . $db->error . ']');
        }
    }
?>
    </pre>
    <h3>
    Thank you for your RSVP.  You can collect your ticket(s) from the Graduation Office.
    </h3>
</html>
