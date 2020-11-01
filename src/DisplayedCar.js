function DisplayedCar()
{
    return {
        el: "",
        data()
        {
            return {

            };
        },
        template: `
            <a href="">
                <div class="box">
                    <img v-bind:src="carImage" id="image" alt="Car">
                    <p id="model">Model: {{ model }}</p>
                    <p id="make">Make: {{ make }}</p>
                </div>
            </a>
        `,
        methods:
        {

        },
        props: {
            "carImage": String,
            "model": String,
            "make": String
        }
    }
}