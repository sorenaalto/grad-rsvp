<!doctype html>
<?php
function getDateTimeSelector($title,$clazz,$days,$times) {
    $html = "<div class=\"row\"><div class=\"col-sm-12\"><h4 class=\"required\">$title:</h4></div></div>";
    $html .= "<div class=\"timeselector panel panel-default\"><div class=\"panel-body\">";
    foreach($days as $d) {
        $html .= '<div class="row">';
        $ctr = 0;
        foreach($times as $t) {
            $id = $clazz.'-'.++$ctr;
            $fn="$d$t"; // need to fix
            $html .= '<div class="col-sm-2">';
            $html .= "<input type=\"checkbox\" name=\"$fn\" id=\"$id\" class=\"$clazz\"/>";
            $html .= "<label for=\"$id\">$d $t</label>";
            $html .= '</div>';
        }
        $html .= '</div>';
    }
    $html .= '</div></div>';
    return $html;
}
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/styles.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="js/validate.js"></script>
  
	<title>RSVP</title>
  </head>
  <body class="bg-light">
      <div class="container">
        <main role="main">
        <div class="row">
            <div class="col-sm-4">
                <img height="120" src="img/2018grad.png"/>
            </div>
            <div class="col-sm-4">
                
            </div>
            <div class="col-sm-4">
                <img height="60" src="http://www.dut.ac.za/wp-content/themes/stylish-v1.2.4-child/dut-logo.jpg"/>
            </div>
        </div>
        <form id="rsvp-form" method="POST" action="save.php">
        <h3>Staff Reply Card</h3>
<<<<<<< HEAD
        <div class="form-group row required"> <!-- name details -->
            <label for="title" class="col-sm-2 col-form-label">Title:</label>
            <div class="col-sm-2">
                <select class="form-control" name="Title" id="frm-title">
                    <option value="">Please select a title</option>
                    <option value="Prof">Prof</option>
                    <option value="Dr">Dr</option>
                    <option value="Mr">Mr</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Miss">Miss</option>
                    <option value="Ms">Ms</option>
=======
        <div class="form-group"> <!-- name details -->
            <div class="row">
                <label for="title" class="col-sm-2">Title:</label>
                <select class="col-sm-2" id='frm-title' name='Title'>
                    <option></option>
                    <option value='Prof'>Prof</option>
                    <option value='Dr'>Dr</option>
                    <option value='Mr'>Mr</option>
                    <option value='Mrs'>Mrs</option>
                    <option value='Miss'>Miss</option>
                    <option value='Ms'>Ms</option>
>>>>>>> branch 'master' of https://github.com/sorenaalto/grad-rsvp.git
                </select>
			</div>
    		</div>
            
<?php
    $pairs = [['Name','Surname'],['Post','Department'],['Telephone','Email']];
    foreach($pairs as $p) {
        print "\n<div class=\"form-group row required\">";
        foreach($p as $f) {
            print "<label for=\"$f\" class=\"col-sm-2 col-form-label\">$f:</label>";
            print "<div class=\"col-sm-4\">";
            print "<input type=\"text\" name=\"$f\" id=\"frm-$f\" class=\"form-control\"/>";
            print "</div>";
        }
        print "\n</div>";
    }
<<<<<<< HEAD
    print getDateTimeSelector('Midlands','datetime-midlands',['25 Apr','26 Apr'],['10:00','13:00']);
    print getDateTimeSelector('Durban','datetime-durban',['07 May','08 May','09 May','10 May','14 May'],['09:00','14:00','18:00']);
    ?>            
        <div class="row">
    			<div class="col-sm-12">
    				<input type="checkbox" name="procession"id="procession"/>
    				<label for="procession">I wish to participate in the academic procession</label>
    			</div>
		</div>            
		<div class="form-group row">
			<div class="col-sm-12">
				<input type="checkbox" name="spouse" id="spouse"/>
    				<label for="spouse">I will be accompanied by my spouse/partner</label>    
    			</div>
		</div>            
		<div class="form-group row required">
			<div class="col-sm-12">
	    			<label for="mailto">Address to which admission cards should be sent:</label>
				<textarea class="form-control" id="frm-Address" rows="4" name="Address"></textarea>
				<div class="text-danger" id="err-Address"></div>
			</div>
		</div>
        <div class="form-group row">
        		<div class="col-sm-12" style="text-align:right;">
				<input type="submit" class="btn btn-primary" />
			</div>
		</div>
=======
?>
        </div>
        <div class="form-group">
            <h4>Midlands:</h4>
<?php
    function makeTag($c,$d,$t) {
        $dc = explode(' ',$d);
        $tc = str_replace(':','',$t);
        return "$c-$dc[1]$dc[0]-$tc";
    }

    $days = ['25 Apr','26 Apr'];
    $times = ['10:00','13:00'];
    foreach($days as $d) {
        print "\n<div class='row'>";
        print "\n<div class='col-sm-2'>$d</div>";
        foreach($times as $t) {
            $fn=makeTag("PMB",$d,$t);
            print "\n<label for='$fn' class='col-sm-1'>$t</label>";
            print "\n<input type='checkbox' name='$fn' id='$fn' class='col-sm-1'/>";
        }
        print "</div>";
    }
?>

            <h4>Durban:</h4>
<?php
    $days = ['07 May','08 May','09 May','10 May','14 May'];
    $times = ['09:00','14:00','18:00'];
    foreach($days as $d) {
        print "\n<div class='row'>";
        print "\n<div class='col-sm-2'>$d</div>";
        foreach($times as $t) {
            $fn=makeTag("DBN",$d,$t);
            print "\n<label for='$fn' class='col-sm-1'>$t</label>";
            print "\n<input type='checkbox' name='$fn' id='$fn' class='col-sm-1'/>";
        }
        print "</div>";
    }
?>
            
        </div>
        <div class="form-group">
<div class='row'>
    <label for='procession' class='col-sm-5'>
        I wish to participate in the academic procession:
    </label>
    <input type='checkbox' name='procession'id='procession' class='col-sm-1'/>
</div>            
<div class='row'>
    <label for='spouse' class='col-sm-5'>
        I will be accompanied by my spouse/partner:
    </label>
    <input type='checkbox' name='spouse'id='spouse' class='col-sm-1'/>
</div>            
<div class='row'>
    <label for='mailto' class='col-sm-5'>
        Address to which admission cards should be sent:
    </label>
    <textarea class='col-sm-5' id='frm-Address' rows='4' name='Address'></textarea>
    <div class='text-danger' id='err-Address'></div>
</div>            
        </div>
        <input type='submit'/>
>>>>>>> branch 'master' of https://github.com/sorenaalto/grad-rsvp.git
        </form>
        </main>
    </div>
    </body>
</html>