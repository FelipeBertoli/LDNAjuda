$(document).ready( function(){ //Quando documento estiver pronto
    $('#btn').click( function(){ /* Quando clicar em #btn */
        /* Coletando dados */
        var nome  = $('#nome').val();
        var email = $('#email').val();
        var telefone   = $('#telefone').val();
        var empresa   = $('#empresa').val();
 
        /* Validando */
        if(nome.length <= 3){
            alert('Informe seu nome');
            return false;
        }
        if(email.length <= 5){
            alert('Informe seu email');
            return false;
        }
        if(telefone.length <= 5){
            alert('Informe seu telefone');
            return false;
        }
        if(empresa.length <= 5){
            alert('Informe sua empresa');
            return false;
        }
        if(msg.length <= 5){
            alert('Escreva uma mensagem');
            return false;
        }
 
        /* construindo url */
        var urlData = "&nome=" + nome +
        "&email=" + email +
        "&msg=" + msg ;
 
        /* Ajax */
        $.ajax({
             type: "POST",
             url: "css/sendmail.php", /* endereço do script PHP */
             async: true,
             data: urlData, /* informa Url */
             success: function(data) { /* sucesso */
                 $('#retornoHTML').html(data);
             },
             beforeSend: function() { /* antes de enviar */
                 $('.loading').fadeIn('fast'); 
             },
             complete: function(){ /* completo */
                 $('.loading').fadeOut('fast'); //wow!
             }
         });
    });
});