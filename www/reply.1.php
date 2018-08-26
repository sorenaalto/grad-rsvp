<!doctype html>
<?php
function getDateTimeSelector($title,$clazz,$times) {
    $html = "<div class=\"row\"><div class=\"col-sm-12\"><h4 class=\"required\">$title:</h4></div></div>";
    $html .= "<div class=\"timeselector panel panel-default\"><div class=\"panel-body\">";
    foreach($times as $d => $tlist) {
        $html .= '<div class="row">';
        $ctr = 0;
        foreach($tlist as $t) {
            $id = $clazz.'-'.++$ctr;
            $fn="$clazz-".str_replace(' ','',$d)."-".str_replace(':','',$t);
            $html .= '<div class="col-sm-4">';
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
    $pmb_times = Array(
      '25 Apr' => ['10:00','13:00'],  
      '26 Apr' => ['10:00','13:00']
        );

    $dbn_times = Array(
      '07 May' => ['09:00','14:00','18:00'],  
      '08 May' => ['09:00','14:00','18:00'],  
      '09 May' => ['09:00','14:00','18:00'],  
      '10 May' => ['09:00','14:00','18:00'],  
      '11 May' => ['09:00','14:00','18:00'],  
      '12 May' => ['09:00','14:00'],  
      '14 May' => ['09:00','14:00']  
        );

    print getDateTimeSelector('Midlands','session-PMB',$pmb_times);
    print getDateTimeSelector('Durban','session-DBN',$dbn_times);

    ?> 
    <div class="">
        <div class="row">
                <div class="col-sm-4">
                    <b>Academic Procession:</b>
                </div>
    			<div class="col-sm-8">
    				<input type="checkbox" name="procession" id="processionY"/>
    				<label for="procession">I wish to participate in the academic procession</label>
    			</div>
		</div>    
        <div class="row">
                <div class="col-sm-4">
                    <b>Gown size:</b>
                </div>
    			<div class="col-sm-8">
    				<input type="radio" name="gownsize" id="sizeS" value="S"/>
    				<label for="sizeS">S</label>
    				<input type="radio" name="gownsize" id="sizeM" value="M"/>
    				<label for="sizeM">M</label>
    				<input type="radio" name="gownsize" id="sizeL" value="L"/>
    				<label for="sizeL">L</label>
    				<input type="radio" name="gownsize" id="sizeXL" value="XL"/>
    				<label for="sizeXL">XL</label>
    				<input type="radio" name="gownsize" id="sizeXXL" value="XXL"/>
    				<label for="sizeXXL">XXL</label>
    				<input type="radio" name="gownsize" id="sizeNone" value="None"/>
    				<label for="sizeNone">I will bring my own gown</label>
    			</div>
		</div>    
    </div>
<!--
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
-->
        <div class="form-group row">
        		<div class="col-sm-12" style="text-align:right;">
				<input type="submit" class="btn btn-primary" />
			</div>
		</div>
        </form>
        </main>
    </div>
    </body>
</html>