function check_for_char()
{
  string_box = document.getElementById("string_box");
  char_box = document.getElementById("char_box");
  if(string_box.value == "" || char_box.value == "") return;
  if(char_box.value.length > 1) return;

  alert(`The string [${string_box.value}] have a lengh of ${string_box.value.length}\n string in full caps: ${string_box.value.toUpperCase()}\n the character [${char_box.value}] is appearing ${string_box.value.count(char_box.value)} times`)
}

function check_for_string()
{
  console.log("entering")
  string_box = document.getElementById("string_box");
  string_box2 = document.getElementById("string_box2");
  if(string_box.value == "" || string_box2.value == "") return;

  alert(`The string [${string_box.value}] contain the substring [${string_box2.value}] ${countSubstrings(string_box.value, string_box2.value)} times`)
}

String.prototype.count=function(c) {
  var result = 0, i = 0;
  for(i;i<this.length;i++)if(this[i]==c)result++;
  return result;
};

const countSubstrings = (str, searchValue) => {
  let count = 0,
    i = 0;
  while (true) {
    const r = str.indexOf(searchValue, i);
    if (r !== -1) [count, i] = [count + 1, r + 1];
    else return count;
  }
};
