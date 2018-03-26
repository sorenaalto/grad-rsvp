<html>
    <pre>
<?php
    $db = mysqli_connect('localhost','www','geek','formdata');
    if($db->connect_errno > 0){
        die('Unable to connect to database [' . $db->connect_error . ']');
    }
    
    $fname = "grad-rsvp";
    $qs = "select submission_id,fieldname from formvals where fieldname like 'DBN-%' order by fieldname";
print "\nqs=$qs";
    if(!$result = $db->query($qs)){
        print "qs=$qs";
        die('There was an error running the query [' . $db->error . ']');
    } else {
        $rows = [];
        while($row = $result->fetch_assoc()) {
            // get all the form vals for this submission ID...    
            $sid = $row['submission_id'];
            $graddate = $row['fieldname'];
            $map = array("graddate"=>$graddate);
            $qs = "select * from formvals where submission_id=$sid";
print "\nqs=$qs";
            if(!$result2= $db->query($qs)) {
                while($row2 = $result2->fetch_assoc()) {
                    $k = $row['fieldname'];
                    $v = $row['value'];
print "...k,v=$k,$v";
                    $map[$k] = $v;
                }
            }
            $flist = ['graddate','title','Name','Surname',
                        'Post','Department','Telephone','Email',
                        'spouse','procession',
                        'Address'];
            $row = [];
            foreach($flist as $f) {
                $row[] = $map[$f];
            }
            $rows[] = $row;
        }
    }

    print "<table>";
    foreach($rows as $r) {
        print "<tr>";
        foreach($r as $v) {
            print "<td>$v</td>";
        }
        print "<tr>";
    }
    
?>    
    </pre>
</html>