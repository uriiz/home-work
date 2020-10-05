$(document).ready(function () {

    $('#post-form').submit(function(e){
        e.preventDefault();

        $('input,textarea').removeClass('error')

        let name = $('#name').val();
        let email = $('#email').val();
        let title = $('#title').val();
        let body = $('#body').val();

        if( !name ){
            $('#name').addClass('error');
            return;
        }
        if( !email ){
            $('#email').addClass('error');
            return;
        }
        if( !title ){
            $('#title').addClass('error');
            return;
        }
        if( !body ){
            $('#body').addClass('error');
            return;
        }


        $.post('./inc/ajax.php', { name: name, email : email,title:title,body:body},
            function(){
               location.reload();
            }).fail(function(){
            console.log("error");
        });

    });

});