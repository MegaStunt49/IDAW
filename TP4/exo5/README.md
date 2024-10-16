# Site API
This is the API to access my users data base

## Endpoints :

### GET :

'/users.php' :  
        Retrieve the whole users table in the database, in the form of a JSON.

### POST :

'/users.php' + JSON { "login": "suzanne", "email": "suz@nne.com" } :
        Add a new user to the database.

### PUT :

'/users.php?id={id}' + JSON { "login": "suzanne", "email": "suz@nne.com" } :
        Modify a user in the database.

### DELETE :

'/users.php?id={id}' :
        Delete a user in the database.