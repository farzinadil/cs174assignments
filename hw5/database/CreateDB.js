var mysql = require('mysql2')
// set-up and connect
var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : 'root',
  // could also add a database property
});
let connect = connection.connect();

connection.query('CREATE DATABASE DatingUsers',
            (error, results, fields) => {
                if (error) {
                    throw error;
                } else {
                    console.log("Database created successfully.\n")
                }
            }
);

connection.query('USE DatingUsers', 
        (error, results, fields) => {
            if (error) {
                throw error;
            } 
        }
 );

 connection.query("CREATE TABLE `DateUsers`.`Users` ( `userName` VARCHAR(255) NOT NULL , `userPassword` VARCHAR(255) NOT NULL , `emailAddress` VARCHAR(255) NOT NULL , `quizResults` INT NOT NULL )",
        (error, results, fields) => {
            if (error) {
                throw error;
            } else {
                console.log("Created DateUsers Table\n");
            }
        }
 );
connection.end(() => err);
console.log("Created MySQL DB\n");




