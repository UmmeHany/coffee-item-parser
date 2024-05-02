# coffee-item-parser
A Symfony Demo Project

Description:
This program imports coffee item datasets into sqlite database.

Requirements :

1. symfony 5.4

   Installation:
    1. curl -sS https://get.symfony.com/cli/installer | bash
    2. sudo mv ~/.symfony5/bin/symfony /usr/local/bin/symfony

2. sqlite database driver

   Installation:
    1. sudo apt-get install sqlite3
    2. sudo apt-get install sqlitebrowser
    3. sudo apt-get install php7.4-sqlite3
   

3. composer 

   Installation:
    1. mkdir composer_install
    2. cd composer_install/
    3. php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" 
    4. php composer-setup.php 
    5. sudo mv composer.phar /usr/local/bin/composer

4. Installation of Parser:
    1. git clone https://github.com/UmmeHany/coffee-item-parser.git
    2. cd coffee-item-parser/
    3. composer install

5. Execution :
    
    1. symfony console readFile resources/feed.xml
    2. The database file is located in var directory. Use command sqlitebrowser to inspect the database.
    3. The database table name is items and the entity_id node value of xml is considered as primary key of items table having unique constraint.
    4. Errors are logged into dev.log file in var/log directory.
    5. Run command php bin/phpunit to execute the unit tests
    6. php bin/phpunit --filter ReadFileCommandTest to execute only ReadFileCommandTest test



    
 
