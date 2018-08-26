<?php
    header("Content-type: text/csv");
    header("Content-Disposition: attachment; filename='GradRSVP.csv'");
    $db = mysqli_connect('localhost','www','geek','formdata');
    if($db->connect_errno > 0){
        die('Unable to connect to database [' . $db->connect_error . ']');
    }
    
    $fname = "grad-rsvp";
    $qs = "select submission_id,fieldname from formvals where ".
            "(fieldname like 'session-%') ".
            "order by fieldname";
//print "\nqs=$qs";
    if(!$result = $db->query($qs)){
        print "qs=$qs";
        die('There was an error running the query [' . $db->error . ']');
    } else {
        $rows = [];
        while($row = $result->fetch_assoc()) {
            // get all the form vals for this submission ID...    
            $sid = $row['submission_id'];
            $graddate = $row['fieldname'];
            $map = array("session"=>$graddate);
            $qs = "select * from formvals where submission_id=$sid";
//print "\nqs=$qs";
            if(!$result2= $db->query($qs)) {
                print "qs=$qs";
                die('There was an error running the query [' . $db->error . ']');
            } else {
                while($row2 = $result2->fetch_assoc()) {
                    $k = $row2['fieldname'];
                    $v = $row2['value'];
//print "...k,v=$k,$v";
                    $map[$k] = $v;
                }
            }
            $flist = ['session','Title','Name','Surname',
                        'Post','Department','Telephone','Email',
                        'procession','gownsize'];
            $row = [];
            // hack to remove self-as-test data...
            if ($map['Surname'] == 'Aalto') {
                // skip
            } else {
                foreach($flist as $f) {
                    $row[] = $map[$f];
                }
            }
            $rows[] = $row;
        }
    }

    
?>
    
<?php
    $out = fopen('php://output', 'w');
    fputcsv($out,$flist);
    $lastssn = "";
    foreach($rows as $r) {
        if($lastssn != "" && $lastssn != $r[0]) {
            fputcsv($out,['']);
        }
        fputcsv($out, $r) ;
        $lastssn = $r[0];
    }
    fclose($out);
?>
