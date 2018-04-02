$(function(){
  
    $('input#submit').click(function(e){
        e.preventDefault();
        var serialize = $('form#editarAutor').serialize();
        var validate = ( $('form#editarAutor').validationEngine('validate') );
        if(validate === true){
            $.ajax({
                url: '/livro/autor/editar',
                dataType: 'html',
                type: 'post',
                data: serialize,
                beforeSend: function(){
                	$.prompt("<div class='loadGif'><img src='/img/structure/load.gif'></img></div>");  
                },
                complete: function(){
                	$.prompt.close();
                },
                success: function(data, textStatus){
                    var conf = data;
                    var confirm = $.trim(conf);
                    if(confirm === "true"){
                        new Messi('Autor alterado com sucesso!', {
                            title: 'SUCESSO'
                        });
                        $('span.messi-closebtn').click(function(e){
                            location.href="/livro/autor/listar";
                        });
                    }else{
                        new Messi('Não foi possível alterar o autor, por favor entre em contato com o administrador.', {
                            title: 'ERRO'
                        });
                    }
                },
                error: function(xhr,er){
                    new Messi('Não foi possível alterar o autor, por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        }
    });


});


