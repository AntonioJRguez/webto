import '../css/app.css';

window.showDialog = function(name){
let dialog = document.getElementById(name);
dialog.classList.remove('hidden');
}
window.hideDialog = function(name){
    let dialog = document.getElementById(name);
    dialog.classList.add('hidden');
}