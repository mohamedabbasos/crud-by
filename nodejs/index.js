const express     = require('express');
const bodyParser  = require('body-parser');
const nocache     = require('nocache')

const item = require('./models/item');

const app = express();

app.use(nocache()); // to stop caching
app.set('view engine', 'pug');
app.use(bodyParser.json());       // to support JSON-encoded bodies
app.use(bodyParser.urlencoded({     // to support URL-encoded bodies
    extended: true
}));

const publicPath = `${__dirname}/public/`;

app.use(express.static(publicPath));


app.get('/create', (req, res) => res.render(`${publicPath}create.pug`, {name: "Ali"}))

app.post('/insert', (req, res) =>  {
    item.create(req.body).then(() => res.redirect('/'))
})// end insert

app.get('/', (req, res) => {
    item.findAll().then(items => {
        res.render(`${publicPath}index.pug`, {items})
    });
})


app.get('/edit/:id', (req, res) => {
    item.find(req.params.id).then(item => {
        res.render(`${publicPath}edit.pug`, {item})
    });
})

app.get('/profile/:id', (req, res) => {
    item.find(req.params.id).then(item => {
        res.render(`${publicPath}profile.pug`, {item})
    });
})

app.post('/update/:id', (req, res) =>  {
    item.update(req.params.id, req.body) // {"name":"ds","details":"dsaaa"}
        .then(() => res.redirect('/'))
})

app.get('/delete/:id', (req, res) => {
    item.delete(req.params.id)
        .then(() => res.redirect('/'));
})

app.listen(3000, () => console.log('Example app listening on port 3000!'))