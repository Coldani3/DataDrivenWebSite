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
                
            }
        }
        
        xhttp.open("GET", "php/login.php", true);
        xhttp.send();
    }
}