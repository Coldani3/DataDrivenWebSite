let url = new URL(window.location.href);

this.carIndex = url.searchParams("carIndex");//sessionStorage.getItem("carImage");

let xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200)
    {
        document.getElementById("mainBox").innerHTML = this.responseText;
    }
}
xhttp.open("GET", "carpage.php?carIndex=" + this.carIndex, true);
xhttp.send();