const express = require("express");
const mysql = require('mysql');

const PORT = 8888;

const app = express();
app.use(express.json())

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'datingapp'
});

app.get("/test", (req, res) => {
    res.json({ message: "Test Request" });
});
  



app.get('/match', (req, res) => {
  const { username } = req.query;

  connection.query('SELECT * FROM DateUsers ORDER BY RAND() LIMIT 1', (error, results) => {
    if (error) {
      return res.send(error);
    }
    res.send(results[0]);
  });
});

app.post('/users', (req, res) => {
  const { username, password } = req.body;

  connection.query('INSERT INTO Users (userName, userPassword) VALUES (?, ?)', [username, password], (error) => {
    if (error) {
      return res.send(error);
    }
    res.send({ status: 'success' });
  });
});

app.post('/auth', (req, res) => {
  const { username, password } = req.body;

  connection.query('SELECT * FROM Users WHERE userName = ? AND userPassword = ?', [username, password], (error, results) => {
    if (error) {
      return res.send(error);
    }
    if (results.length === 0) {
      return res.sendStatus(400);
    }
    res.send({ status: 'success' });
  });
});

app.listen(PORT, () => {
  console.log(`Server listening on ${PORT}`);
});