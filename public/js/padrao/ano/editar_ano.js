$(function(){
  
    $('input#submit').click(function(e){
        e.preventDefault();
        var serialize = $('form#editarAno').serialize();
        var validate = ( $('form#editarAno').validationEngine('validate') );
        if(validate === true){
            $.ajax({
                url: '/padrao/ano/editar',
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
                        new Messi('Ano alterado com sucesso!', {
                            title: 'SUCESSO'
                        });
                        $('span.messi-closebtn').click(function(e){
                            location.href="/padrao";
                        });
                    }else{
                        new Messi('Não foi possível alterar o ano, por favor entre em contato com o administrador.', {
                            title: 'ERRO'
                        });
                    }
                },
                error: function(xhr,er){
                    new Messi('Não foi possível alterar o ano, por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        }
    });
});


