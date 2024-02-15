function view_password() {
    var input_p = document.getElementById("input_password");
    if (input_p.type === "password") {
        input_p.type = "text";
    } else {
        input_p.type = "password";
    }
}