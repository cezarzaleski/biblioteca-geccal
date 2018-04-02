$(function(){
  
    $('input#submit').click(function(e){
        e.preventDefault();
        //var serialize = $('form#editarPerfil').serialize();
        var validate = ( $('form#editarPerfil').validationEngine('validate') );
        if(validate === true){
            var funcionalidades = new Array();
            $("div.ms-selection ul li").each(function() {
                funcionalidades.push($(this).attr('ms-value'));
            });
            var noPerfil = $('form#editarPerfil #noPerfil').val();
            var idPerfil = $('form#editarPerfil input#idPerfil').val();
            
            $.ajax({
                url: '/admin/perfil/editar',
                dataType: 'html',
                type: 'post',
                data: {
                    funcionalidades: funcionalidades,
                    noPerfil: noPerfil,
                    idPerfil: idPerfil
                },
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
                        new Messi('Perfil alterado com sucesso!', {
                            title: 'SUCESSO'
                        });
                        $('span.messi-closebtn').click(function(e){
                            location.href="/admin/perfil/listar";
                        });
                    }else{
                        new Messi('Não foi possível alterar perfil, por favor entre em contato com o administrador.', {
                            title: 'ERRO'
                        });
                    }
                },
                error: function(xhr,er){
                    new Messi('Não foi possível alterar perfil, por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        }
    });
});


