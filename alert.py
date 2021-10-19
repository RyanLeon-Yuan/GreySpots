
#!/usr/bin/python3
 
import smtplib
import time
import datetime
import pymysql
from email.mime.text import MIMEText
from email.header import Header

name_list = []
postcode_list = []
email_address_list = []
body = ""
body2 = ""
body3 = ""
body4 = ""
body5 = ""
body6 = ""
today_date1 = time.strftime("%Y-%m-%d", time.localtime())
today_date2 = datetime.datetime.strptime(today_date1, '%Y-%m-%d')

"""
define a function of send email from server
"""

def send_email(i,body):

    sender = 'craig@fit5120te20'
    receivers = [email_address_list[i]]

    # 三个参数：第一个为文本内容，第二个 plain 设置文本格式，第三个 utf-8 设置编码
    message = MIMEText(body, _subtype="html", _charset="gb2312")
    message['Subject'] = 'Updated information for Greyspots Subscribers'
    message['From'] = "Greyspots"
    message['To'] = "Subscribers"

    try:
        smtpObj = smtplib.SMTP('localhost')
        smtpObj.sendmail(sender, receivers, message.as_string())
        print ("Email sent successfully")
    except smtplib.SMTPException:
        print ("Error: Email sent failed")

"""
select data from subscribers table
"""

# 打开数据库连接
db = pymysql.connect(host='137.184.0.8', user='dba', password='dba@te20TechHumans', database='greyspots_clients', port=3306)
 
# 使用cursor()方法获取操作游标 
cursor = db.cursor()

# SQL 查询语句
sql = "SELECT distinct name,postcode,email_id FROM GS_SUBSCRIBERS"

try:
   # 执行SQL语句
   cursor.execute(sql)
   # 获取所有记录列表
   results = cursor.fetchall()
   for row in results:
      name = row[0]
      postcode = row[1]
      email_id = row[2]
      # 打印结果
      print("name=%s,postcode=%s,email_id=%s" % \
             (name, postcode, email_id))
      name_list.append(name)
      postcode_list.append(postcode)
      email_address_list.append(email_id)

except:
   print ("Error: unable to fetch data")
 
# 关闭数据库连接
db.close()

"""
use postcode to select info from database
"""

for i in range(len(postcode_list)):
    """
        select info from table COVID_POSTCODE_TABLE
        """
    db = pymysql.connect(host='137.184.0.8', user='dba', password='dba@te20TechHumans', database='greyspots', port=3306)

    # 使用cursor()方法获取操作游标
    cursor = db.cursor()

    # SQL 查询语句
    sql = "SELECT * FROM COVID_POSTCODE_TABLE where postcode = '%s' ORDER BY file_processed_date DESC limit 1" % (postcode_list[i])
    # sql = "SELECT * FROM COVID_POSTCODE_TABLE where postcode = '%s' and file_processed_date = '%s'" % (postcode_list[i], today_date2)
    # sql = "SELECT * FROM COVID_POSTCODE_TABLE where postcode = '%s' and file_processed_date = '%s'" % (postcode_list[i],"2021-09-10")
    # print(sql)
    mail = ""

    try:
        # 执行SQL语句
        cursor.execute(sql)
        # 获取所有记录列表
        results = cursor.fetchall()
        header = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>'
        title = "<body text='#000000'><center><font size=5><b>" + "COVID EXPOSURE ALERT" + "</b></font></center>"


        for row in results:
            postcode = row[0]
            population = row[1]
            active = row[2]
            cases = row[3]
            rate = row[4]
            new = row[5]
            band = row[6]
            data_date = row[7]
            file_processed_date = row[8]
            data_date1 = datetime.datetime.strptime(data_date, "%Y-%m-%d %H:%M:%S").date();
            file_processed_date1 = datetime.datetime.strptime(file_processed_date, "%Y-%m-%d %H:%M:%S").date();
            """
            body2 = "<p>In area of postcode " + str(postcode) + ", where has " + str(population) + \
                    " population in total. Here has " + str(active) + " active cases and " + str(cases) + \
                     " history cases till today. For now the cases increasing rate is " + str(rate) + \
                    ". Today here appears " + str(new) + " new cases. These data is for " + str(data_date1) + \
                    ", updated on " + str(file_processed_date1) + '.</p>'
            """
            body3 = '<p>Dear '+str(name_list[i])+',</p>'
            body4 = '<p>This is your Covid-19 daily update for postcode '+str(postcode)+' from GreySpots:</p>'
            body5 = '<ul><li>Total number of active cases: '+str(active)+'</li>'\
                    '<li>Total number of new cases since yesterday: '+str(new)+'</li>'
            body6 = '<p>Above information is updated on '+str(file_processed_date1)+' by GreySpots.</p>'
            mail += header + title + body3 + body4 + body5
    except:
        print("Error: unable to fetch data from table2")
    # 关闭数据库连接
    db.close()

    """
    select info from table EXPOSURE_SITE_TABLE
    """
    db = pymysql.connect(host='137.184.0.8', user='dba', password='dba@te20TechHumans', database='greyspots', port=3306)
     
    # 使用cursor()方法获取操作游标 
    cursor = db.cursor()
    body = ""

    # SQL 查询语句
    #sql = "SELECT * FROM EXPOSURE_SITE_TABLE where Site_postcode = '%s' and added_date = '%s'" % (postcode_list[i], today_date1)
    sql = "SELECT * FROM EXPOSURE_SITE_TABLE where Site_postcode = '%s'" % (postcode_list[i])
    print(sql)
    try:
        # 执行SQL语句
        cursor.execute(sql)
        # 获取所有记录列表
        results = cursor.fetchall()
        #print("results.length(): " + results.length())
        # email table

        if len(results) != 0:
            # "<center><font size=4 color='#dd0000'><b>" + "Exposure Sites Amounts:" + str(len(results)) + "</b></font></center>" \
            th = '<li>Total number of exposure sites in your area: '+str(len(results))+'</li></ul>'\
                 '<p>Detail information about each exposure site can be found in the following table:</p>'\
                 "<br/><table style=' font-size: 14px;' border='1' cellspacing='0' cellpadding='1' bordercolor='#000000' width='20%' align='center' ></table>" \
                 "<br/><table bgcolor='#B0E0E6' style=' font-size: 14px;'border='1' cellspacing='0' cellpadding='0' bordercolor='#000000' width='95%' align='center' >" \
                 "<tr bgcolor='#F79646' align='left' >" \
                 "<th><center>Suburb</center></th>" \
                 "<th><center>Site title</center></th>" \
                 "<th><center>Street Address</center></th>" \
                 "<th><center>State</center></th>" \
                 "<th><center>Site postcode</center></th>" \
                 "<th><center>Exposure date</center></th>" \
                 "<th><center>Exposure time</center></th>" \
                 "<th><center>Notes</center></th>" \
                 "<th><center>Advice title</center></th>" \
                 "<th><center>Advice instruction</center></th>" \
                 "</tr>"

            tr = ""
            for row in results:
                Suburb = row[0]
                Site_title = row[1]
                Site_streetaddress = row[2]
                Site_state = row[3]
                Site_postcode = row[4]
                exposure_date = row[6]
                Exposure_time = row[7]
                Notes = row[8]
                Advice_title = row[12]
                Advice_instruction = row[13]

                td = ''
                td = td + "<td>" + str(row[0]) + "</td>"
                td = td + "<td>" + str(row[1]) + "</td>"
                td = td + "<td>" + str(row[2]) + "</td>"
                td = td + "<td>" + str(row[3]) + "</td>"
                td = td + "<td>" + str(row[4]) + "</td>"
                td = td + "<td>" + str(row[6]) + "</td>"
                td = td + "<td>" + str(row[7]) + "</td>"
                td = td + "<td>" + str(row[8]) + "</td>"
                td = td + "<td>" + str(row[12]) + "</td>"
                td = td + "<td>" + str(row[13]) + "</td>"
                tr = tr + "<tr>" + td + "</tr>"
            #tr = tr.encode('utf-8')
            body = str(tr)
            tail = '</table>'
            mail = mail + th + body + tail
        else:
            body = '<li>Total number of exposure sites in your area: '+str(len(results))+'</li></ul>'
            mail = mail + body
    except:
        print ("Error: unable to fetch data from table1")
     
    # 关闭数据库连接
    db.close()
    mail += body6 + '<p>Keep checking your surrounding environment and stay safe.</p>'
    mail += '<p>Please visit \"https://greyspots.tech\" for more Covid-19 information.</p>'
    mail += '<p>Unsubscribe from us: \"https://greyspots.tech/ExposureAlertUnsubscribe.php\"</p></body></html>'
    send_email(i, mail)





