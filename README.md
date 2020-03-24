# OCMS

Ongeza Customers Mangement System allows you to do CRUD on customers and genders.

## Usage Guide

To use/install the application follow these steps:

- Make sure you are setup with MySQL, PHP, Apache i.e. you can have the XAMP installed on WINDOWS or MAC

- Ensure you have composer installed in your machine, guide to install can be found here: [Composer](https://getcomposer.org)

- Clone the repository to your `htdocs` for XAMP users, for advanced users just clone the repo anywhere on your system (make sure your `PHP is available globally` which you can check by opening your terminal/cmd and type `php --version`)

- change the diretory into the repo from the terminal/cmd that you used to clone the repo (folder name should be `ocms`)

- Do a composer install by running this command: `composer install` while you are inside the folder that `git clone` created for you

- Create a database called `ongeza_test` or any name that you prefer but if you choose to use your other `database name` make sure to change the name of the database inside `ocms\config.php`. Also, change your database credentials in this file by following what's already inside it.

- Dump the database SQL dump file to your newly created db using this command, for terminal fans `mysql -u (yourdatabase username) -p (databasename you created for ocms if followed default it should be ongeza_test) data/ongeza_test.sql`. Make sure you open your terminal/cmd while inside the `clone repo folder (ocms)`

## The fun part (seeing it in your browser)

For XAMP stack people you can visit like you visit your normal applications by writing this `localhost/ocms/index.php` and press `ENTER`.


### Recommended & Used in Development Approach
For terminal/cmd or advanced users you can boot up a server from your terminal that its `present working directory` is where the project is located by running `php -S localhost:8000`. Then, go to your browser and enter that url of `localhost:8000` and hooray!

## Contact for further assistance

If you require further assistance on setting up the project and running it, REACH OUT TO ME via the following ways:&nbsp;\
\
\
    - By Phone: +255-679-255293 \
\
    - By E-Mail: [ammwinchande@gmail.com](mailto:ammwinchande@gmail.com)
