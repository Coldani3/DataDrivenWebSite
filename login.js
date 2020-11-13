function login()
{
    var usernameInput = document.getElementById("username");
    var passwordInput = document.getElementById("password");
    if (usernameInput.value.length > 0 && passwordInput.value.length > 0)
    {
        var xhttp = new XMLHttpRequest();
        
        xhttp.open("GET", "php/login.php?username=" + usernameInput.value + "&password=" /* BAD, NEVER DO THIS */ + passwordInput.value, true);
        xhttp.send();
    }
}