document.addEventListener("DOMContentLoaded", () => {
    const RegisterForm = document.getElementById("registrationForm");
    const LoginForm = document.getElementById("loginForm");

    if (RegisterForm) {
        RegisterForm.addEventListener("submit", (event) => {
            event.preventDefault();

            let name = document.getElementById("user_name").value;
            let email = document.getElementById("user_email").value;
            let password = document.getElementById("user_password").value;

            // Password validation
            if (password.length < 8) {
                document.getElementById("response").innerHTML = "Password must be at least 8 characters long.";
                return;
            }

            var params = {
                user_name: name,
                user_email: email,
                user_password: password,
                form_name: 'register_form'
            };

            var http = new XMLHttpRequest();
            http.open("POST", "functions.php", true);
            http.setRequestHeader("Content-type", "application/json");

            http.onreadystatechange = function () {
                if (http.readyState == 4 && http.status == 200) {
                    document.getElementById("response").innerHTML = http.responseText;
                    window.location.href = 'index.php';
                }
            }
            http.send(JSON.stringify(params));
        });
    }

    if (LoginForm) {
        LoginForm.addEventListener("submit", (event) => {
            event.preventDefault();

            let login_email = document.getElementById("login_email").value;
            let login_password = document.getElementById("login_password").value;

            var params = {
                user_email: login_email,
                user_password: login_password,

                form_name: 'login_form'
            };
            // console.log(params);

            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "functions.php", true);
            xhttp.setRequestHeader("Content-type", "application/json");

            xhttp.onreadystatechange = function () {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("message").innerHTML = xhttp.responseText;
                    //console.log(xhttp.responseText);
                    if (xhttp.responseText == "loginSuccess") {
                        window.location.href = 'index.php';
                    }
                }
            }
            xhttp.send(JSON.stringify(params));
        });
    }












    //dom conetent ends here   
});
