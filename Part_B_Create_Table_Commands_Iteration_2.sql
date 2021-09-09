# This SQL Script is the part of the second iteration of the project Greyspots. 
# This SQl script contains the Part B Create Table Commands for the relevant tables as required for the project. 


use greyspots_clients;
# Creat table command
# drop table GS_SUBSCRIBERS;

# Creating the table for the subuscribers to exposure sites. 
CREATE TABLE GS_SUBSCRIBERS (
    Subscriber_id int NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    postcode int,
    email_id varchar(100),
    PRIMARY KEY (Subscriber_id)
);

# Creating the unsubscribers table. this will store the sbscribers if in case opted to cancel the subscription to exposure alert. 
CREATE TABLE GS_SUBSCRIBERS_CANCEL (
Subscriber_id int,
Reason Varchar(500),
PRIMARY KEY ( Subscriber_id), 
FOREIGN KEY (Subscriber_id) REFERENCES GS_SUBSCRIBERS(Subscriber_id)
);


Select * from GS_SUBSCRIBERS;




