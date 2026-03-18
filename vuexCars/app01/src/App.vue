<template>
  <div>
    <p>{{ rok }}</p>
    <input type="range" v-model="rok" min="1909" max="2013" />
  </div>

  <div id="main">
    <MyCar v-for="car in rocznik" :key="car.id" :car="car"></MyCar>

  </div>
  <button id="Bwiecej" @click="wiecje">Pokaz wiecej</button>
</template>

<script>
import cars from './data/cars_full.json'
import MyCar from './components/MyCar.vue';

export default {
  components: {
    MyCar
  },
  data() {
    return {
      rok: 2000,
      ilosc: 5,
      json: cars
    }
  },
  methods: {
    wiecje() {
      this.ilosc += 5
    }
  },
  computed: {
    baza() {
      return this.json.filter(element => element.id <= this.ilosc)
    },
    rocznik() {
      return this.json.filter(element => element.car_year == this.rok)
    }
  }
}
</script>

<style scoped>
#main {
  display: flex;
  flex-wrap: wrap;
}

#Bwiecej {
  padding: 1em;
  margin: 10px;
}
</style>