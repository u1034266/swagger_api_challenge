# Description
Simple swagger.io API challenge.

# Technology(ies) used:
- Laravel 5.8
- VueJs
- Docker
- Swagger.io API 

# Pre-requisites
- Install `docker-ce` on your host machine

# Environment Setup and Configuration
Here are a few prelims you may need to do to get this up to speed.
## Docker up!
- Run `$ docker-compose up -d` while in the parent directory to bring the containers up
- Note: This may take a while as docker will be pulling in the respective images.
- Run `$ docker exec -it php sh` to enter the PHP container and do the following:
    - Option 1: Post docker up one-liner for env config:
    `$ apk --no-cache add make && make initialize && make install_db_deps && make install_npm && npm install`
    
    OR

    - Option 2: Run the commands above individually.
        - `sh` terminal doesn't have `make` so you will need to install that first:
        ```
            $ apk --no-cache add make
        ```
        - Run `$ make initialize` -- This will install Composer and spin up the Laravel app
        - Now use run the following definitions from the `Makefile`:
            - Install Database drivers: `$ make install_db_deps`
            - Install `npm`: `$ make install_npm` then run `$ npm install`
            - Reset `storage/` folder perms: `$ make reset_perms`
        - Run the database migrations:
        ```
            $ php artisan migrate
        ```
- Database connection issues when running `$ php artisan migrate`:
    - If using `PostgreSQL`: 
    Because PostgreSQL is quite qirky with docker, you might get 'connection refused' issues with PHP trying to call the database volume. In this case, do the following:
        - Stop all docker images: `$ docker stop php postgres nginx`
        - Clear the postgres volume data cache: `$ docker-compose rm -fv postgres`
        - Restart the containers: `$ docker-compose up -d`
        - Re-try `$ php artisan migrate` -- It should work fine now.
    - If using `MySQL`: (Especially MySQL v8.0+)
        - Log into your docker container: `$ docker exec -it mysql_database`
        - Connect to database as `root` and reset `root` password
        ```
            $ mysql -u root -p
            (enter root password from docker-compose.yml file)
        ```
        - Update USER credentials:
        ```
            mysql> ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root';
            mysql> ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'root';
            mysql> ALTER USER 'default'@'%' IDENTIFIED WITH mysql_native_password BY 'secret';
        ```
        - Update the `.env` with the following and save. (Nb. You may need to stop / start the `php` container to allow the new changes to take effect.):
        ```
            DB_USERNAME=root
            DB_PASSWORD=root
        ```
        - Re-try `$ php artisan migrate` -- It should work fine now.

        
# Notes:
- This is just a simple scaffolding microservices architecture style project with only one working endpoint
- Theres lots more to improve on so please feel free to clone, update and share the fun!

Enjoy!
    
    

