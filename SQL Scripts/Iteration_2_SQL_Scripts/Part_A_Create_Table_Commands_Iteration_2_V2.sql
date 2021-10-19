# This SQL Script is the part of the second iteration of the project Greyspots. 
# This SQl script contains the Part A Create Table Commands for merging the different data sources. 


use greyspots; 

# Creating the Places of Interest Table. 
# This table is use to categories the data into Exposure Site, Vaccination Centre and Testing Centres.  
 Create table greyspots.POI_Table (
 postcode int, 
 latitude NUMERIC(10, 8),
 longitude NUMERIC(11, 8),
 suburb varchar(30), 
 category varchar(30), 
 site_name varchar(250),
 address varchar (300),
 instructions varchar(500)
 );
 
 
