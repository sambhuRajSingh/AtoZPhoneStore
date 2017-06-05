#Requirement

Assuming the attached data.csv file was imported into a MySQL database, either use bespoke code or the PHP framework of your choice to parse the data and present an aggregated and sortable list of phones by make and model. Clicking a phone should display details of the phone along with any tariffs available.


#Framework Used: Laravel


#Installation: 

git clone https://github.com/sambhuRajSingh/AtoZPhoneStore.git

Create a Database: AtoZPhoneStore



Update .env file:

DB_CONNECTION=mysql

DB_HOST=localhost

DB_PORT=3306

DB_DATABASE=AtoZPhoneStore

DB_USERNAME=yourUsername

DB_PASSWORD=yourPassword



php artisan migrate

php artisan db:seed

chmod 777 -R storage

php artisan cache:clear

php artisan config:cache

php artisan serve