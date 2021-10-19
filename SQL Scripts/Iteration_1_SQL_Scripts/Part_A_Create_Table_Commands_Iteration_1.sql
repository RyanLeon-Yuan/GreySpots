# This SQl file contains all the create tables commands as per the ER Diagram for the Greyspots Database.
# This is the part a of the create commands, this part covers creating tables from the open data sources. 

# Using the greyspots database
 use greyspots;
 
# Creating table command for the Exposure Sites Open Data ( all the columns are as per the open data)
# Link to the Opbe Data Source: https://discover.data.vic.gov.au/dataset/all-victorian-sars-cov-2-covid-19-current-exposure-sites
CREATE TABLE IF NOT EXISTS EXPOSURE_SITE_TABLE (
    `Suburb` VARCHAR(20) CHARACTER SET utf8,
    `Site_title` VARCHAR(200) CHARACTER SET utf8,
    `Site_streetaddress` VARCHAR(100) CHARACTER SET utf8,
    `Site_state` VARCHAR(10) CHARACTER SET utf8,
    `Site_postcode` INT,
    `Exposure_date_dtm` VARCHAR(20),
    `Exposure_date` VARCHAR(20),
    `Exposure_time` VARCHAR(20) CHARACTER SET utf8,
    `Notes` VARCHAR(170) CHARACTER SET utf8,
    `Added_date_dtm`VARCHAR(20),
    `Added_date` VARCHAR(20),
    `Added_time` VARCHAR(10) CHARACTER SET utf8,
    `Advice_title` VARCHAR(100) CHARACTER SET utf8,
    `Advice_instruction` VARCHAR(250) CHARACTER SET utf8,
    `Exposure_time_start_24` VARCHAR(10) CHARACTER SET utf8,
    `Exposure_time_end_24` VARCHAR(20) CHARACTER SET utf8
);

# Create table command for the Covid-19 postcode based open data from open data platforms. 
# Link to the Open Data Source :: https://data.gov.au/dataset/ds-vic-256e6c36-bf38-45fb-8a4d-3536bd5a5fc3/details?q=
CREATE TABLE IF NOT EXISTS COVID_POSTCODE_TABLE (
    `postcode` INT,
    `population` INT,
    `active` INT,
    `cases` INT,
    `rate` NUMERIC(4, 1),
    `new` INT,
    `band` INT,
    `data_date` VARCHAR(20),
    `file_processed_date` VARCHAR(20)
);


# Create table command for the Covid-19 Vaccinations in Victoria from the open data platforms.  
# Link to the Open Data Source: https://data.gov.au/dataset/ds-vic-01bd667c-e44d-4b9e-91c2-d707dc1a5bd2/details?q=vaccine%20centers
CREATE TABLE IF NOT EXISTS COVID_VACCINATION_CENTER_DATA (
    `id` INT,
    `clinicId` VARCHAR(5) CHARACTER SET utf8,
    `shortName` VARCHAR(60) CHARACTER SET utf8,
    `location` VARCHAR(100) CHARACTER SET utf8,
    `address` VARCHAR(100) CHARACTER SET utf8,
    `suburb` VARCHAR(20) CHARACTER SET utf8,
    `addressFull` VARCHAR(100) CHARACTER SET utf8,
    `directions` VARCHAR(500) CHARACTER SET utf8,
    `lat` NUMERIC(10, 8),
    `lng` NUMERIC(10, 7),
    `lastUpdated` VARCHAR(20),
    `clinicStatus` VARCHAR(4) CHARACTER SET utf8,
    `hours` VARCHAR(200) CHARACTER SET utf8,
    `waitPeriod` INT,
    `waitPeriodDisp` VARCHAR(100) CHARACTER SET utf8,
    `shortNameClean` VARCHAR(100) CHARACTER SET utf8,
    `Accessible_Parking` VARCHAR(10) CHARACTER SET utf8,
    `Accessible_Toilets` VARCHAR(10) CHARACTER SET utf8,
    `Accessible_Mobility` VARCHAR(10) CHARACTER SET utf8,
    `Accessible_Auslan_EasyEnglish` VARCHAR(50) CHARACTER SET utf8,
    `Accessible_Assistance_Animals` VARCHAR(10) CHARACTER SET utf8,
    `Accessible_TIS_Available` VARCHAR(10) CHARACTER SET utf8,
    `Translated_Material` VARCHAR(10) CHARACTER SET utf8,
    `opening_hours` VARCHAR(250) CHARACTER SET utf8,
    `opening_hours_details` VARCHAR(100) CHARACTER SET utf8,
    `walk_in_hours_details` VARCHAR(100) CHARACTER SET utf8,
    `bookingsTable` VARCHAR(50) CHARACTER SET utf8,
    `walkinsTable` VARCHAR(50) CHARACTER SET utf8,
    `waitTimeYn` VARCHAR(20) CHARACTER SET utf8
);

# Create table command for the Covid-19 testing Centers in Victoria from the open data platforms
# Link to the Open Data Source :: https://data.gov.au/dataset/ds-vic-256e6c36-bf38-45fb-8a4d-3536bd5a5fc3/details?q= 
CREATE TABLE IF NOT EXISTS COVID_TESTING_CENTERS (
    `Site_Name` VARCHAR(100) CHARACTER SET utf8,
    `Facility` VARCHAR(50) CHARACTER SET utf8,
    `Website` VARCHAR(200) CHARACTER SET utf8,
    `Phone` VARCHAR(100) CHARACTER SET utf8,
    `Site_Facilities` VARCHAR(100) CHARACTER SET utf8,
    `Service_Availability` VARCHAR(400) CHARACTER SET utf8,
    `Address` VARCHAR(100) CHARACTER SET utf8,
    `Suburb` VARCHAR(20) CHARACTER SET utf8,
    `State` VARCHAR(10) CHARACTER SET utf8,
    `Postcode` INT,
    `LGA` VARCHAR(60) CHARACTER SET utf8,
    `delaytext` VARCHAR(50) CHARACTER SET utf8,
    `Requirements` VARCHAR(50) CHARACTER SET utf8,
    `Symptomatic_testing_only` VARCHAR(10) CHARACTER SET utf8,
    `Directions` VARCHAR(20) CHARACTER SET utf8,
    `TestTracker` VARCHAR(10) CHARACTER SET utf8,
    `AgeLimit` VARCHAR(10) CHARACTER SET utf8,
    `AddressOther` VARCHAR(400) CHARACTER SET utf8,
    `ServiceFormat` VARCHAR(50) CHARACTER SET utf8,
    `Column_20` VARCHAR(13) CHARACTER SET utf8
);



