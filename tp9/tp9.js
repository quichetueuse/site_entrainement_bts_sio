function set_bgcolor()
{
    case_div = document.getElementById("div_container");
    color = prompt("Donnez une couleur: ");
    Console.log(color);
    case_div.style.backgroundColor = color;
}