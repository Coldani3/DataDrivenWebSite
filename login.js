function login()
{
    var usernameInput = document.getElementById("username");
    var passwordInput = document.getElementById("password");

    sessionStorage.setItem("username", usernameInput);
    sessionStorage.setItem("password", passwordInput);

    if (usernameInput.value.length > 0 && passwordInput.value.length > 0)
    {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
            {
                if (this.responseText == "1")
                {
                    document.getElementById("loginResult").innerText = "Successful login!";
                    setTimeout(function() { window.location.href = "search.html"; }, 500);
                }
                else if (this.responseText == "0")
                {
                    document.getElementById("loginResult").innerText = "Failed login! Either password or username were incorrect!";
                }
                else if (this.responseText == "2")
                {
                    document.getElementById("loginResult").innerText = "Unexpected error during login!";
                }
                else
                {
                    document.getElementById("loginResult").innerText = "not possible but ok: " + this.responseText;
                }
            }
        }
        
        xhttp.open("GET", "php/login.php", true);
        xhttp.send();
    }
}