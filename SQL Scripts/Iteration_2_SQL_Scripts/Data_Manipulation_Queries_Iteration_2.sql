# This SQl Script is part of the iteration 2 of the project Greyspots. 
# This SQL commands are to be used for the data manipulation 

# This query is to delete all the exposure sites with the null values of postcode. 
# Since these areas are the public transport areas and cannot be mapped into a map. 
# Such records are delated from the table. 
delete from greyspots.POI_Table where postcode IS NULL and category = 'Exposure Site';

# Selecting the data to verify the delete. 
Select * from greyspots.POI_Table;

# This command is used for the MQL Workbench, to set the update to 0. 
# This is requuired to perform data manipulation as ny default MQL Workbench doesnnot allow it 
SET SQL_SAFE_UPDATES = 0;
