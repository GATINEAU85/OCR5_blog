# Adrien GATINEAU

Hello, I'm Adrien GATINEAU. I decided to create my blog to share news on geomatics and GIS development. You will find attached my blog with the possibility to comment on the content if you wish.
[My Blog ;-)](http://51.15.234.228/projet5/public/index.php?action=home)

## Method
This project was maintened and versionned by GitHub
[GitHub : GATINEAU85 / BlogOCR](https://github.com/GATINEAU85/OCR5_blog)

Differentes issues are made. They was been gradually resolved during the developpement and the creation of pull request. 

## Project

This project took place in continuity with my work-study training in web development at openclassrooms.

### Use case

To show us the differents use case that can be use by the actor of the project. 

#### Visit use case

![Use case diagram on the visit use package](http://51.15.234.228/projet5/public/files/DiagramUseCaseVisit.png)

#### Administration use case

![Use case diagram on the administration use package](http://51.15.234.228/projet5/public/files/DiagramUseCaseAdministration.png)

### Diagram Class

![Class diagram](http://51.15.234.228/projet5/public/files/DiagramClass.png)

### Diagram Sequence

#### Visit sequence

![Sequence diagram on the visit use package](http://51.15.234.228/projet5/public/files/DiagramSequenceVisit.png)

#### Administration sequence

![Sequence diagram on the administration use package](http://51.15.234.228/projet5/public/files/DiagramSequenceAdministration.png)

## Install

1. Run command : `git https://github.com/GATINEAU85/OCR5_blog.git`
2. Run command : `cd OCR5_blog`
3. Run command in bash `composer install`

## More

1. Config dev environment "App/config/dev.php". Thanks to this file, you can configure your database connection.

    const DB_HOST = 'mysql:host=localhost;dbname=projet5blog;charset=utf8';
    const DB_USERNAME = 'root';
    const DB_PWD = '';
    const CHARSET = 'utf8';
    const HOST = 'localhost';
    const DB_NAME = 'blog';
    
2. Import database.sql in your database (App/sql/database.sql)

It's important to import this model of database to have a well function site.

## Code Analyse

The last codacy analyse is [here](https://app.codacy.com/manual/GATINEAU85/OCR5_blog/dashboard) . I receved a B appreciation.
