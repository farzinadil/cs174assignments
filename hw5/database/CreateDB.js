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

 connection.query("CREATE TABLE `DateUsers`.`Users` ( `username` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `normalvector` VARCHAR(255) NOT NULL , `response1` VARCHAR(255) NOT NULL , `response2` VARCHAR(255) NOT NULL , `response3` VARCHAR(255) NOT NULL , `response4` VARCHAR(255) NOT NULL , `response5` VARCHAR(255) NOT NULL , `response6` VARCHAR(255) NOT NULL , `response7` VARCHAR(255) NOT NULL , `response8` VARCHAR(255) NOT NULL , `response9` VARCHAR(255) NOT NULL , `response10` VARCHAR NOT NULL );",
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




