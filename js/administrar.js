let estado = document.getElementById("estadoCarrera").value;

console.log(estado)

if(estado != 2){
    let btnCarreras = document.getElementById("btnVotaciones");
    btnCarreras.style.visibility = "hidden";
}