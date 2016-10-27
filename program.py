#!/usr/bin/python
import os
import sqlite3
import serial

os.system('gpio mode 0 out')
os.system('gpio mode 1 out')
os.system('gpio mode 4 out')
os.system('gpio write 0 1')
os.system('gpio write 1 1')
os.system('gpio write 4 1')

print 'Systeme initialise'
