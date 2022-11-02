
$().ready(function () {
  $("#formconnect").validate({
    rules: {
      login: {
        required: true,
        minlength: 3

      },
      pass: {
        required: true,
        minlength: 3

      },

    },
    messages: {
      login: "Le mot login et trop court",
      pass: "Veuillez fournir un nom d'au moins trois lettres",
    }
  });
});

function ecris() {
  console.log('document.getElementById("#formconnect")');
  
}
