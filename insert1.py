#!/usr/bin/python
# -*- coding: utf-8 -*-

from urllib import request
import json
import pymysql
import datetime
import time
from pymysql.converters import escape_string

# 打开数据库连接
db = pymysql.connect(host='137.184.0.8', user='dba', password='dba@te20TechHumans', database='greyspots', port=3306)

# 使用 cursor() 方法创建一个游标对象 cursor
cursor = db.cursor()

today_date = time.strftime("%d/%m/%Y", time.localtime())
flag = 0
url = '/api/3/action/datastore_search?resource_id=afb52611-6061-4a2b-9110-74c920bede77'
link = 'https://discover.data.vic.gov.au'

fileobj = request.urlopen(link + url)
# print(fileobj.read())
# 将 JSON 对象转换为 Python 字典
data = json.loads(fileobj.read())
data_total = data['result']['total']
api_pages = (data_total // 100) + 1

print("Total: ", data_total)
print("API pages: ", api_pages)

# delete tables contents first
sql1 = "delete from EXPOSURE_SITE_TABLE"
cursor.execute(sql1)

for j in range(api_pages):

    fileobj = request.urlopen(link + url)
    data = json.loads(fileobj.read())
    records_length = len(data['result']['records'])

    print("Api page number: ", j)
    print("Records length: ", records_length)

    for i in range(records_length):
        Suburb = data['result']['records'][i]['Suburb']
        Site_title = data['result']['records'][i]['Site_title']
        Site_streetaddress = data['result']['records'][i]['Site_streetaddress']
        Site_state = data['result']['records'][i]['Site_state']
        Site_postcode = data['result']['records'][i]['Site_postcode']
        Exposure_date_dtm = data['result']['records'][i]['Exposure_date_dtm']
        Exposure_date = data['result']['records'][i]['Exposure_date']
        Exposure_time = data['result']['records'][i]['Exposure_time']
        Notes = data['result']['records'][i]['Notes']
        Added_date_dtm = data['result']['records'][i]['Added_date_dtm']
        Added_date = data['result']['records'][i]['Added_date']
        Added_time = data['result']['records'][i]['Added_time']
        Advice_title = data['result']['records'][i]['Advice_title']
        Advice_instruction = data['result']['records'][i]['Advice_instruction']
        Exposure_time_start_24 = data['result']['records'][i]['Exposure_time_start_24']
        Exposure_time_end_24 = data['result']['records'][i]['Exposure_time_end_24']

        if Site_streetaddress is None:
            Site_streetaddress = 'N/A'

        if Site_postcode is None:
            Site_postcode = 0000

        covert_Exposure_date_dtm = datetime.datetime.strptime(Exposure_date_dtm, '%Y-%m-%d')
        #print("Added_date_dtm: ", covert_Added_date_dtm)
        covert_Exposure_date = datetime.datetime.strptime(Exposure_date, '%d/%m/%Y')
        #print("Exposure_date: ", covert_Exposure_date)
        covert_Added_date_dtm = datetime.datetime.strptime(Added_date_dtm, '%Y-%m-%d')
        #print("Added_date_dtm: ", covert_Added_date_dtm)
        covert_Added_date = datetime.datetime.strptime(Added_date, '%d/%m/%Y')
        #print("Added_date: ", covert_Added_date)

        #    if Added_date != today_date:
        #       flag = 1
        #      print("stop")
        #break

        # SQL 插入语句
        sql2 = "insert into EXPOSURE_SITE_TABLE(Suburb,Site_title,Site_streetaddress, Site_state,Site_postcode,Exposure_date_dtm,Exposure_date,Exposure_time, \
                       Notes,Added_date_dtm,Added_date,Added_time,Advice_title, \
                       Advice_instruction,Exposure_time_start_24,Exposure_time_end_24) \
                       values('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')" % \
              (Suburb, escape_string(Site_title), escape_string(Site_streetaddress), Site_state, Site_postcode, Exposure_date_dtm,
               covert_Exposure_date,
               Exposure_time, Notes, covert_Added_date_dtm, covert_Added_date, Added_time, Advice_title,
               Advice_instruction,
               Exposure_time_start_24, Exposure_time_end_24)

        try:
            # 执行sql语句
            cursor.execute(sql2)
            # 提交到数据库执行
            db.commit()
            print("id:", data['result']['records'][i]['_id'])
            print("Good insert")
        except:
            # 如果发生错误则回滚
            db.rollback()
            print(sql2)
            print("Bad insert")

   # if flag == 0:
    url = data['result']['_links']['next']

# 关闭数据库连接
db.close()
