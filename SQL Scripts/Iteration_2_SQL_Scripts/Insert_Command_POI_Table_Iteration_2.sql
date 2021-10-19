 # This SQl Script belong to the second iteration of the project greyspots. 
 # This SQl Sciprt is used to insert data into Places of Interest table from all the different sources. 
 
 Insert into POI_Table ( 
 Select site_postcode, null, null, suburb, 'Exposure Site' as category, 
 site_title, site_StreetAddress, advice_instruction 
 from COVID_EXPOSURE_SITE_TABLE );
 
 
 Insert into POI_Table ( 
 Select Postcode, null, null, Suburb, 'Testing Centers' as category, 
 Site_Name, Address, AddressOther from COVID_TESTING_CENTERS ); 


 Insert into POI_Table ( 
 Select null, lat, lng, suburb, 'Vaccination Centers' as category, 
 shortName, address, directions from COVID_VACCINATION_CENTER_DATA ); 

