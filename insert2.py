#!/usr/bin/python
# -*- coding: utf-8 -*-

from urllib import request
import json
import pymysql
import datetime
import time

# 打开数据库连接
db = pymysql.connect(host='137.184.0.8', user='dba', password='dba@te20TechHumans', database='greyspots', port=3306)

# 使用 cursor() 方法创建一个游标对象 cursor
cursor = db.cursor()

today_date = time.strftime("%d/%m/%Y", time.localtime())
flag = 0
url = '/api/3/action/datastore_search?resource_id=e3c72a49-6752-4158-82e6-116bea8f55c8'
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
sql1 = "delete from COVID_POSTCODE_TABLE"
cursor.execute(sql1)

for j in range(api_pages):

    fileobj = request.urlopen(link + url)
    data = json.loads(fileobj.read())
    records_length = len(data['result']['records'])

    print("Api page number: ", j)
    print("Records length: ", records_length)

    for i in range(records_length):
        Postcode = data['result']['records'][i]['postcode']
        Population = data['result']['records'][i]['population']
        Active = data['result']['records'][i]['active']
        Cases = data['result']['records'][i]['cases']
        Rate = data['result']['records'][i]['rate']
        New = data['result']['records'][i]['new']
        Band = data['result']['records'][i]['band']
        Data_date = data['result']['records'][i]['data_date']
        File_processed_date = data['result']['records'][i]['file_processed_date']

        if Population is None:
            Population = '0'

        covert_Data_date = datetime.datetime.strptime(Data_date, '%d/%m/%Y')
        covert_File_processed_date = datetime.datetime.strptime(File_processed_date, '%d/%m/%Y')

        # SQL 插入语句
        
        sql2 = "insert into COVID_POSTCODE_TABLE(postcode, population, active, \
                    cases, rate, new, band, data_date, file_processed_date) \
                    values('%s','%s','%s','%s','%s','%s','%s','%s','%s')" % \
              (Postcode, Population, Active, Cases, Rate, New, Band,
               covert_Data_date, covert_File_processed_date)

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
            print("id:", data['result']['records'][i]['_id'])
            print(sql2)
            print("Bad insert")

    url = data['result']['_links']['next']

# 关闭数据库连接
db.close()
