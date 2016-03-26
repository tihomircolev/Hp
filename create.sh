rrdtool create cputemp.rrd \
    --start now --step 60 \
DS:cputemp:GAUGE:600:0:50 \
RRA:AVERAGE:0.5:1:288 \
RRA:AVERAGE:0.5:1:2400 \
RRA:MIN:0.5:12:4800 \
RRA:MAX:0.5:12:4800 \
RRA:AVERAGE:0.5:12:4800  
 
