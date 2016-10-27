#!/usr/bin/python
import sys
import sqlite3
import getopt
import json
import time
conn = sqlite3.connect('armoire.sqlite')

c = conn.cursor()
c.execute("SELECT * from user_rent where user_rent.object_id="+sys.argv[2])
r = c.fetchone()
c.execute("SELECT * from user where user.user_id="+sys.argv[1])
s = c.fetchone()
c.execute("INSERT INTO user_rent_history VALUES ("+str(r[0])+","+str(r[1])+",'"+str(r[2])+"',"+str(s[0])+", DateTime('now'))")
conn.commit()
c.execute("DELETE from user_rent where user_rent.object_id ="+sys.argv[2])
conn.commit()
c.execute("SELECT * from user where user.user_id="+sys.argv[1])
print json.dumps(c.fetchall())

# We can also close the connection if we are done with it.
# Just be sure any changes have been committed or they will be lost.
conn.close()