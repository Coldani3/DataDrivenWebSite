let url = new URL(window.location.href);

let carIndex = url.searchParams.get("carIndex");//sessionStorage.getItem("carImage");

let xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200)
    {
        document.getElementById("mainBox").innerHTML = this.responseText;
    }
}
xhttp.open("GET", "php/carpage.php?carIndex=" + carIndex, true);
xhttp.send();

function purchase()
{
    window.location.href = "purchasepage.html?carIndex=" + carIndex;
    // let xhttp = new XMLHttpRequest();
    // xhttp.onreadystatechange = function() {
    //     if (this.readyState == 4 && this.status == 200)
    //     {
    //         window.location.href = "search.html";
    //     }
    // }
    // xhttp.open("POST", "php/setunavailable.php", true);
    // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // xhttp.send("carIndex=" + carIndex);
}

function carDelete()
{
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "php/setunavailable.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("carIndex=" + carIndex);
}