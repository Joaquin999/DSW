<script>
 var n = 0;
</script>
<script>
   function iluminar(elemento){
     let listado = document.getElementById("archivos").childNodes;
     for(let index in listado){
       if(index!=0 & index!=(listado.length-1) & index!="item" & index!="keys" & index!="values" & index!="entries"
     & index!="forEach" & index!="length"){
         listado[index].style.backgroundColor = "#ffffff";

       }
     }
     elemento.style.backgroundColor = "#8bf6e1";
     let input = document.getElementById("valor");
     input.value = elemento.innerHTML;
     input.value = input.value.replace("<strong>","");
     input.value = input.value.replace("</strong>","");
     input.value = input.value.replace('<a href="#">',"");
     input.value = input.value.replace('</a>',"");
     n++;
     if(n == 2){
       document.getElementById("insertar").disabled = false;
     }

   }
   function iluminar2(elemento){
     let tablas = document.getElementById("tablas").childNodes;
     for(let index in tablas){
       if(index!=0 & index!=(tablas.length-1) & index!="item" & index!="keys" & index!="values" & index!="entries"
     & index!="forEach" & index!="length"){
         tablas[index].style.backgroundColor = "#ffffff";

       }
     }
     elemento.style.backgroundColor = "#8bf6e1";
     let input = document.getElementById("valor2");
     input.value = elemento.innerHTML;
     input.value = input.value.replace("<strong>","");
     input.value = input.value.replace("</strong>","");
     input.value = input.value.replace('<a href="#">',"");
     input.value = input.value.replace('</a>',"");
     n++;
     if(n == 2){
       document.getElementById("insertar").disabled = false;
     }
   }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
</body>
</html>
