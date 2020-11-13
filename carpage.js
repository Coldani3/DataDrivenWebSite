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
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        {
            window.location.href = "search.html";
        }
    }
    xhttp.open("GET", "php/purchase.php?carIndex=" + carIndex, true);
    xhttp.send();
}