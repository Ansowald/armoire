#!/usr/bin/python
import sys
import os
import sqlite3
import getopt
import json
import time
conn = sqlite3.connect('armoire.sqlite')

c = conn.cursor()
c.execute("SELECT * from object_box where object_box.object_id="+sys.argv[1])
r = c.fetchone();
os.system('gpio write '+str(r[0]-1)+' 0')
time.sleep(5);
os.system('gpio write '+str(r[0]-1)+' 1')
conn.close()