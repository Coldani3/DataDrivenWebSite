function signup()
{
    let usr = document.getElementById("username");
    let pwd = document.getElementById("password");
    let pwdConfirm = document.getElementById("passwordConfirm");
    let email = document.getElementById("email");

    if (pwd == pwdConfirm)
    {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
            {
                if (this.responseText == "1")
                {
                    document.getElementById("resultText").innerText = "Success!";
                    setTimeout(function() { window.location.href = "search.html"; }, 500);
                }
                else
                {
                    document.getElementById("resultText").innerText = "That username has already been taken!";
                    document.getElementById("username").innerText = "";
                    document.getElementById("password").innerText = "";
                }
            }
        }

        xhttp.open("POST", "signup.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("usr=" + usr + "&pwd=" + pwd + "&email" + email);
    }
}