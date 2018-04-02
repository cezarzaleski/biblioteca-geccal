$(function(){
    
    $("input#nuFoneRes,input#nuFoneCel ").mask("(99) 9999-9999");
    $("input#nuCep").mask("99999-999");
    $("input#dtNascimento").mask("99/99/9999");
  
  
    $('input#submit').click(function(e){
        e.preventDefault();
        var serialize = $('form#editarColaborador').serialize();
        var validate = ( $('form#editarColaborador').validationEngine('validate') );
        if(validate == true){
            $.ajax({
                url: '/pessoa/evangelizando/editar',
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
                    if(confirm == "true"){
                        new Messi('Evangelizando alterado com sucesso!', {
                            title: 'SUCESSO'
                        });
                        $('span.messi-closebtn').click(function(e){
                            location.href="/pessoa/evangelizando/listar";
                        });
                    }else{
                        new Messi('Não foi possível alterar o evangelizando, por favor entre em contato com o administrador.', {
                            title: 'ERRO'
                        });
                    }
                },
                error: function(xhr,er){
                    new Messi('Não foi possível alterar o evangelizando, por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        }
    });


})


