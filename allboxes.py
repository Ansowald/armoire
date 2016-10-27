#!/usr/bin/python
import sys
import sqlite3
import getopt
import json
conn = sqlite3.connect('armoire.sqlite')

c = conn.cursor()

c.execute('SELECT * FROM box LEFT OUTER JOIN object_box ON box.box_id = object_box.box_id LEFT OUTER JOIN object ON object.object_id = object_box.object_id LEFT OUTER JOIN user_rent on user_rent.object_id = object_box.object_id LEFT OUTER JOIN user on user.user_id = user_rent.user_id where object_box.date_delete is null or object_box.date_delete = ""')
print json.dumps(c.fetchall())

# We can also close the connection if we are done with it.
# Just be sure any changes have been committed or they will be lost.
conn.close()