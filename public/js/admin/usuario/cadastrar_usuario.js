$(function(){
  
    $('input#noUsuario').change(function(e){
        var noUsuario = $(this).val();
        $.ajax({
            url: '/admin/usuario/cadastrar',
            dataType: 'text',
            type: 'post',
            data: {
                noUsuario: noUsuario,
                method:"checkUsuario"
            },
            beforeSend: function(){
                $('#icone').remove();
                $("#noUsuario").css('width','60%');
                $("#noUsuario").after("<img src='/img/structure/carregando.gif' id='carregando' />");
            },
            timeout: 60000,
            complete: function(){
                $('#carregando').remove();
            },
            success: function(data, textStatus){
                var conf = data;
                var resposta = $.trim(conf);
                
                if(resposta == "true"){
                    $('#icone').remove();
                    $("#noUsuario").val("");
                    $("#noUsuario").after('<img src="/img/structure/errado.png" id="icone" alt="errado" title="errado" />');
                }else{
                    $('#icone').remove();
                    $("#noUsuario").after('<img src="/img/structure/correto.png" id="icone" alt="correto" title="correto" />');
                }
            },
            error: function(xhr,er){                
                new Messi('Não foi possível verificar usuário, por favor entre em contato com o administrador.', {
                    title: 'ERRO'
                });
            }
        });
    });
    
    $('form#cadastrarUsuario input#submit').click(function(e){
        e.preventDefault();
        var serialize = $('form#cadastrarUsuario').serialize();
        var validate = ( $('form#cadastrarUsuario').validationEngine('validate') );
        if(validate == true){
            $.ajax({
                url: '/admin/usuario/cadastrar',
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
                        new Messi('Usuário cadastrado com sucesso!', {
                            title: 'SUCESSO'
                        });
                        $('span.messi-closebtn').click(function(e){
                            location.href="/admin/usuario/listar";
                        });
                    }else{
                        new Messi('Não foi possível cadastrar novo usuário, por favor entre em contato com o administrador.', {
                            title: 'ERRO'
                        });
                    }
                },
                error: function(xhr,er){
                    new Messi('Não foi possível cadastrar novo usuário, por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        }
    });


})


