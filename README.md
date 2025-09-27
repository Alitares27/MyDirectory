# MyDirectory

This project is an Employee Directory developed with PHP and MySQL.
The main objective is to build a web application that allows you to manage employees and departments, integrating with a relational database system.

With this application, we can:

- Add new employees
- Edit existing employee information
- Delete employees
- View employee information along with their departments and positions in an interactive table

This software connects to a MySQL relational database, and all operations (CRUD: Create, Read, Update, Delete) are handled through secure SQL queries with Prepared Statements.

# Relational Database

The database was designed in **MySQL** and follows a relational model.

Main tables:

- **departments**

  - `department_id` (Primary Key)
  - `department_name`
- **positions**

  - `position_id` (Primary Key)
  - `position_name`
- **employees**

  - `employee_id` (Primary Key)
  - `first_name`
  - `last_name`
  - `email`
  - `phone`
  - `department_id` (Foreign Key → departments.department_id)
  - `position_id` (Foreign Key → positions.position_id)

# Development Environment

- **Local Server**: Apache (XAMPP)
- **Language**: PHP 8
- **Database**: MySQL
- **Frontend**: HTML5, CSS3
- **IDE/Editor**: VS Code
- **Version Control**: Git and GitHub

# Useful Websites

* [PHP Manual](https://www.php.net/manual/en/)

- [W3Schools PHP &amp; MySQL](https://www.w3schools.com/php/php_mysql_intro.asp)
