function add()
{
    let image = document.getElementById("image").value;
    let description = document.getElementById("description").value;
    let price = document.getElementById("price").value;
    let make = document.getElementById("make").value;
    let model = document.getElementById("model").value;
    let colour = document.getElementById("colour").value;
    let reg = document.getElementById("reg").value;
    let miles = document.getElementById("miles").value;
    let dealer = document.getElementById("dealer").value;
    let town = document.getElementById("town").value;
    let region = document.getElementById("region").value;
    let telephone = document.getElementById("telephone").value;

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        {
            setTimeout(function() { window.location.href = "search.html"; }, 1000);
        }
    }
    xhttp.open("POST", "php/addcar.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    console.log(carIndex);
    xhttp.send("carIndex=" + carIndex + 
                "&image=" + image + 
                "&description=" + description + 
                "&price=" + price + 
                "&make=" + make + 
                "&model=" + model +
                "&colour=" + colour +
                "&Reg=" + reg +
                "&miles=" + miles +
                "&dealer=" + dealer +
                "&town=" + town +
                "&region=" + region +
                "&telephone=" + telephone);
}
}