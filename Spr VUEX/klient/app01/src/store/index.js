import axios from 'axios'
import { createStore } from 'vuex'

const state = {
    cars: [],
    kerk: []
} // state

const getters = {
    GET_CARS(state) {
        return state.cars
    },
    GET_KERK(state) {
        return state.kerk
    }
}

const actions = {
    async GET_POSTS_ACTION({ commit }) {
        try {
            const response = await axios.get('http://localhost:3000/cars')
            console.log("response.data", response.data);
            commit('SET_CARS', response.data)
        }
        catch (ex) {
            console.log("error: " + ex)
        }
    },

    async GET_POSTS_ACTION1({ commit }) {
        try {
            const response = await axios.get('http://localhost:3000/kerk')
            console.log("response.data", response.data);
            commit('SET_KERK', response.data)
        }
        catch (ex) {
            console.log("error: " + ex)
        }
    }

} // actions

const mutations = {
    SET_CARS(state, posts) {
        state.cars = posts
    },
    SET_KERK(state, posts) {
        state.kerk = posts
    }
} //mutations

//export store 

export default createStore({
    state, getters, actions, mutations
})