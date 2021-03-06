function login()
{
    var usernameInput = document.getElementById("username").value;
    var passwordInput = document.getElementById("password").value;

    if (usernameInput.length > 0 && passwordInput.length > 0)
    {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
            {
                if (this.responseText === "1")
                {
                    document.getElementById("loginResult").innerText = "Successful login!";
                    sessionStorage.setItem("usr", usernameInput);
                    setTimeout(function() { window.location.href = "search.html"; }, 100);
                }
                else if (this.responseText === "0")
                {
                    document.getElementById("loginResult").innerText = "Failed login! Either password or username were incorrect!";
                }
                else if (this.responseText === "2")
                {
                    document.getElementById("loginResult").innerText = "Unexpected error during login!";
                }
                else
                {
                    document.getElementById("loginResult").innerText = "Unexpected result: " + this.responseText;
                }
            }
        }
        
        xhttp.open("POST", "php/login.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("usr=" + usernameInput+"&pwd=" + passwordInput);
    }
}