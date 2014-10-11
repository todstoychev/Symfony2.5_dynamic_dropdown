This is a demonstration project based on Symfony 2.5. This project shows one of the ways to solve the problem with the dynamic forms in Symfony. This is my way to do it and I DO NOT SAY THAT THIS IS THE BEST WAY. This just works for me and I want to share my experiece.

# Intallation

Just as usual clone the project with

    git clone https://github.com/todstoychev/Symfony2.5_dynamic_dropdown 

Then run the:
    
    composer update

You will be guided through the Symfony installation. Enter the parameters for your database.

This project comes with DoctrineFixturesBundle and it contains some classes that puts some data in the database. The *nix users are in a good position. For those that use *nix you can run the `fixture.sh` file or put those commands in the console:
    
    app/console doctrine:database:drop --force
    app/console doctrine:database:create
    app/console doctrine:schema:update --force
    app/console doctrine:fixtures:load

This will cause the database to be dropped, created and filled with the necessary data.

You can test the project using the `project_directory/web/app_dev.php` or `project_directory/web/app.php`.