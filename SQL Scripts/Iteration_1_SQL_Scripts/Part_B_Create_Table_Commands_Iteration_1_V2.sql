# This SQl file contains all the create tables commands as per the ER Diagram for the Greyspots Database.
# This is the part B of the create commands, this part is to create table from the existing tables. 
# Please note that, execute these commands only after insertion is complete. 


# Creating table command for the Exxposure Sites Open Data ( all the columns are as per our system requirements)
Create table COVID_EXPOSURE_SITE_TABLE as
Select suburb ,site_title,site_StreetAddress,site_state,site_postcode,exposure_date,exposure_time,notes,
added_date,added_time,advice_title,advice_instruction,exposure_time_start_24,exposure_time_end_24 
from EXPOSURE_SITE_TABLE; 
 
ALTER TABLE EXPOSURE_SITE_TABLE DROP COLUMN Column_17;
ALTER TABLE EXPOSURE_SITE_TABLE DROP COLUMN Column_18;

# Additional Data Modelling SQl COmmands, 
ALTER TABLE COVID_EXPOSURE_SITE_TABLE CHANGE exposure_date exposure_date DATE;
ALTER TABLE COVID_EXPOSURE_SITE_TABLE CHANGE added_date added_date DATE;
ALTER TABLE COVID_TESTING_CENTERS DROP COLUMN Column_20;

ALTER TABLE EXPOSURE_SITE_TABLE CHANGE exposure_date exposure_date DATE;
ALTER TABLE EXPOSURE_SITE_TABLE CHANGE added_date added_date DATE;



use greyspots;

Select * from GS_SUBSCRIBERS;