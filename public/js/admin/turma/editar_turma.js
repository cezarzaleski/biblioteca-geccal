$(function(){
  
    $('input#submit').click(function(e){
        e.preventDefault();
        var validate = ( $('form#editarTurma').validationEngine('validate') );
        if(validate === true){
            var colaboradores = new Array();
            $("div.ms-selection ul li").each(function() {
                colaboradores.push($(this).attr('ms-value'));
            });
            if(colaboradores){
                var idCiclo = $('form#editarTurma #idCiclo').val();
                var dtInicio = $('form#editarTurma #dtInicio').val();
                var dtFim = $('form#editarTurma #dtFim').val();
                var nuIdadeMinima = $('form#editarTurma #nuIdadeMinima').val();
                var nuIdadeMaxima = $('form#editarTurma #nuIdadeMaxima').val();
                var noObs = $('form#editarTurma #noObs').val();
                var idTurma = $('form#editarTurma #idTurma').val();
                $.ajax({
                    url: '/admin/turma/editar',
                    dataType: 'html',
                    type: 'post',
                    data: {
                        idCiclo: idCiclo,
                        dtInicio: dtInicio,
                        dtFim: dtFim,
                        nuIdadeMinima: nuIdadeMinima,
                        nuIdadeMaxima: nuIdadeMaxima,
                        noObs: noObs,
                        idTurma: idTurma,
                        colaboradores: colaboradores
                       
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
                            new Messi('Turma alterada com sucesso!', {
                                title: 'SUCESSO'
                            });
                            $('span.messi-closebtn').click(function(e){
                                location.href="/admin/turma/listar";
                            });
                        }else{
                            new Messi('Não foi possível alterar turma, por favor entre em contato com o administrador.', {
                                title: 'ERRO'
                            });
                        }
                    },
                    error: function(xhr,er){
                        new Messi('Não foi possível alterar turma, por favor entre em contato com o administrador.', {
                            title: 'ERRO'
                        });
                    }
                });
            }else{
                new Messi('Por favor, selecione pelo menos um colaborador para a Turma.', {
                    title: 'ERRO'
                });
            }
        }
    });
    
    $('a.deselectAll').click(function(){
        $('select#editarTurma').multiSelect('deselect_all');
        return false;
    });
});


