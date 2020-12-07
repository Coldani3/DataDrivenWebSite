//Updated on Paginate
var pageCount = 0;

function search()
{
    pageCount = 0;
    submit();
}

function submit()
{
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("carSelect").innerHTML = this.responseText;
        }
    }
    xhttp.open("GET", "php/search.php" + getGETToSend(), true);
    xhttp.send();
}

function getGETToSend()
{
    let url = "?";
    let makeInput = document.getElementById("make").value;
    let modelInput = document.getElementById("model").value;
    let colourInput = document.getElementById("colourSelect").value;
    let minPriceInput = document.getElementById("minPrice").value;
    let maxPriceInput = document.getElementById("maxPrice").value;
    let minMileageInput = document.getElementById("minMileage").value;
    let maxMileageInput = document.getElementById("maxMileage").value;
    let regionInput = document.getElementById("regionSelect").value;
    let townInput = document.getElementById("townSelect").value;
    let dealerInput = document.getElementById("dealerSelect").value;

    if (makeInput.length > 0)
    {
        url += "make=" + makeInput + "&";
    }

    if (modelInput.length > 0)
    {
        url += "model=" + modelInput + "&";
    }

    if (minPriceInput.length > 0)
    {
        url += "minPrice=" + minPriceInput + "&";
    }

    if (maxPriceInput.length > 0)
    {
        url += "maxPrice=" + maxPriceInput + "&";
    }

    if (minMileageInput.length > 0)
    {
        url += "minMileage=" + minMileageInput + "&";
    }

    if (maxMileageInput.length > 0)
    {
        url += "maxMileage=" + maxMileageInput + "&";
    }

    if (colourInput.length > 0)
    {
        url += "colour=" + colourInput + "&";
    }
    
    if (regionInput.length > 0)
    {
        url += "region=" + regionInput + "&";
    }

    if (townInput.length > 0)
    {
        url += "town=" + townInput + "&";
    }

    if (dealerInput.length > 0)
    {
        url += "dealer=" + dealerInput + "&";
    }
    else if (url.indexOf(url.length - 1) == "&")
    {
        url = url.substring(0, url.length - 2);
    }

    url += "page=" + pageCount;

    return url;
}

function setPageCount(page)
{
    pageCount = page;
    submit();
}

function generateMakes()
{
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("makeSelect").innerHTML = this.responseText;
        }
    }

    xhttp.open("GET", "php/availablemakes.php", true);
    xhttp.send();
}

function generateTowns()
{
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("town").innerHTML = this.responseText;
        }
    }

    xhttp.open("GET", "php/availabletowns.php", true);
    xhttp.send();
}

function generateModels()
{
    document.getElementById("model").disabled = false;
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("modelSelect").innerHTML = this.responseText;
        }
    }

    let url = "php/availablemodels.php?make='" + document.getElementById("make").value + "'";

    xhttp.open("GET", url, true);
    xhttp.send();
}

function generateRegions()
{
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("region").innerHTML = this.responseText;
        }
    }

    xhttp.open("GET", "php/availableregions.php", true);
    xhttp.send();
}

function generateColours()
{
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("colour").innerHTML = this.responseText;
        }
    }

    xhttp.open("GET", "php/availablecolours.php", true);
    xhttp.send();
}

function generateDealers()
{
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("dealer").innerHTML = this.responseText;
        }
    }

    xhttp.open("GET", "php/availabledealers.php", true);
    xhttp.send();
}

function updateUserInfo()
{
    let usr = sessionStorage.getItem("usr");
    if (usr != "" && usr != null && usr != "null")
    {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
            {
                let data = JSON.parse(this.responseText);
                document.getElementById("profilePic").src = "images/" + data.profilePic;

                let loginElement = document.getElementById("loginSignup");
                loginElement.innerHTML = "<div class='column is-narrow'><a onclick='logout()' style='padding-right:10px;'>Sign Out</a></div>";
            }
        }
        
        xhttp.open("POST", "php/getuserinfo.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("usr=" + usr);
    }
}

function logout()
{
    sessionStorage.setItem("usr", "");
    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", "php/logout.php", true);
    xhttp.send();
    window.location.reload();
}

function adminDelete(carIndex)
{
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "php/deletecar.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("carIndex=" + carIndex);
}

function markUnavailable(carIndex)
{
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "php/setunavailable.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("carIndex=" + carIndex);
}

updateUserInfo();
generateMakes();
generateRegions();
generateTowns();
generateColours();
generateDealers();