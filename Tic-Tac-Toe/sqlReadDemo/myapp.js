var express = required('express');
var app = express ();

app.get('/', function (req, res) {
    res.send("Hello World");
})

app.listen(process.env.por || 3000);
console.log('Running at Port 3000');