function ehPalindromo (string) {
    var contrario=""
    for(let i=string.length;i>0;i--){
      contrario+=string[i]
     
    }
   if(contrario==string){
       return "sim"
       
    }else{
        return "não"
    } return contrario}