function DisplayedCar()
{
    return {
        el: "#displayedCar",
        data()
        {
            return {

            };
        },
        template: `
            <a class="displayedCar" v-bind:href="carPageLink">
                <div class="box">
                    <img v-bind:src="carImage" id="image" alt="Car" style="float:left;">
                    <p id="model">Model: {{ model }}</p>
                    <p id="make">Make: {{ make }}</p>
                    <p id="price">Price: {{ price }}</p>
                    <p id="reg">Registration: {{ reg }}</p>
                    <p id="colour">Colour: {{ colour }}</p>
                    <p id="telephone">Telephone: {{ telephone }}</p>
                    <p id="dealer">Dealer: {{ dealer }}
                </div>
            </a>
        `,
        props: {
            carPageLink: String,
            carImage: String,
            model: String,
            make: String,
            price: String,
            reg: String,
            colour: String,
            telephone: String,
            dealer: String,
        }
    }
}