function signup()
{
    let usr = document.getElementById("username").value;
    let pwd = document.getElementById("password").value;
    let pwdConfirm = document.getElementById("passwordConfirm").value;
    let email = document.getElementById("email").value;

    if (pwd === pwdConfirm)
    {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
            {
                console.log(this.responseText);

                if (this.responseText === "1")
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

        xhttp.open("POST", "php/signup.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("usr=" + usr + "&pwd=" + pwd + "&email=" + email);
    }
    else
    {
        document.getElementById("resultText").innerText = "Your entered password confirmation did not match the password you entered!";
    }
}