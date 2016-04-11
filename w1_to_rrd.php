#!/usr/bin/php
<?php
//$teilen = '1000';

// 000005111e90
$temp = shell_exec('cat /sys/bus/w1/devices/28-000007356840/w1_slave |grep t=');
$temp = explode('t=',$temp);
$temp = $temp[1] / 1000;
$temp = round($temp,2);
shell_exec("/usr/bin/rrdtool update /home/pi/tisho/inside.rrd N:$temp");

// 0000051166bf
$temp = shell_exec('cat /sys/bus/w1/devices/28-000007357ad8/w1_slave |grep t=');
$temp = explode('t=',$temp);
$temp = $temp[1] / 1000;
$temp = round($temp,2);
shell_exec("/usr/bin/rrdtool update /home/pi/tisho/outside.rrd N:$temp");


?>
