#!/usr/bin/python
 
import rrdtool
import os 
databaseFile = "/home/pi/Downloads/bart/temperatures.rrd"
MIN_TEMP = -50
ERROR_TEMP = -999.99
 
rrds_to_filename = {
  "a" :  "/sys/class/thermal/thermal_zone0/temp",

}
 
def read_all():
  template = ""
  update = "N:"
  for rrd in rrds_to_filename:
    template += "%s:" % rrd
    temp = read_temperature(rrds_to_filename[rrd])
    update += "%f:" % temp
  update = update[:-1]
  template = template[:-1]
  rrdtool.update(databaseFile, "--template", template, update)

temp1 = os.system("cat /sys/class/thermal/thermal_zone0/temp")
print temp1


