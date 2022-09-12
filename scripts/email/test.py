#!E:\pl\python\python.exe
print("Content-Type: text/html\n\n")
import sys
sys.path.append("e:\\pl\\python\\lib\\site-packages")



# Python code to illustrate Sending mails with different attachments to multiple emails
# from your Gmail account
#By Ratan Kumar - MVGR GLUG

# enable less secure apps option in your gmail account settings
# libraries to be imported
import smtplib
import os
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
from email.mime.base import MIMEBase
from email import encoders

# creates SMTP session
s = smtplib.SMTP('smtp.gmail.com',587 )

# start TLS for security
s.starttls()

fromaddr = 'rattankumar2511@gmail.com'
# Authentication
s.login(fromaddr, "vlutqmwwstibjzmc")

f=open(r"E:\xampp\htdocs\deptform\scripts\email\mails.txt")  #add the the mails in a text file and attach it using relative or absolute path
ff=open(r"E:\xampp\htdocs\deptform\scripts\email\names.txt") #add the names in a text file and attach it using relative or absolute path in the same order as mail
f1=f.readlines()
ff1=ff.readlines()
folder = r'E:\xampp\htdocs\deptform\scripts\email\cert\\'  #add the path to the attachments, they should be in the same order as mails, these are accessed name wise
count = 0
# count increase by 1 in each iteration
# iterate all files from a directory

for file_name in os.listdir(folder):
    # Construct old file name
    toaddr = f1[count]

    # instance of MIMEMultipart
    msg = MIMEMultipart()
    
    # storing the senders email address
    msg['From'] = fromaddr

    # storing the receivers email address
    msg['To'] = toaddr

    # storing the subject
    msg['Subject'] = "Swecha Summerfest 2022 Certificate"

    # string to store the body of the mail
    body1='Hi '+ff1[count]+' ,\n'
    body =body1+'''     Thank you so much for your time during summer fest 
Your presence made us delightful  
Please find below attachment for your certification.
We look forward to hear back from you soon and to work collaboratively. 
Visit MVGR Glug office, MBA, MVGR.

#learn&share #swecha #mglug

For further updates follow us on MVGR_GLUG insta page :
https://instagram.com/mvgr_glug?igshid=YmMyMTA2M2Y=


                  - Regards,
                     SWECHA AP
                      MVGR GLUG.
    '''

    # attach the body with the msg instance
    msg.attach(MIMEText(body, 'plain'))

    # open the file to be sent
    filename = r"cert\\"+file_name #file path
    # filename1=ff1[count]+".txt"
    attachment = open(filename, "rb")

    # instance of MIMEBase and named as p
    p = MIMEBase('application', 'octet-stream')

    # To change the payload into encoded form
    p.set_payload((attachment).read())

    # encode into base64
    encoders.encode_base64(p)

    p.add_header('Content-Disposition', "attachment; filename= %s" % filename)

    # attach the instance 'p' to instance 'msg'
    msg.attach(p)

    # Converts the Multipart msg into a string
    text = msg.as_string()

    # sending the mail
    s.sendmail(fromaddr, toaddr, text)
    count=count+1
    print('Sent to : '+toaddr) #confirmed after sending the mail to a id

print("All mails sent successfully")
    

