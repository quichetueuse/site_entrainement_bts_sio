var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\,./~`-=";

function view_password() {
    var input_p = document.getElementById("input_password");
    if (input_p.type === "password") {
        input_p.type = "text";
    } else {
        input_p.type = "password";
    }
}

function view_password2() {
    var input_p = document.getElementById("input_confirm_password");
    if (input_p.type === "password") {
        input_p.type = "text";
    } else {
        input_p.type = "password";
    }
}

function check_password()
{
    input_password = document.getElementById("input_password").value;
    console.log(input_password);
    // document.getElementById("input_password").style.backgroundColor = "Red";
    cptr_special = 0;
    cptr_maj = 0;
    cptr_min = 0;
    cptr_num = 0;
    for(i = 0; i < specialChars.length;i++){
        if(input_password.indexOf(specialChars[i]) > -1){
            cptr_special++;
        }
    }
    for (i=0; i < input_password.length; i++)
    {
        if (input_password[i] === input_password[i].toUpperCase())
        {
            cptr_maj++;
        }
        else if (input_password[i] === input_password[i].toLowerCase())
        {
            cptr_min++;
        }
        else if (isFinite(input_password[i]))
        {
            cptr_num++;
        }
    }

    if (cptr_min < 1 || cptr_maj < 1 || cptr_special < 2 || input_password.length < 13)
    {
        document.getElementById("p-info").style.color = 'Red';
        document.getElementById("p-info").innerText = "mot de passe trop faible";
        return false;
    }
    return true;
}