#!/bin/bash
cd /home/pi/Downloads/bart
# read the temperature and convert .59234. into .59.234. (degrees celsius)
TEMPERATURE=`cat /sys/class/thermal/thermal_zone0/temp`
TEMPERATURE=`echo -n ${TEMPERATURE:0:2}; echo -n .; echo -n ${TEMPERATURE:2}`
#/usr/bin/rrdtool update cputemp.rrd N:$TEMPERATURE
/usr/bin/rrdtool update cputemp.rrd `date +"%s"`:$TEMPERATURE
#/usr/bin/rrdtool graph cputemp.png DEF:temp=cputemp.rrd:cputemp:AVERAGE LINE2:temp#00FF00
/usr/bin/rrdtool graph cputemp.png DEF:temp=cputemp.rrd:cputemp:AVERAGE  LINE2:temp#00FF00 --width 800 

