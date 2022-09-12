#!E:\pl\python\python.exe
from asyncio.windows_events import NULL
import sys
import typing
sys.path.append("e:\\pl\\python\\lib\\site-packages")


import pandas
import mysql.connector
mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="dept"
)
mycursor = mydb.cursor()
xl=pandas.read_excel('E:\\xampp\\htdocs\\deptform\\scripts\\regg.xlsx')
rowcount=len(xl.index)
print(rowcount)
for i in range(rowcount):
  id=str(xl.id[i])
  name=str(xl.name[i])
  if(str(xl.email[i])=='nan'):
    email=None
  else:
    email=str(xl.email[i])
  if(str(xl.phone[i])=='nan'):
    phone=None
  else:
    phone=str(xl.phone[i])
  if(str(xl.dept[i])=='nan'):
    dept=None
  else:
    dept=str(xl.dept[i])
  if(str(xl.year[i])=='nan'):
    year=None
  else:
    year=str(xl.year[i])
  if(str(xl.section[i])=='nan'):
    section=None
  else:
    section=str(xl.section[i])
  if(str(xl.techtalk[i])=='nan'):
    techtalk=None
  else:
    techtalk=str(xl.techtalk[i])
  if(str(xl.blindcoding[i])=='nan'):
    blindcoding=None
  else:
    blindcoding=str(xl.blindcoding[i])
  if(str(xl.treasurehunt[i])=='nan'):
    treasurehunt=None
  else:
    treasurehunt=str(xl.treasurehunt[i])
  if(str(xl.codingcontest[i])=='nan'):
    codingcontest=None
  else:
    codingcontest=str(xl.codingcontest[i])
  if(str(xl.ipidea[i])=='nan'):
    ipidea=None
  else:
    ipidea=str(xl.ipidea[i])
  if(str(xl.debate[i])=='nan'):
    debate=None
  else:
    debate=str(xl.debate[i])
  if(str(xl.typingtest[i])=='nan'):
    typingtest=None
  else:
    typingtest=str(xl.typingtest[i])
  if(str(xl.memorytest[i])=='nan'):
    memorytest=None
  else:
    memorytest=str(xl.memorytest[i])
  if(str(xl.fastestfinger[i])=='nan'):
    fastestfinger=None
  else:
    fastestfinger=str(xl.fastestfinger[i])
  if(str(xl.photography[i])=='nan'):
    photography=None
  else:
    photography=str(xl.photography[i])
  
  paid=str(xl.paid[i])

  sql = "INSERT INTO sub (id,name,email,phone,dept,year,section,techtalk,blindcoding,treasurehunt,codingcontest,ipidea,debate,typingtest,memorytest,fastestfinger,photography,paid) VALUES (%s, %s, %s,%s, %s, %s,%s, %s, %s,%s, %s, %s,%s, %s, %s,%s, %s, %s)"
  val = (id,name,email,phone,dept,year,section,techtalk,blindcoding,treasurehunt,codingcontest,ipidea,debate,typingtest,memorytest,fastestfinger,photography,paid)
  mycursor.execute(sql, val)
mydb.commit()

# sql = "INSERT INTO sub (id,name,paid) VALUES ('123','qwe','YES')"
# mycursor.execute(sql)
# mydb.commit()