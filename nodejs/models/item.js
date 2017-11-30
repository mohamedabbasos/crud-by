const conn = require('../db/conn');

const item = {
    create: (data) => {
        return new Promise((res, rej) => {
            conn.query('INSERT INTO items SET ?', data, function (error, results, fields) {
                if (error) throw error;
                
                res(Array.from(results));
            });
        })
    },
    find: (id) => {
        return new Promise((res, rej) => {
            conn.query('SELECT * FROM items WHERE id = ? ', id, function (error, results, fields) {
                if (error) throw error;
                res(Array.from(results)[0]);
            });
        })
    },
    findAll: () => {
        return new Promise((res, rej) => {
            conn.query('SELECT * FROM items', function (error, results, fields) {
                if (error) throw error;
                res(Array.from(results));
            });
        })
    },
    update: (id, data) => {
        return new Promise((res, rej) => {
            conn.query('UPDATE items SET ? WHERE id = ? ', [data, id], function (error, results, fields) {
                if (error) throw error;
                res(Array.from(results)[0]);
            });
        })
    },
    delete: (id) => {
        return new Promise((res, rej) => {
            conn.query('DELETE FROM items WHERE id = ? ', id, function (error, results, fields) {
                if (error) throw error;
                res(Array.from(results)[0]);
            });
        })
    }
}

module.exports = item;