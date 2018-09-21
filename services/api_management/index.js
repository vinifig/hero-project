const app = require('express')();
const mongoose = require('mongoose');
app.get('/', (req, res)=> res.end('oi'));
app.get('/mongo', (req, res) => {
    mongoose.connect(process.env.MONGO_SERVER)
        .then((conn)=>{
            res.json(conn);
            console.log('connected')
        })
        .catch((e) => {
            res.json(e.toString());
            console.log(e);
        })
})


app.listen(process.env.PORT);