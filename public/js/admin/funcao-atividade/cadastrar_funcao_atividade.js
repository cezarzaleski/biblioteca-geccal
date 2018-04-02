$(function(){
  
    $('input#submit').click(function(e){
        e.preventDefault();
        var serialize = $('form#cadastrarFuncaoAtividade').serialize();
        var validate = ( $('form#cadastrarFuncaoAtividade').validationEngine('validate') );
        if(validate === true){
            $.ajax({
                url: '/admin/funcao-atividade/cadastrar',
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
                        $('#noFuncao').val("");
                        new Messi('Função/Atividade cadastrada com sucesso!', {
                            title: 'SUCESSO'
                        });
                        $('span.messi-closebtn').click(function(e){
                            location.href="/admin/funcao-atividade/listar";
                        });
                    }else{
                        new Messi('Não foi possível cadastrar nova função/atividade, por favor entre em contato com o administrador.', {
                            title: 'ERRO'
                        });
                    }
                },
                error: function(xhr,er){
                    new Messi('Não foi possível cadastrar nova função/atividade, por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        }
    });
});


