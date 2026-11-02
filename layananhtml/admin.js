const loginForm = document.getElementById("loginForm");

if (loginForm) {

    loginForm.addEventListener("submit", function (event) {

        event.preventDefault();


        const username =
            document.getElementById("username").value.trim();

        const password =
            document.getElementById("password").value;


        const loginError =
            document.getElementById("loginError");


        /*
        LOGIN SEMENTARA
        UNTUK TAHAP PENGEMBANGAN
        */

        const adminUsername = "admin";
        const adminPassword = "admin123";


        if (
            username === adminUsername &&
            password === adminPassword
        ) {

            localStorage.setItem(
                "adminLogin",
                "true"
            );

            window.location.href = "admin.html";

        } else {

            loginError.textContent =
                "Username atau password salah.";

        }

    });

}