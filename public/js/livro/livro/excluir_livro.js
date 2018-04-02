$(function(){
          
    $('button.btn').click(function(e){
        allert("aqui");
        return;
        var code = new Array();
        $("td input[type=checkbox]:checked").each(function() {
            code.push($(this).attr('rel'));
           
        });
        var motivo = $('#motivoExclusao').val();
        if(motivo !==""){
            $.ajax({
                url: '/livro/livro/excluir',
                dataType: 'html',
                type: 'post',
                data: {
                    code: code, 
                    noMotivoExclusao: motivo
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
                        new Messi('Livro(s) excluido(s) com sucesso!', {
                            title: 'SUCESSO'
                        });
                        $('span.messi-closebtn').click(function(e){
                            location.href="/livro/livro/listar";
                        });
                    }else{
                        new Messi('Não foi possível excluir livro(s), por favor entre em contato com o administrador.', {
                            title: 'ERRO'
                        });
                    }
                },
                error: function(xhr,er){
                    new Messi('Não foi possível excluir livro(s), por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        }else{
            new Messi('Por favor preencha o motivo da exclusão.', {
                title: 'ALERTA'
            });
        }
    });
});