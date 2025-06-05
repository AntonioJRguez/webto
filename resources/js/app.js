import '../css/app.css';



window.toggleDialog = function (name) {
    let dialog = document.getElementById(name);
    dialog.classList.toggle('hidden');
}
// window.hideDialog = function(name){
//     let dialog = document.getElementById(name);
//     dialog.classList.add('hidden');
// }

window.showModalDeleteTask = function (id) {

    toggleDialog('modalDeleteTask');
    let buttonDeleteTask = document.getElementById("buttonDeleteTask");

    buttonDeleteTask.onclick = () => deleteTask(id);
}

window.showModalDeleteCrop = function (id) {

    toggleDialog('modalDeleteCrop');
    let buttonDeleteCrop = document.getElementById("buttonDeleteCrop");

    buttonDeleteCrop.onclick = () => deleteCrop(id);
}


window.openEditUserModal = function (id, name, email, plot, isAdmin) {
    var url = window.routeTemplate.replace(':id', id);
    var form = document.getElementById('editUserForm')
    form.action = url;



    document.getElementById("name").value = name;
    document.getElementById("email").value = email;
    document.getElementById("plot_name").value = plot;
    document.getElementById("is_admin").value = isAdmin;
    document.getElementById("new_password").value = "";
    document.getElementById("confirm_password").value = "";
    // Mostrar el modal
    showDialog("modal-admin-users");
    form.addEventListener('submit', function (event) {
        console.log("LE has dado a submit");
        showDialog("modal-admin-users");
    })
}

window.toggleMenu = function() {
        const menu = document.getElementById('nav-menu');
        menu.classList.toggle('hidden');
    }

