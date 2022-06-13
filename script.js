const days = [' ',' Lundi ',' Mardi ',' Mercredi ',' Jeudi ',' Vendredi ',' Samedi ',' Dimanche '];
let nb= 0;
let key=false;
const totalprice = document.createElement("p");

//aimer une salle
function like(id,session){
if (typeof(session) == 'undefined') {
    alert('Vous devez etre connecter pour effectuer cette action');
    return false;
}
  const req = new XMLHttpRequest();
  req.onreadystatechange = function() {
    if(req.readyState === 4) {
      let likesalle1 = document.getElementById('like'+id);
      likesalle  = req.responseText;
      likesalle1.innerHTML = likesalle;
    }
  }
    req.open('GET', "avis.php?id="+id+"&type=like");
    req.send();
return true;
}

//ne pas aimer une salle
function dislike(id,session) {
if (typeof(session) == 'undefined') {
    alert('Vous devez etre connecter pour effectuer cette action');
    return false;
}
const req = new XMLHttpRequest();
req.onreadystatechange = function() {
  if(req.readyState === 4) {
    let dislike= document.getElementById('dislike'+id);
    dislikesalle  = req.responseText;
    dislike.innerHTML = dislikesalle;
  }
}
  req.open('GET', "avis.php?id="+id+"&type=dislike");
  req.send();
return true;
}

function reserver(id,session) {
  if (typeof(session) == 'undefined') {
    alert('Vous devez etre connecter pour effectuer cette action');
    return false;
  }
const button = document.getElementById("buttonresv"+id);
button.style.visibility= 'hidden';
const container = document.getElementById(id);
const div = document.createElement("div");
div.className =  "reservation";
container.appendChild(div);

//afficher la date d'adj
date(div);

//horaire dispo
createp("p","Horaires Disponibles :","",div);

//Nombres de places désirée(s):
createp("place","Nombres de places désirée(s): ","nbplace",div);

const form = document.createElement("form");
form.action = "script.js";
form.method = "POST";
const input = document.createElement("input");
input.value = nb;
input.id = "place";
input.type = "number";
form.appendChild(input);
div.appendChild(form);

// boutton pour annuler
funct = function() { annul(div,container,button); };
createbutton("cancel","ANNULER","white","red",funct,div)

//boutton pour valider
funct = function() { reservation(id,div); };
createbutton("validate","VALIDER","black","green",funct,div);

//planning
planning(div,id);
return true;
}

//function pour afficher la date d'adj => param1: endroit ou est mise la date
function date(div) {
  const date = document.createElement("p");
  let date1 = new Date();
  let localdate = date1.toLocaleString('fr-FR',{
      weekday: 'long',
      year: 'numeric',
      month: 'long',
      day: 'numeric',
      hour: 'numeric',
      minute: 'numeric'});
  date.innerHTML = 'Date : ' + localdate;
  div.appendChild(date);
}

/**
function createp() => creation de p
  @param1: nam
  @param2: content
  @param3: id del'element
  @param4: div
*/
function createp(name,content,id,div) {
  name = document.createElement("p");
  name.innerHTML = content;
  name.id = id;
  div.appendChild(name);
}

/**
function pour afficher un planning des créanux libres
@param1: endroit ou est mise la date
@param2: id pour savoir sur quelle histoire on travaille
*/
function planning(div,id) {
  let  horaire=9;
  const table = document.createElement("table");
  for(let n = 0; n < 8; n++){
  const day = document.createElement("th");
  day.innerHTML= days[n];
  table.appendChild(day);
  }
  for(let i = 0; i < 16; i++) {
    const tr = document.createElement("tr");
    const hours = document.createElement("td");
    hours.innerHTML = horaire + 'h';
    horaire++;
    tr.appendChild(hours);
    for(let j = 0; j < 7; j++) {
      const td = document.createElement("td");
      const slot = document.createElement("input");
      slot.value = "disponible";
      slot.id="slot"+i+j;
      slot.style.color = "black";
      slot.style.backgroundColor = "green";
      slot.type = "button";
      slot.onclick = function() { status(i,j,id,div); };
      td.appendChild(slot);
      tr.appendChild(td);
    }
    table.appendChild(tr);
  }
  div.appendChild(table);
}

/**
function createbutton() => selection des crénaux et des nb de places
@param1: nom
@param2: content
@param3: style.color
@param4: style.backgroundColor
@param5: onclick
@param6: parent
*/
function createbutton(name,content,style1,style2,funct,div) {
  name = document.createElement("button");
  name.innerHTML = content;
  name.onclick = funct;
  name.style.color = style1;
  name.style.backgroundColor = style2;
  div.appendChild(name);
}

/**
function test() => selection des crénaux et des nb de places
@param1: pour id de l'input
@param2: pour id de l'input
@param3: pour savoir sur quelle salles on agi
@param4: element ou ajouter les elements
*/

function status(i,j,id,div) {
  reservation(id,div);
  const slot = document.getElementById("slot"+i+j);
  if (slot.style.backgroundColor == "green") {
    slot.style.color = "white";
    slot.style.backgroundColor = "orange";
    slot.value = "En cours de reservation";
  }else {
    slot.style.backgroundColor = "green";
    slot.style.color = "black";
    slot.value = "disponible";
  }
}

/**
function reservation() => prix
@param1: pour savoir sur quelle salles on agi
@param2:  element ou ajouter les elements
*/
function reservation(id,div){
  const input = document.getElementById("place");
  const nb_de_place = document.getElementById("nbplace");
  const price = document.getElementById("price"+id);
  uniqueprice1 = price.innerHTML;
  priceplace = uniqueprice1.indexOf(":");
  uniqueprice = uniqueprice1.substr(priceplace+1);
  if(input.value<=0){
    input.style.color = "red";
    if (nb_de_place.innerHTML == "Nombres de places désirée(s): ") {
    nb_de_place.innerHTML  += "NOMBRES SAISIE INCORRECTS";
    totalprice.innerHTML = "prix: 0€";//Attention return un int au lieu d'un float
    }
  }else {
    input.style.color = "green";
    nb_de_place.innerHTML = "Nombres de places désirée(s): ";
    totalprice.innerHTML = "prix: "+ parseFloat(uniqueprice) * input.value + "€";//Attention return un int au lieu d'un float
    div.appendChild(totalprice);
  }
}

/**
function annul() => enlever la div de reservation et faire réapparaitre le bouton pour resever
@param1: element a suppr
@param2: element parent
@param3: element a rendre visible
*/
function annul(div,container,button){
container.removeChild(div);
button.style.visibility= 'visible';
}



/* clavier*/
function keyboard() {
  if (key == true) {
  const suppr = document.getElementById('keyboard');
  const container = suppr.parentNode;
  container.removeChild(suppr);
  key=false;
  return false;
  }
const parent = document.getElementById('pseudo1');
const keyboard = document.createElement("div");
createkey(keyboard);
keyboard.id = "keyboard";
keyboard.style.backgroundColor ="grey";
keyboard.className ="container-fluid";
funct = function() { suppr(); };
createbutton("suppr","supprimer","black","grey",funct,keyboard);
funct = function() { space(); };
createbutton("space","space","red","grey",funct,keyboard);
parent.appendChild(keyboard);
  key=true;
    console.log(parent);
}

function createkey(keyboard){
  const alphabet = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
  for (var i = 0; i < 26; i++) {
    const letter = document.createElement('button');
    letter.innerHTML= alphabet[i];
    letter.id = "letter"+i;
    letter.onclick =  function() { transform(letter.innerHTML); };
    letter.className ="btn btn-outline-light";
    letter.style.color ="red";
    keyboard.appendChild(letter);
  }
}

function transform(letter) {
const parent = document.getElementById('pseudo1');
parent.value += letter;
}

function suppr() {
  string = string.substr(0,string.length-1);
  console.log(string);
}

function space() {
 console.log(" ");
}

/* add / bloquer */
const pseudo = document.getElementsByClassName('pseudo');
ps= pseudo.innerHTML;
let recupid = 0;
//console.log(pseudo);
function recupID(id){
recupid = id;
}
function bloquer(){
  const request = new XMLHttpRequest(); //construire une requete http

  request.onreadystatechange = function(){
    if (request.readyState == 4) {
      const note = document.getElementById("demo");
      note.innerHTML = request.responseText;
    }
  };
  request.open("GET","bdd.php?id="+recupid);
  request.send();
}

function ami(){
  const request = new XMLHttpRequest(); //construire une requete http

  request.onreadystatechange = function(){
    if (request.readyState == 4) {
      const note = document.getElementById("demo");
      note.innerHTML = request.responseText;
    }
  };
  request.open("GET","add.php?id="+recupid);
  request.send();
}
