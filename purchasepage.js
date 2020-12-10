let carIndex = new URL(window.location.href).searchParams.get("carIndex");

function purchase()
{
    let xhttp = new XMLHttpRequest();

    xhttp.open("POST", "php/setunavailable.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("carIndex=" + carIndex);
    window.location.href = "customerpickupinfo.html";
}

function checkAllFilled()
{
    if (document.getElementById("firstname").value.length > 0
      && document.getElementById("lastname").value.length > 0
      && document.getElementById("address").value.length > 0
      && document.getElementById("email").value.length > 0)
    {
        if (document.getElementById("credit").checked || document.getElementById("debit").checked)
        {
            document.getElementById("purchaseButton").disabled = false;
        }
    }

}