function dropdown() {
  document.getElementById("items").classList.toggle("show");
// récupère les items du menu déroulant à montrer
}


window.onclick = function(event) {
  // Ferme et ouvre le menu en fonction du nombre de clique de l'utilisateur sur le bouton
  if (!event.target.matches('#dropdownMenuButton')) {
    var dropdowns = document.getElementsByClassName("dropdown-menu");
    var i;
    for (i = 0; i < dropdowns.length; i++) {

      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

function motclé() {

const id = document.getElementById("text").value;
const request = new XMLHttpRequest();
const parent = document.getElementById("test");
const container= parent.parentNode;
container.removeChild(parent);
const div= document.createElement("div");
request.onreadystatechange = function(){
if (request.readyState == 4) {

div.innerHTML = request.responseText;
container.appendChild(div);
console.log(div.innerHTML);
}
};
request.open("GET","test.php?mot_cle="+id);
  request.send();

}

function article() {
  document.getElementById("divarticle").classList.toggle("show");
// récupère les items du menu déroulant à montrer
}


window.onclick = function(event) {
  // Ferme et ouvre le menu en fonction du nombre de clique de l'utilisateur sur le bouton
  if (!event.target.matches('#dropdownMenuButton')) {
    var dropdowns = document.getElementsByClassName("dropdown-menu");
    var i;
    for (i = 0; i < dropdowns.length; i++) {

      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
