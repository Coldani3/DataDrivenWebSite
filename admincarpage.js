let url = new URL(window.location.href);

let carIndex = url.searchParams.get("carIndex");

let xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200)
    {
        document.getElementById("mainBox").innerHTML = this.responseText;
    }
}
xhttp.open("GET", "php/admincarpage.php?carIndex=" + carIndex, true);
xhttp.send();

function carDelete()
{
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "php/setunavailable.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("carIndex=" + carIndex);
}

function updateValues()
{
    
}