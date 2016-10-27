#!/usr/bin/python
import sys
import sqlite3
import getopt
import json
conn = sqlite3.connect('armoire.sqlite')

c = conn.cursor()

c.execute('SELECT * FROM user where user_id='+sys.argv[1])
print json.dumps(c.fetchall())

# We can also close the connection if we are done with it.
# Just be sure any changes have been committed or they will be lost.
conn.close()