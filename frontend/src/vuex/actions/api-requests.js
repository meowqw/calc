import axios from "axios";
import {API_URL} from "../../../config";

export default {
    // получаем коронки
    async FETCH_CROWNS({commit}) {
        try {
            const crowns = await axios(API_URL + "/api/v1/crowns", {
                methods: "GET",
                headers: {},
            });

            commit("SET_CROWNS", crowns.data.data);
        } catch (error) {
            console.log(error);
        }
    },

    // получаем коронки для второго калькулятора
    async FETCH_CROWNS_TWO({commit}) {
        try {
            const crowns = await axios(
                API_URL + "/api/v1/crowns/two",
                {
                    methods: "GET",
                    headers: {},
                }
            );

            commit("SET_CROWNS_TWO", crowns.data.data);
        } catch (error) {
            console.log(error);
        }
    },

    // получаем материалы стены
    async FETCH_MATERIALS({commit}) {
        try {
            const materials = await axios(
                API_URL + "/api/v1/materials",
                {
                    methods: "GET",
                    headers: {},
                }
            );

            commit("SET_MATERIALS", materials.data.data);
        } catch (error) {
            console.log(error);
        }
    },

    // получаем коэффициенты
    async FETCH_COEFFICIENTS({commit}) {
        try {
            const coefficients = await axios(
                API_URL + "/api/v1/coefficients",
                {
                    methods: "GET",
                    headers: {},
                }
            );

            // добавляем к получаемому json новое свойство
            const coefficientsWithNestedValue = coefficients.data.data.map(
                (item) => ({
                    ...item,
                    value: {
                        name: item.name,
                        value: item.value,
                        startPrice: item.startPrice,
                    },
                })
            );

            commit("SET_COEFFICIENTS", coefficientsWithNestedValue);
        } catch (error) {
            console.log(error);
        }
    },

    async FETCH_EXTRA_WORKS({commit}) {
        try {
            const extraWorks = await axios(
               API_URL + "/api/v1/extraWorks",
                {
                    methods: "GET",
                    headers: {},
                }
            );

            // добавляем к получаемому json новое свойство
            const extraWorksWithQuantity = extraWorks.data.data.map((item) => ({
                ...item,
                quantity: 0,
            }));

            commit("SET_EXTRA_WORKS", extraWorksWithQuantity);
        } catch (error) {
            console.log(error);
        }
    },

    // получаем стартовые настройки
    async FETCH_SETTINGS({commit}) {
        try {
            const settings = await axios(
               API_URL + "/api/v1/settings",
                {
                    methods: "GET",
                    headers: {},
                }
            );

            commit("SET_SETTINGS", settings.data.data);
        } catch (error) {
            console.log(error);
        }
    },

    // получаем клиентов
    async FETCH_CLIENTS({commit}) {
        try {
            const clients = await axios( API_URL + "/api/v1/clients", {
                methods: "GET",
                headers: {},
            });


            commit("SET_CLIENTS", clients.data.data);
        } catch (error) {
            console.log(error);
        }
    },
};
