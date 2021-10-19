# This SQl is to extract the data from the greyspots_client database. 


# To unsubscribe a user from the exposure alert, following query is required to be executed:
# The reason can be the exact reason as provided by the users and email is the email which user have provided. 
# Before we unsubscirbe a user, we check that the user is present in our data base as well. 
INSERT INTO greyspots_clients.GS_SUBSCRIBERS_CANCEL VALUES ('ylia0047@student.monash.edu', 'Test'); 


# To send the email alert to all the subscribers, we wpuld use the follwoing queries
Select name, postcode, email_id from greyspots_clients.GS_SUBSCRIBERS where email_id Not in ( Select email_id from greyspots_clients.GS_SUBSCRIBERS_CANCEL) ; 

# Just the select queries to check the data. 
Select * from greyspots_clients.GS_SUBSCRIBERS ;
Select * from greyspots_clients.GS_SUBSCRIBERS_CANCEL;


# Please note, the subscribers id will change as per the choosen subsrcibers for sending the email. 
# Extracting Exposure Sites Details for the subscribers prefered postcode. 
Select * from greyspots.EXPOSURE_SITE_TABLE where Site_postcode = ( Select postcode from greyspots_clients.GS_SUBSCRIBERS where Subscriber_id = 2);

# Extracting the Vaccination Centres Details for the subscribers for the preferred postcode. 
Select * from greyspots.COVID_VACCINATION_CENTER_DATA suburb
where suburb in ( Select suburb from greyspots.EXPOSURE_SITE_TABLE 
where Site_postcode = ( Select postcode from greyspots_clients.GS_SUBSCRIBERS where Subscriber_id = 2));


# Extrating the Testing Center Details for the subscribers for the preferred postcode. 
Select * from greyspots.COVID_TESTING_CENTERS 
where Postcode = ( Select postcode from greyspots_clients.GS_SUBSCRIBERS where Subscriber_id = 2);


# Extracting the current covid situation and the cases on the subsribers preferred postcode. 
Select * from greyspots.COVID_POSTCODE_TABLE 
where postcode = ( Select postcode from greyspots_clients.GS_SUBSCRIBERS where Subscriber_id = 2);

