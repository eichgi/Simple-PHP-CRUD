# Simple-PHP-CRUD
This is an example of a Simple Crud made with PHP. The goal of this little project is to show how to use an API to handle
requests made by the user. It uses OOP to manage data between the API and the MySQL DB.

##Interfaces
This project was made using Bootstrap, and for handling events using jQuery. No JS Framework was implemented.
- Index: Where tables with data about users and courses are shown
- Registrar.php: Where you user can sign up a new user or a new course
- Inscribir.php Where you can sign in another user to a specific course (both of them previously created)
- Modificar.php Where you can update information related to users or courses
- And what about removing a user or a course? Well, over the main tables actions can be performed. One of them is to delete.

##API
Our API file only process requests send via POST, so if you want to make an action related with the DB you need to POST
the request. At least one parameter is necessary which must be named 'accion'. This parameter will be proccesed by a switch
statement. When the API file is executed it creates an instance of our API Class, once the case is found we will pass
our API instance the parametes needed to be executed through it's methods, which already must be received along the post request.

##PDO... with Fluent library
As you may know PDO is the right way to connect with a DB using PHP. If you don't, well perhaps it's time to you for knowing
what PDO is about. FluentPDO is a library for building queries which provides methods for all actions we need to perform, which are:
Selecting, Inserting, Updating and Deleting data. In this project you will look how to use it.

## Another specs
For sending data between client and server, jQuery's ajax is used.






















