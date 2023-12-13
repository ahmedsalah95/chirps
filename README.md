

## About Chirper

Chirper is  a simple app that let you add write your thoughts and share it with other people


## Introduction 

This repository contains a Laravel application that can be easily set up and run using Laravel Sail. Sail is a lightweight command-line interface for interacting with Laravel's default Docker development environment.

## Prerequisites

Before getting started, make sure you have the following installed on your machine:

 - Docker
 - Docker Compose

## Installation

  - Clone this repository to your local machine:

    git clone https://github.com/ahmedsalah95/chirps.git

  - Navigate to the project directory:

	cd chirps

  - Copy the .env.example file and rename it to .env:

	cp .env.example .env

  - Open the .env file and configure your database settings and other environment variables as needed.


  - Run the following command to start the application using Laravel Sail (docker):

	./vendor/bin/sail up -d

  - To stop the application use:

    ./vendor/bin/sail down	

## configuring laravel sail alias:
	- instead of repeatedly typing vendor/bin/sail to execute Sail commands, you may wish to configure a shell alias that allows you to execute Sail's commands more easily:    

	alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'


## Running Artisan Commands
  
   - to run artisan commands and all other types of commands needed you do it like this:

      ./vendor/bin/sail php artisan migrate

      ./vendor/bin/sail npm install

      ./vendor/bin/sail composer install

## running Frontend environment 

	- you must run a command in order to start dev:

	   ./vendor/bin/sail  npm run dev   

## build the project
	
	- to build the project you have to run this command:

	 .vendor/bin/sail npm run build


## Testing
   
   - To run testcases you have to run the following command:

   		./vendor/bin/sail test
	


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
