$(function(){
    $("select#editarLivro").chosen({disable_search_threshold: 10});
  
    $('input#submit').click(function(e){
        e.preventDefault();
        var validate = ( $('form#editarLivro').validationEngine('validate') );
        if(validate === true){
            var autores = $("select#editarLivro").val();
            if(autores){
                var noLivro = $('form#editarLivro #noLivro').val();
                var nuEdicao = $('form#editarLivro #nuEdicao').val();
                var nuAno = $('form#editarLivro #nuAno').val();
                var idOrigemLivro = $('form#editarLivro #idOrigemLivro').val();
                var idEditora = $('form#editarLivro #idEditora').val();
                var noObs = $('form#editarLivro #noObs').val();
                var idLivro = $('form#editarLivro #idLivro').val();
            
            
                $.ajax({
                    url: '/livro/livro/editar',
                    dataType: 'html',
                    type: 'post',
                    data: {
                        autores: autores,
                        noLivro: noLivro,
                        nuEdicao: nuEdicao,
                        nuAno: nuAno,
                        idOrigemLivro: idOrigemLivro,
                        idEditora: idEditora,
                        noObs: noObs,
                        idLivro:idLivro
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
                            new Messi('Livro alterado com sucesso!', {
                                title: 'SUCESSO'
                            });
                            $('span.messi-closebtn').click(function(e){
                                location.href="/livro/livro/listar";
                            });
                        }else{
                            new Messi('Não foi possível alterar livro, por favor entre em contato com o administrador.', {
                                title: 'ERRO'
                            });
                        }
                    },
                    error: function(xhr,er){
                        new Messi('Não foi possível alterar livro, por favor entre em contato com o administrador.', {
                            title: 'ERRO'
                        });
                    }
                });
            }else{
                new Messi('Por favor selecione pelo menos um autor para o livro.', {
                    title: 'ERRO'
                });
            }
        }
    });
    
    var popup = function(url,method,retorno){
        var width = 1200;
        var height = 600;
        var left = 99;
        var top = 99;
 
        var janela = window.open(url,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
        janela.focus();
        // verifica se a janela está aberta
        janela.onbeforeunload = function() {
            $.ajax({
                url: "/livro/livro/editar",
                dataType: 'html',
                type: 'post',
                data: {
                    method: method
                },
                beforeSend: function(){
                    
                },
                complete: function(){
                                        
                },
                success: function(data, textStatus){
                    $(retorno).html(data);
                    if(retorno==="select#editarLivro"){
                        $("select#editarLivro").trigger("chosen:updated");
                    }
                    
                },
                error: function(xhr,er){
                    new Messi('Não foi possível excluir autor, por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        };
    };
    
    $('form#editarLivro p.cadastroExterno a#cadEditora').click(function(e){
        e.preventDefault();
        popup("/livro/editora/cadastrar","editora","form#editarLivro select#idEditora");
    });
    
    $('form#editarLivro p.cadastroExterno a#cadAutor').click(function(e){
        e.preventDefault();
        $('select#editarLivro').multiSelect('deselect_all');
        popup("/livro/autor/cadastrar","autor","select#editarLivro");
    });

$('a.deselectAll').click(function(){
        $('select#editarLivro').multiSelect('deselect_all');
        return false;
    });
});