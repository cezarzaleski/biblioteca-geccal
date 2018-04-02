$(function(){
    $("input#dtInicio,input#dtFim ").mask("99/99/9999");
    $('input#submit').click(function(e){
        e.preventDefault();
        var validate = ( $('form#cadastrarTurma').validationEngine('validate') );
        if(validate === true){
            var colaboradores = new Array();
            $("div.ms-selection ul li").each(function() {
                colaboradores.push($(this).attr('ms-value'));
            });
            
            if(colaboradores[0]){
                var idCiclo = $('form#cadastrarTurma #idCiclo').val();
                var dtInicio = $('form#cadastrarTurma #dtInicio').val();
                var dtFim = $('form#cadastrarTurma #dtFim').val();
                var nuIdadeMinima = $('form#cadastrarTurma #nuIdadeMinima').val();
                var nuIdadeMaxima = $('form#cadastrarTurma #nuIdadeMaxima').val();
                var noObs = $('form#cadastrarTurma #noObs').val();
                $.ajax({
                    url: '/admin/turma/cadastrar',
                    dataType: 'html',
                    type: 'post',
                    data: {
                        idCiclo: idCiclo,
                        dtInicio: dtInicio,
                        dtFim: dtFim,
                        nuIdadeMinima: nuIdadeMinima,
                        nuIdadeMaxima: nuIdadeMaxima,
                        noObs: noObs,
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
                            
                            new Messi('Turma cadastrada com sucesso!', {
                                title: 'SUCESSO'
                            });
                            $('span.messi-closebtn').click(function(e){
                                location.href="/admin/turma/listar";
                                });
                        }else{
                            new Messi('Não foi possível cadastrar nova turma, por favor entre em contato com o administrador.', {
                                title: 'ERRO'
                            });
                        }
                    },
                    error: function(xhr,er){
                        new Messi('Não foi possível cadastrar nova turma, por favor entre em contato com o administrador.', {
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
        $('select#cadastrarTurma').multiSelect('deselect_all');
        return false;
    });
});


