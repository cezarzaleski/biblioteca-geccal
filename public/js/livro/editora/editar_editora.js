$(function(){
  
    $('input#submit').click(function(e){
        e.preventDefault();
        var serialize = $('form#editarEditora').serialize();
        var validate = ( $('form#editarEditora').validationEngine('validate') );
        if(validate === true){
            $.ajax({
                url: '/livro/editora/editar',
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
                        new Messi('Editora alterada com sucesso!', {
                            title: 'SUCESSO'
                        });
                        $('span.messi-closebtn').click(function(e){
                            location.href="/livro/editora/listar";
                        });
                    }else{
                        new Messi('Não foi possível alterar editora, por favor entre em contato com o administrador.', {
                            title: 'ERRO'
                        });
                    }
                },
                error: function(xhr,er){
                    new Messi('Não foi possível alterar editora, por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        }
    });
});

