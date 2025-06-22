function Numeros(string){
        var out = '';
        var filtro = '1234567890';

        for (var i=0; i<string.length; i++)
           if (filtro.indexOf(string.charAt(i)) != -1) 

             out += string.charAt(i);

         return out;
     } 
     function Letras(string){
        var out = '';
        var filtro = ' ÁÉÍÓÚáéíóú.abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ';

        for (var i=0; i<string.length; i++)
           if (filtro.indexOf(string.charAt(i)) != -1) 

             out += string.charAt(i);

         return out;
     } 
     function string_varios(string){
        var out = '';
        var filtro = ' ÁÉÍÓÚáéíóú.abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890#.';

        for (var i=0; i<string.length; i++)
           if (filtro.indexOf(string.charAt(i)) != -1) 

             out += string.charAt(i);

         return out;
     } 

     function iOnChange(abc){
      if (abc.value == "instrumento"){
        divX = document.getElementById("instrumento");
        divX.style.display = "";

        divY = document.getElementById("ensamble");
        divY.style.display = "none";

        divZ = document.getElementById("voz");
        divZ.style.display = "none";

      }else if(abc.value == "ensamble"){
        divX = document.getElementById("instrumento");
        divX.style.display = "none";

        divY = document.getElementById("ensamble");
        divY.style.display = "";

        divZ = document.getElementById("voz");
        divZ.style.display = "none";
      }else{
        divX = document.getElementById("instrumento");
        divX.style.display = "none";

        divY = document.getElementById("ensamble");
        divY.style.display = "none";

        div = document.getElementById("voz");
        divZ.style.display = "";
      }
    }