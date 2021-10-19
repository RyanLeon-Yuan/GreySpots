Use greyspots; 

# Part - A ----- For the Melboure As per the Australian Post)  
# To extract the current covid Infromations: 
Select * from COVID_POSTCODE_TABLE where 
postcode IN (3032,3031,3052,3054,3010,3051,3053,3050,3003,3008,3000,3002,3207,3006,3004,3141);

# Current Active  Covid Cases in the Melbourne CBD. 
Select ifnull(sum(active),0) as "Current Active Cases in Melbourne CBD Area" 
from COVID_POSTCODE_TABLE where 
postcode IN (3032,3031,3052,3054,3010,3051,3053,3050,3003,3008,3000,3002,3207,3006,3004,3141);

# Reported new cases of Covid-19 in the Melbourne CBD. 
Select ifnull(sum(new),0) as "Reported New Cases in Melbourne CBD Area" 
from COVID_POSTCODE_TABLE where 
postcode IN (3032,3031,3052,3054,3010,3051,3053,3050,3003,3008,3000,3002,3207,3006,3004,3141);

# Reported new cases of Covid-19 in the Melbourne CBD. 
Select ifnull(sum(cases),0) as "Reported Total Cases in Melbourne CBD Area" 
from COVID_POSTCODE_TABLE where 
postcode IN (3032,3031,3052,3054,3010,3051,3053,3050,3003,3008,3000,3002,3207,3006,3004,3141);

# Date of the information, this will be used to display the date when the information is updated. 
Select distinct(DATE_FORMAT(data_date, '%m/%d/%Y')) as " Date of Information"
from COVID_POSTCODE_TABLE limit 1 ; 

# Total Active Exposure Sites in the Melbourne CBD Areas. 
Select ifnull(count(*), 0) from EXPOSURE_SITE_TABLE
where Site_postcode IN (3032,3031,3052,3054,3010,3051,3053,3050,3003,3008,3000,3002,3207,3006,3004,3141); 



# Part - B Rest of Victoria

# Current Active  Covid Cases in the Rest of Victoria. 
Select ifnull(sum(active),0) as "Current Active for Rest of Victoria" 
from COVID_POSTCODE_TABLE where 
postcode Not IN (3032,3031,3052,3054,3010,3051,3053,3050,3003,3008,3000,3002,3207,3006,3004,3141);

# Reported new cases of Covid-19 in the Rest of Victoria. 
Select ifnull(sum(new),0) as "Reported New Cases in Rest of Victoria" 
from COVID_POSTCODE_TABLE where 
postcode Not IN (3032,3031,3052,3054,3010,3051,3053,3050,3003,3008,3000,3002,3207,3006,3004,3141);

# Reported new cases of Covid-19 in the Rest of Victoria. 
Select ifnull(sum(cases),0) as "Reported Total Cases in Rest of Victoria" 
from COVID_POSTCODE_TABLE where 
postcode Not IN (3032,3031,3052,3054,3010,3051,3053,3050,3003,3008,3000,3002,3207,3006,3004,3141);

# Date of the information, this will be used to display the date when the information is updated. 
Select distinct(DATE_FORMAT(data_date, '%m/%d/%Y')) as " Date of Information"
from COVID_POSTCODE_TABLE limit 1 ; 

# Total Active Exposure Sites in the Rest of Victoria. 
Select ifnull(count(*), 0) from EXPOSURE_SITE_TABLE
where Site_postcode Not IN (3032,3031,3052,3054,3010,3051,3053,3050,3003,3008,3000,3002,3207,3006,3004,3141); 




