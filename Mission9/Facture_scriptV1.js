
function Add_row()
{
  tableau = document.getElementById("tableau_facture");
  row_index = tableau.rows.length -1;
  new_line = tableau.insertRow(row_index);

  console.log(new_line.id)
  cell_desc = new_line.insertCell(0);
  cell_desc.className = "right_line desc";
  cell_quantite = new_line.insertCell(1);
  cell_quantite.className = "right_line qte";
  cell_prix = new_line.insertCell(2);
  cell_prix.className = "right_line prx";
  cell_total = new_line.insertCell(3);
  cell_total.className = "right_line tt";

  cell_desc.innerHTML = "<input type='text' class='input_desc' value=''> ";
  cell_desc.getElementsByClassName("input_desc")[0].value = document.getElementById("description").value;
  cell_quantite.innerHTML = "<input type='number' class='input_qte'>";
  cell_quantite.getElementsByClassName("input_qte")[0].value = document.getElementById("quantite").value;
  cell_prix.innerHTML = "<input type='number' class='input_prx'>";
  cell_prix.getElementsByClassName("input_prx")[0].value = document.getElementById("prix").value;
  // console.log(Number(cell_quantite.innerHTML));
  // console.log(Number(cell_prix.innerHTML));
  cell_total.innerHTML = "<input type='number' class='input_tt' readonly>";
  cell_total.getElementsByClassName("input_tt")[0].value = (Number(document.getElementById("quantite").value) * Number(document.getElementById("prix").value)).toFixed(2);

  if (tableau.rows.length % 2 == 0)
  {
    new_line.className = "color2";
    cell_desc.getElementsByClassName("input_desc")[0].className = " input_desc color2";
    cell_quantite.getElementsByClassName("input_qte")[0].className = "input_qte color2";
    cell_prix.getElementsByClassName("input_prx")[0].className = "input_prx color2";
    cell_total.getElementsByClassName("input_tt")[0].className = "input_tt color2";

  }
  else
  {
    new_line.className = "color1";
    cell_desc.getElementsByClassName("input_desc")[0].className = "input_desc color1";
    cell_quantite.getElementsByClassName("input_qte")[0].className = "input_qte color1";
    cell_prix.getElementsByClassName("input_prx")[0].className = "input_prx color1";
    cell_total.getElementsByClassName("input_tt")[0].className = "input_tt color1";
  }

}
function reset()
{
  window.location.reload()
}



function remplir()
{
  const table_desc = Array("Téléphone Ios", "Téléphone Android", "Stick de ram DDr5 16go 7600Mhz Cl40", "Clé usb 3.2 gen 2x2 128go", "Souris de gamer", "Clavier de gamer", "écran 22 pouce Hp");
  liste_prix = document.getElementsByClassName("input_prx");
  //for (var i = 0; i < liste_prix.length; i++) { console.log(liste_prix[i].innerHTML); }
  liste_quantite = document.getElementsByClassName("input_qte");
  liste_desc = document.getElementsByClassName("input_desc");
  liste_tt = document.getElementsByClassName("input_tt");


  for (var i = 0; i <liste_desc.length; i++)
  {
    var idesc = Math.floor(table_desc.length * Math.random());
    liste_desc[i].value = table_desc[idesc];

    var qte = Math.floor(10 * Math.random()+1);
    var prx = Math.floor(100 * Math.random()+1)
    liste_quantite[i].value = qte;
    liste_prix[i].value = prx;
    liste_tt[i].value = qte * prx;

  }

}


function print(elem)
{

  console.log(elem);
}




function clear_row()
{
  document.getElementById("description").value = "Item";
  //console.log(document.getElementById("description").value + "OOOOOOOOOOOOOOOOO");
  document.getElementById("quantite").value = "1";
  document.getElementById("prix").value = "0";
  document.getElementById("total").value = "0.00";
}


function calculer()
{
  liste_prix = document.getElementsByClassName("input_prx");
  //for (var i = 0; i < liste_prix.length; i++) { console.log(liste_prix[i].innerHTML); }
  liste_quantite = document.getElementsByClassName("input_qte");
  liste_desc = document.getElementsByClassName("input_desc");
  liste_tt = document.getElementsByClassName("input_tt");

  soustotal = 0;
  for (var i = 0; i <liste_tt.length; i++)
  {
    soustotal += Number(liste_tt[i].value);
  }
  console.log(soustotal);
}
