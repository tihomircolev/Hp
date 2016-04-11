 <?php

$temp = shell_exec('cat /sys/bus/w1/devices/28-000007356840/w1_slave |grep t=');
$temp = explode('t=',$temp);
$temp = $temp[1] / 1000;
$temp = round($temp,2);

$temp2 = shell_exec('cat /sys/bus/w1/devices/28-000007357ad8/w1_slave |grep t=');
$temp2 = explode('t=',$temp2);
$temp2 = $temp2[1] / 1000;
$temp2 = round($temp2,2);


?>


<!DOCTYPE HTML>
<META HTTP-EQUIV="Refresh" CONTENT="30">
<html>
<head>
<title>Kolev`s LAB</title>
<html>
<head>
		<link rel="stylesheet" href="flipclock.css">

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

		<script src="flipclock.js"></script>		
</head>
<body>
		

		<div class="clock" style="margin:2em;"></div>

		<script type="text/javascript">
			var clock;
			
			$(document).ready(function() {
				clock = $('.clock').FlipClock({
					clockFace: 'TwentyFourHourClock'
				});
			});
		</script>
		
	</body>
</html>





<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
body {
	background-color: white;

  	
/*	
background-image: url("5.jpg");
background-color: #8EC1CC;  	
*/
}

</style>
<style>
body {
text-align: center;

}

#g1,#g2 {
width:400px; height:320px;
display: inline-block;
        margin: 1em;
      }



      p {
        display: block;
        width: 450px;
        margin: 2em auto;
        text-align: left;
      }

    </style>

<table noborder>
<table align="center">
<th><td></td><td></td></th>
<tr><td>1 час</td><td>Температура</td></tr>
<tr><td><img src=1h_inside.png></td><td><img src=1h_outside.png></td></tr>
<tr><td>4 часа</td><td>Температура</td></tr>
<tr><td><img src=day_inside.png></td><td><img src=day_outside.png></td></tr>
<tr><td>1 Ден</td><td>Температура</td></tr>
<tr><td><img src=24_inside.png></td><td><img src=24_outside.png></td></tr>
<tr><td>1 Седмица</td><td>Температура</td></tr>
<tr><td><img src=week_inside.png></td><td><img src=week_outside.png></td></tr>
<tr><td>1 Месец</td><td>Температура</td></tr>
<tr><td><img src=month_inside.png></td><td><img src=month_outside.png></td></tr>


</head>
  <body>
    <div id="g1"></div>
    <div id="g2"></div>



    <script src="raphael-2.1.4.min.js"></script>
    <script src="justgage.js"></script>
    <script>
      var g1, g2;

      window.onload = function(){
        var g1 = new JustGage({
          id: "g1",

          value: <?php echo $temp; ?>,
          min: -5,
          max: 45,
          title: "Inside",
          label: "°C"
        });

        var g2 = new JustGage({
          id: "g2",
          value: <?php echo $temp2; ?>,
          min: -30,
          max: 80,
          title: "Outside",
          label: "°C"
        });

        setInterval(function() {
          g1.refresh(<?php echo $temp; ?>);
          g2.refresh(<?php echo $temp2; ?>);
          }, 2500);
      };
    </script>
  </body>
</html>

