function showDialog(name){
let dialog = document.getElementById(name);
dialog.classList.remove('hidden');
}
function hideDialog(name){
    let dialog = document.getElementById(name);
    dialog.classList.add('hidden');
}