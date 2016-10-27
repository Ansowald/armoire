#!/usr/bin/python
import sys
import sqlite3
import getopt
import json
import serial  
import time
import os

ser = serial.Serial('/dev/ttyACM0', 9600)
compteur = 0
time.sleep(4)
ser.write('1')
print (os.system('echo '+ser.readline().replace('\n', '').replace('\r', '')+' > answer.txt'))