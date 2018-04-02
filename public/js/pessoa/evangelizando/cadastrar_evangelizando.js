$(function(){
    
    $("input#nuFoneRes,input#nuFoneCel ").mask("(99) 9999-9999");
    $("input#nuCep").mask("99999-999");
    $("input#dtNascimento").mask("99/99/9999");
      
    $('input#submit').click(function(e){
        e.preventDefault();
        var serialize = $('form#cadastrarEvangelizando').serialize();
        var validate = ( $('form#cadastrarEvangelizando').validationEngine('validate') );
        if(validate == true){
            $.ajax({
                url: '/pessoa/evangelizando/cadastrar',
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
                        $('#noEvangelizando, #noPai, #noMae, #nuCep, #noEndereco, #noBairro').val("");
                        $('#noCidade, #nuFoneRes, #nuFoneCel, #noSexo, #dtNascimento, #idCiclo').val("");
                        new Messi('Evangelizando cadastrado com sucesso!', {
                            title: 'SUCESSO'
                        });
                        $('span.messi-closebtn').click(function(e){
                            //location.href="/pessoa/colaborador/listar";
                        });
                    }else{
                        new Messi('Não foi possível cadastrar o evangelizando, por favor entre em contato com o administrador.', {
                            title: 'ERRO'
                        });
                    }
                },
                error: function(xhr,er){
                    new Messi('Não foi possível cadastrar o evangelizando, por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        }
    });


})


