<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <title>RSVP</title>
  </head>
  <body class='bg-light'>
      <div class='container'>
        <main role="main">
        <div class="row">
            <div class='col-sm-4'>
                <img height='120' src='img/2018grad.png'/>
            </div>
            <div class='col-sm-4'>
                
            </div>
            <div class='col-sm-4'>
                <img height='60' src='http://www.dut.ac.za/wp-content/themes/stylish-v1.2.4-child/dut-logo.jpg'/>
            </div>
        </div>
        <form method='POST' action='save.php'>
        <h3>Staff Reply Card</h3>
        <div class="form-group"> <!-- name details -->
            <div class="row">
                <label for="title" class="col-sm-2">Title:</label>
                <select class="col-sm-2">
                    <option>-</option>
                    <option>Prof</option>
                    <option>Dr</option>
                    <option>Mr</option>
                    <option>Mrs</option>
                    <option>Miss</option>
                    <option>Ms</option>
                </select>
            </div>
            
<?php
    $pairs = [['Name','Surname'],['Post','Department'],['Telephone','Email']];
    foreach($pairs as $p) {
        print "\n<div class='row'>";
        foreach($p as $f) {
            print "<label for='$f' class='col-sm-2'>$f:</label>";
            print "<input type='text' name='$f' id='$f' class='col-sm-3'/>";
        }
        print "\n</div>";
    }
?>
        </div>
        <div class="form-group">
            <h4>Midlands:</h4>
<?php
    $days = ['25 Apr','26 Apr'];
    $times = ['10:00','13:00'];
    foreach($days as $d) {
        print "\n<div class='row'>";
        print "\n<div class='col-sm-2'>$d</div>";
        foreach($times as $t) {
            $fn="$d$t"; // need to fix
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
            $fn="$d$t"; // need to fix
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
    <textarea class='col-sm-5' rows='4' name='address'></textarea>
</div>            
        </div>
        <input type='submit'/>
        </form>
        </main>
    </div>
    </body>
</html>