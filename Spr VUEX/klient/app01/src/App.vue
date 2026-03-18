<template>
  <div>
    <div v-for="iteam in get_cars">
      {{ iteam.car_name }}
    </div>
    <div>
      <h1>{{ get_kerk.text }}{{ get_kerk.length }}</h1>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    get_cars() {
      return this.$store.getters.GET_CARS
    },
    get_kerk() {
      return this.$store.getters.GET_KERK
    }
  },
  mounted() {
    this.$store.dispatch("GET_POSTS_ACTION");
    this.$store.dispatch("GET_POSTS_ACTION1");
  },
}
</script>

<style scoped></style>