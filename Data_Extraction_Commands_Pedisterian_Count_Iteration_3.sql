# This SQl Script belongs to the Iteration 2 of the project Greyspots. 
# These SQL Script will be used for the predictive feature of the project. 
# Data Extraction Queries from the Pedisterian Count.

use greyspots;
# Extracting the list of all the places for which the data is available. 
Select distinct(sensor_name) from greyspots.Pedisterian_count;

# Extracting the Average population ( Pedisterian Count) in the given place. Bourke Street Mall (South)
Select Round(AVG( hourly_counts)) as 'Average Pedisterian Count in a day' from greyspots.Pedisterian_count 
where sensor_name = 'Collins Place (South)';

# Extracting the Average population ( Pedisterian Count) in the given place on a given day of the week. 
Select Round(AVG( hourly_counts)) as 'Average Pedisterian Count of day in a week', day as 'Day of the Week' from greyspots.Pedisterian_count 
where sensor_name = 'Bourke Street Mall (South)'
group by day;

# Extarcting the top five  Rush hours in a day of the place. 
Select Round(AVG( hourly_counts)) as 'Average Pedisterian Count', 
time as 'Time of the Day having maximum Rush' 
from greyspots.Pedisterian_count 
where sensor_name = 'Bourke Street Mall (South)'
group by time 
order by Round(AVG( hourly_counts)) 
desc limit 5;


# Extracting the top three No Rush hours in a day of the place excluding night hours.  
Select Round(AVG( hourly_counts)) as 'Crowd Count', 
time as 'Time of the Day' 
from greyspots.Pedisterian_count 
where sensor_name = 'Bourke Street Mall (South)'
group by time 
having time >= 8 and time <=22
order by Round(AVG( hourly_counts)) 
asc limit 3;

