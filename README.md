## Score App

sample app using laravel and vue.js

## Steps to run
Please follow the steps below :

- git clone https://github.com/rijovt/scoreapp.git

- composer install

- Save the .env.example file inside the todoapp folder as .env

- Create a database and update the credentials as same in the .env file.

- Run the following commands from the terminal todoapp directory :

    php artisan migrate
    
    php artisan db:seed

    php artisan key:generate

    php artisan serve

Laravel development server started: http://127.0.0.1:8000

You can access the app via URL generated.

As initially there are no entries in the database, you can add it using the InputBox. After adding the Todos, you can sort it accordingly. The data will be automatically saved to the database as per the sorted order.


## Developed by Rijo Thomas
