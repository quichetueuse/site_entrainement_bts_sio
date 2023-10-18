

function calc_prix()
{
    input1 = document.getElementById("t_article1");
    input2 = document.getElementById("t_prix1");
    input3 = document.getElementById("t_quantité1");
    input4 = document.getElementById("t_remise1");
    input5 = document.getElementById("t_article2");
    input6 = document.getElementById("t_prix2");
    input7 = document.getElementById("t_quantité2");
    input8 = document.getElementById("t_remise2");

    input_net1 = document.getElementById("t_prix_net1");
    input_net2 = document.getElementById("t_prix_net2");

    input_total = document.getElementById("prix_total");
    if (input4.value.length === 0)
    {
        input4.value = 0;
    }

    input_net1.value = (input2.value * input3.value) * ((100 -input4.value) / 100);

    input_net2.value = (input6.value * input7.value) * ((100-input8.value) / 100);

    input_total.value = input_net1.value + input_net2.value + "€";

}
