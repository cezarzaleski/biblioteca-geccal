$(function(){
    $('input#submit').click(function(e){
        e.preventDefault();
        var serialize = $('form#cadastrarEditora').serialize();
        var validate = ( $('form#cadastrarEditora').validationEngine('validate') );
        if(validate === true){
            $.ajax({
                url: '/livro/editora/cadastrar',
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
                        $('#noEditora').val("");
                        new Messi('Editora cadastrada com sucesso!', {
                            title: 'SUCESSO'
                        });
                        $('span.messi-closebtn').click(function(e){
                            //location.href="/livro/editora/listar";
                        });
                    }else{
                        new Messi('Não foi possível cadastrar nova editora, por favor entre em contato com o administrador.', {
                            title: 'ERRO'
                        });
                    }
                },
                error: function(xhr,er){
                    new Messi('Não foi possível cadastrar nova editora, por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        }
    });
});


