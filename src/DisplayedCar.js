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
            <a v-bind:href="carPageLink">
                <div class="box">
                    <img v-bind:src="carImage" id="image" alt="Car">
                    <p id="model">Model: {{ model }}</p>
                    <p id="make">Make: {{ make }}</p>
                    <p id="price">Price: {{ price }}</p>
                    <p id="reg">Registration: {{ reg }}</p>
                    <p id="colour">Colour: {{ colour }}</p>
                    <p id="telephone">Telephone: {{ telephone }}</p>
                </div>
            </a>
        `,
        methods:
        {

        },
        props: {
            "carPageLink": String,
            "carImage": String,
            "model": String,
            "make": String,
            "price": String,
            "reg": String,
            "colour": String,
            "telephone": String,
        }
    }
}