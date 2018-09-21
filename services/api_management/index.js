const app = require('express')();

app.get('/', (req, res)=> res.end('oi'));

app.listen(process.env.PORT);