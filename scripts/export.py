#!E:\pl\python\python.exe
print("Content-Type: text/html\n\n")
import sys
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
# xl=pandas.ExcelWriter('E:\\xampp\\htdocs\\deptform\\scripts\\test.xlsx',engine='xlsxwriter')

sql = "select * from sub"
mycursor.execute(sql)
res=mycursor.fetchall()
rc=(mycursor.rowcount)
print(rc)
idlist=[]
namelist=[]
paidlist=[]
cols=['id','name','paid']
for x in res:
    idlist.append((x[1]))
    namelist.append((x[0]))
    paidlist.append((x[19]))

df = pandas.DataFrame(list(zip(idlist,namelist,paidlist)), columns=cols)

# df=pandas.DataFrame(
#     {
#         'id':idlist,
#         "name":namelist,
#         'paid':paidlist
#     }
# )
df.to_excel("C:\\test\\output.xlsx")

# sql = "select * from sub"
# for i in range(2):
#    xl.id[i]=id
#    xl.name[i]=name
#    xl.paid[i]=paid
   
#    val = (id,name,paid)
#    mycursor.execute(sql, val)
# mydb.commit()

# sql = "INSERT INTO sub (id,name,paid) VALUES ('123','qwe','YES')"
# mycursor.execute(sql)
# mydb.commit()