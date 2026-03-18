const express = require("express")
const app = express()
const PORT = 3000;
const cors = require("cors");
app.use(cors())
const cars = [
    {
        id: 1,
        car_name: "Isuzu",
        car_type: "Rodeo",
        car_year: 2003,
        image: "https://robohash.org/1",
        hex_color: "#237701",
        damaged: true
    },
    {
        id: 2,
        car_name: "Honda",
        car_type: "Civic",
        car_year: 1986,
        image: "https://robohash.org/2",
        hex_color: "#f0ad4e",
        damaged: false
    },
    {
        id: 3,
        car_name: "Mercedes",
        car_type: "Benz",
        car_year: 1998,
        image: "https://robohash.org/3",
        hex_color: "#5bc0de",
        damaged: true
    }
];
const motorcycles = [
    {
        id: 1,
        bike_name: "Yamaha",
        bike_type: "MT-07",
        bike_year: 2022,
        image: "https://robohash.org/yamaha",
        engine_cc: 689,
        color: "Matowy szary"
    },
    {
        id: 2,
        bike_name: "Honda",
        bike_type: "CBR650R",
        bike_year: 2023,
        image: "https://robohash.org/honda",
        engine_cc: 649,
        color: "Czerwony"
    },
    {
        id: 3,
        bike_name: "Kawasaki",
        bike_type: "Ninja 500",
        bike_year: 2024,
        image: "https://robohash.org/kawasaki",
        engine_cc: 451,
        color: "Zielony"
    }
];


app.get("/cars", function (req, res) {
    res.send(cars)
})

app.get("/motors", function (req, res) {
    res.send(motorcycles)
})

app.get('/cars/:id', function (req, res) {
    let id = req.params.id
    res.json(cars[id - 1])
});

app.get('/kerk', function (req, res) {
    let fiut = { text: "ilosc autek: ", length: cars.length }
    res.json(fiut)
});



app.listen(PORT, function () {
    console.log("start serwera na porcie " + PORT)
})