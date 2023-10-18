

function getResult(caller)
{
    input1 = document.getElementById("t1");
    input2 = document.getElementById("t2");
    input_result = document.getElementById("t3");
    input_even = document.getElementById("t4");
    type_calcul = "";
    console.log(input1.value);
    console.log(input2.value);
    if (caller.id === "btn_add")
    {
        input_result.value = Number(input1.value) + Number(input2.value);

    }
    else if (caller.id === "btn_substract")
    {
        input_result.value = Number(input1.value) - Number(input2.value);
    }
    else if (caller.id === "btn_multiply")
    {
        input_result.value = Number(input1.value) * Number(input2.value);
    }
    else if (caller.id === "btn_divide")
    {
        input_result.value = Number(input1.value) / Number(input2.value);
    }

    else if (caller.id === "btn_modulo")
    {
        input_result.value = Number(input1.value) % Number(input2.value);
    }

    if (input_result.value % 2 === 0)
    {
        input_even.value = "Even";
    }
    else
    {
        input_even.value = "Odd";
    }
}

function permut_numbers()
{
    input1 = document.getElementById("t1");
    input2 = document.getElementById("t2");
    input_result = document.getElementById("t3");
    input_even = document.getElementById("t4");

    placeholder = input1.value;
    input1.value = input2.value;
    input2.value = placeholder;


}