<template>
    <div class="car">
        <p :style="{ backgroundColor: car.hex_color }">kolor auta</p>
        <p :style="{ backgroundColor: car.damaged ? 'red' : 'green' }">{{ car.damaged ? 'uszkodzony' : 'sprawny' }}</p>
        <img :src="car.image">
        <p>id:{{ car.id }}</p>
        <p>name:{{ car.car_name }}</p>
        <p>year:{{ car.car_year }}</p>
        <button @click="info">Info</button>

    </div>
</template>

<script>

export default {
    props: ['car'],
    methods: {
        info(car) {
            alert(JSON.stringify(this.car, null, 5))
        }
    }
}
</script>

<style scoped>
.car {
    border: 1px solid black;
    padding: 1em;
    margin: 10px;
}
</style>