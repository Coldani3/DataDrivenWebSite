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
    let minPriceInput = document.getElementById("minPrice").value;
    let maxPriceInput = document.getElementById("maxPrice").value;

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
    console.log(url);

    xhttp.open("GET", url, true);
    xhttp.send();
}

function updateUserInfo()
{
    if (sessionStorage.getItem("usr") != "")
    {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
            {
                //document.getElementById("profilePic").src = ;//TODO:;
            }
        }
        
    }
}

updateUserInfo();
generateMakes();