$(function(){
    var noUsuarioAntigo = $(this).val();
    $('form#editarUsuario input#noUsuario').change(function(e){
        var noUsuario = $(this).val();
        if(noUsuarioAntigo != noUsuario){
            $.ajax({
                url: '/admin/usuario/editar',
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
                    $.prompt("Não foi possível listar os usuários, por favor entre em contato com o administrador.");
                }
            });
        }
    });
    
    $('#alterSenha').click(function(){
        if($(this).attr('checked')){
            $('#noSenha').removeAttr('disabled');
            $('#noSenha').css('background', 'white');
            $('#noSenha').addClass('validate[required]');
        }else{
            $('#noSenha').val("");
            $('#noSenha').css('background', '#dad7d7');
            $('#noSenha').attr('disabled', 'disabled');
            $('#noSenha').removeClass('validate[required]');
        }
    });
    
    $('input#submit').click(function(e){
        e.preventDefault();
        var serialize = $('form#editarUsuario').serialize();
        var validate = ( $('form#editarUsuario').validationEngine('validate') );
        if(validate == true){
            $.ajax({
                url: '/admin/usuario/editar',
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
                        new Messi('Usuário alterado com sucesso!', {
                            title: 'SUCESSO'
                        });
                        $('span.messi-closebtn').click(function(e){
                            location.href="/admin/usuario/listar";
                        });
                    }else{
                        new Messi('Não foi possível alterar o usuário, por favor entre em contato com o administrador.', {
                            title: 'ERRO'
                        });
                    }
                },
                error: function(xhr,er){
                    new Messi('Não foi possível alterar o usuário, por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        }
    });


})


