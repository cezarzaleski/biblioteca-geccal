$(function(){
    
    $('form#autenticacao').validationEngine();      
        
    $('input#submit').click(function(e){
        e.preventDefault();
        var serialize = $('form#autenticacao').serialize();
        var validate = ( $('form#autenticacao').validationEngine('validate') );
        if(validate === true){
            $.ajax({
                url: '/autenticacao/index/login',
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
                        location.href="/padrao/index";
                    }else{
                        new Messi('Nome de usuário ou senha incorretos, por favor tente novamente.', {
                            title: 'Erro'
                        });
                    }
                },
                error: function(xhr,er){
                    new Messi('Não foi possível verificar permissão de acesso, por favor entre em contato com o Administrador.', {
                        title: 'Erro'
                    });
                }
            });
        }
    });
	

})
