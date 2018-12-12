function MuestraDel(num,boton) {
    let p = document.getElementById("parrafoDel");
    let tabla = document.getElementById("actual");
    p.innerHTML = `¿Quieres borrar el registro con ${tabla.innerHTML} = ${boton.value} ?`;

    let inputDel = document.getElementById("vDel");
    inputDel.value = boton.value;

}

function MuestraAct(num) {
  let knekro = document.getElementsByTagName("tr");
  for(let i=0; i<knekro[num].childNodes.length-2;i++){
    let tmp = document.getElementById(`valorAct${i+1}`);
    tmp.value=knekro[num].childNodes[i].innerHTML;
  }
}
