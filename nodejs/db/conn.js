const mysql = require('mysql')

const dbConnection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'crud'
})

dbConnection.connect()

module.exports = dbConnection;