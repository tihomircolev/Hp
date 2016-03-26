#!/bin/bash

RRDPATH="/home/pi/Downloads/bart"
IMGPATH="/home/pi/Downloads/bart"
RAWCOLOUR="#FF0000"
RAWCOLOUR2="#CC3366"
RAWCOLOUR3="#336699"
RAWCOLOUR4="#006600"
RAWCOLOUR5="#000000"
TRENDCOLOUR="#FFFF00"
RRDFILE="cputemp.rrd"

#hour
rrdtool graph $IMGPATH/hour.png --start -6h \
--full-size-mode \
--width=700 --height=400 \
--slope-mode \
--color=SHADEB#9999CC \
--watermark="Bart Bania" \
DEF:temp=$RRDPATH/$RRDFILE:cputemp:AVERAGE \
GPRINT:temp:LAST:"Cur\: %5.2lf" \
GPRINT:temp:AVERAGE:"Avg\: %5.2lf" \
GPRINT:temp:MAX:"Max\: %5.2lf" \
GPRINT:temp:MIN:"Min\: %5.2lf\t\t\t" \
LINE2:temp$RAWCOLOUR:"CPU_TEMP" \
HRULE:0#0000FF:"freezing"

sudo cp /home/pi/Downloads/bart/hour.png /var/www/html/
sudo cp /home/pi/Downloads/bart/cputemp.png /var/www/html/
