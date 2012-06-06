function compZero(nombre) {
return nombre < 10 ? '0' + nombre : nombre;
}

function date_heure() {
var infos = new Date();

//Heure
document.getElementById('date_heure').innerHTML =  compZero(infos.getHours()) + ' h ' + compZero(infos.getMinutes()) + 'min ' + compZero(infos.getSeconds()) + 's';


}

window.onload = function() {
setInterval("date_heure()", 1000); //Actualisation de l'heure
};
