$(function(){
  
    $('input#submit').click(function(e){
        e.preventDefault();
        //var serialize = $('form#cadastrarPerfil').serialize();
        var validate = ( $('form#cadastrarPerfil').validationEngine('validate') );
        if(validate === true){
            var funcionalidades = new Array();
            $("div.ms-selection ul li").each(function() {
                funcionalidades.push($(this).attr('ms-value'));
            });
            var noPerfil = $('form#cadastrarPerfil #noPerfil').val();
            $.ajax({
                url: '/admin/perfil/cadastrar',
                dataType: 'html',
                type: 'post',
                data: {
                    funcionalidades: funcionalidades,
                    noPerfil: noPerfil
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
                        
                        new Messi('Perfil cadastrado com sucesso!', {
                            title: 'SUCESSO'
                        });
                        $('span.messi-closebtn').click(function(e){
                            location.href="/admin/perfil/listar";
                            });
                    }else{
                        new Messi('Não foi possível cadastrar novo perfil, por favor entre em contato com o administrador.', {
                            title: 'ERRO'
                        });
                    }
                },
                error: function(xhr,er){
                    new Messi('Não foi possível cadastrar novo perfil, por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        }
    });
});


