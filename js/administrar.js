let estado = document.getElementById("estadoCarrera").value;
let btnAdmin = document.getElementById("conHidden");
let header = document.getElementById("header");
let btnVotaciones = document.getElementById("btnVotaciones");

if(estado == 2){
    btnVotaciones.style.visibility = "hidden";
    header.style.zIndex = -999;
}

if(estado != 2){
    btnAdmin.style.visibility = "hidden";
    header.style.zIndex = 2;
    btnAdmin.style.display = "none";
}