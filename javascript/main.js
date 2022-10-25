
console.log($("#afficheinscris"));
console.log( $("#ajoute"));

$(document).ready(function(){
  console.log("hello world");
  
  $("#afficheinscris").hide()
   
   
   $("#ajoute").click(function(){

        $("#afficheinscris").toggle();
    });

    
  });