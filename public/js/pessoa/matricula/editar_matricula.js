$(function(){
    
    
    $('input#submit').click(function(e){
        e.preventDefault();
        var serialize = $('form#editarMatricula').serialize();
        var validate = ( $('form#editarMatricula').validationEngine('validate') );
        if(validate === true){
            $.ajax({
                url: '/pessoa/matricula/editar',
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
                        new Messi('Matrícula de evangelizando(a) alterado(a) com sucesso!', {
                            title: 'SUCESSO'
                        });
                        $('span.messi-closebtn').click(function(e){
                            location.href="/pessoa/matricula/listar";
                        });
                    }else{
                        new Messi('Não foi possível alterar o matrícula de evangelizando(a), por favor entre em contato com o administrador.', {
                            title: 'ERRO'
                        });
                    }
                },
                error: function(xhr,er){
                    new Messi('Não foi possível alterar o matrícula de evangelizando(a), por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        }
    });
});


