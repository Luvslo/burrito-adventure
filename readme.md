# _Burrito Quest_

#### _Final PHP Project at Epicodus, 3.10.2016_

### By _**Mollie Bootsma, Marika Allely, Jon Nardini, and Mary Warrington**_

## Description

_This web app is a text-based game! The user enters their name, then begins the adventure by waking up in bed, starving for a burrito. They can then navigate through the game, collected necessary items and passing obstacles on their way to getting a burrito (winning) or not (losing)._

## Setup/Installation Requirements

### Setup of databases

In terminal run the following commands to setup the database:

    apachectl start
    mysql.server start
    mysql -uroot -proot

1. _Fork and clone this repository from_ [gitHub](https://github.com/marywarrington/burrito-adventure.git).
2. Navigate to the root directory of the project in which ever CLI shell you are using and run the command: __composer install__.
3. Create a local server __in the /web directory__ within the project folder using the command: __php -S localhost:8000__ (assuming you are using a mac).
4. Open the directory http://localhost:8000 in any standard web browser.
5. Open http://localhost:8080/phpmyadmin and import ../burritos.sql.zip.

## Known Bugs

_There are no known bugs at this time. This app is not fully developed at this point and some functionality is either missing or not clear._

## Support and contact details

_If you have any questions, concerns, or feedback, please contact the authors through_ [gitHub](https://github.com/marywarrington/burrito-adventure.git).

## Technologies Used

_This web application was created using the_  [Silex micro-framework](http://silex.sensiolabs.org/)_, as well _[Twig](http://twig.sensiolabs.org/), _a template engine for php, and_ [mySQL](https://www.mysql.com/).

### License

MIT License.

Copyright (c) 2016 **_Mollie Bootsma, Marika Allely, Jon Nardini, and Mary Warrington_**
