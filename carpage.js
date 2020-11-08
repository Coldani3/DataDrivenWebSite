const CarPageApp = {
    data() {
        return {
            carIndex: 0,
            imgSrc: "",
            url: null,
        }
    },
    mounted() {
        loadCarData();
    },
    methods: {
        loadCarData()
        {
            let url = new URL(window.location.href);

            //TODO: get from page parameters
            //TODO: get car image automatically without passing it through GET
            this.carIndex = url.searchParams("carIndex");//sessionStorage.getItem("carImage");
            //
        }
    }
}

Vue.createApp(CarPageApp).mount("#mainBox");