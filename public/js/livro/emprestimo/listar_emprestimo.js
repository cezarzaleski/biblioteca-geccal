$(function(){
    
    //formatação formulário de pesquisar emprétimo
    $('input[type=submit]').val('Pesquisar');
    $('#idTurma,#noEvangelizando, #idColaborador, #idLivro, #nuExemplar').removeClass('validate[required]');
    $('select#idTurma').html('<option value="">Selecione o Ano</option>');
    //determinar qual formulario sera visualizado
    var opcaoForm = function(opcao){
        $('form#listarEmprestimo fieldset').removeClass('selected');
        $('table.tabela').removeClass('selected');
        if(opcao === "evangelizando"){
            $('fieldset#evangelizando').addClass('selected');
            $('table#evangelizando').addClass('selected');
        }else if(opcao === "colaborador"){
            $('fieldset#colaborador').addClass('selected');
            $('table#colaborador').addClass('selected');
        }else if(opcao==="livro"){
            $('fieldset#livro').addClass('selected');
            $('table#livro').addClass('selected');
            $('div#nuExemplar').hide();
        }
    };
    
    $('label[for="idTurma"]').text("Turma:");
    $('label[for="noEvangelizando"]').text("Evangelizando:");
    $('label[for="idColaborador"]').text("Colaborador:");
    $('label[for="idLivro"]').text("Livro:");
    
    
    opcaoForm($('input[name="opcao"]:checked').val());
    $('input[name="opcao"]').click(function(){
        var opcao = $(this).val();
        opcaoForm(opcao);
    });
    
    var dia = function(dia){
        if(dia < 10){
            dia="0"+dia;
        }
        return dia;
    };
    
    var mes = function(mes){
        if(mes < 10){
            mes="0"+mes;
        }
        return mes;
    }
    //busca de turmas do ano informado
    $('select#nuAnoEvangelizando').change(function(){
        var nuAno = $(this).val();
        if(nuAno){
            $.ajax({
                url: '/livro/emprestimo/listar',
                dataType: 'html',
                type: 'post',
                data: {
                    nuAno: nuAno,
                    method:"findTurma"
                },
                beforeSend: function(){
                	$.prompt("<div class='loadGif'><img class='teste' src='/img/structure/load.gif'></img></div>");
                },
                complete: function(){
                	$.prompt.close();
                },
                success: function(data, textStatus){
                    $('fieldset#evangelizandoTurma').addClass('selected');
                    $('select#idTurma').html(data);
                
                },
                error: function(xhr,er){                
                    new Messi('Erro interno, por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        }else{
            $('fieldset#evangelizandoTurma').removeClass('selected');
            $('select#idTurma').html('<option value="">Selecione o Ano</option>');
        }
    });
    
    $('select#idTurma').change(function(){
        var idTurma = $(this).val();
        $.ajax({
            url: '/livro/emprestimo/listar',
            dataType: 'html',
            type: 'post',
            data: {
                idTurma: idTurma,
                method:"findEvangelizando"
            },
            beforeSend: function(){
            	$.prompt("<div class='loadGif'><img src='/img/structure/load.gif'></img></div>");
            },
            complete: function(){
            	$.prompt.close();
            },
            success: function(data, textStatus){
            	$('fieldset#evangelizandoTurma').addClass('selected');
                $('select#noEvangelizando').html(data);
                
            },
            error: function(xhr,er){                
                new Messi('Erro interno, por favor entre em contato com o administrador.', {
                    title: 'ERRO'
                });
            }
        });
    });
    
    //buscar exemplares do livro
    $('select#idLivro').change(function(){
        var idLivro = $(this).val();
        if(idLivro){
            $.ajax({
                url: '/livro/emprestimo/listar',
                dataType: 'html',
                type: 'post',
                data: {
                    idLivro: idLivro,
                    method:"findExemplar"
                },
                beforeSend: function(){
                	$.prompt("<div class='loadGif'><img src='/img/structure/load.gif'></img></div>");
                },
                complete: function(){
                	$.prompt.close();
                }, 
                success: function(data, textStatus){
                    $('div#nuExemplar').show();
                    $('select#nuExemplar').html(data);
                },
                error: function(xhr,er){                
                    new Messi('Erro interno, por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        }else{
            $('div#nuExemplar').hide();
        }
    });
    
    $('input#submit').click(function(e){
        e.preventDefault();
        var validate = $("form#listarEmprestimo").validationEngine('validate');
        if(validate === true){
            var opcao = $('input[name="opcao"]:checked').val();
            var url = "/livro/emprestimo/listar/method/listar/opcao/"+opcao;
            var nuAno;
            var stEmprestimo="all";
            var cont = 0;
            $("input[name='stEmprestimo[]']:checked").each(function() {
                cont ++;
                stEmprestimo= $(this).val();
            });
            if(cont ===2){
                stEmprestimo="all";
            }
            if(opcao ==="evangelizando"){
                nuAno = $("#nuAnoEvangelizando option:selected").val();
                var idTurma = $("#idTurma option:selected").val();
                var idEvangelizando = $("#noEvangelizando option:selected").val();
                if(nuAno){
                    url +="/ano/"+nuAno;
                }
                if(idTurma){
                    url +="/turma/"+idTurma;
                }
                if(idEvangelizando){
                    url +="/evangelizando/"+idEvangelizando;
                }
            }else if(opcao ==="colaborador"){
                nuAno = $("#nuAnoColaborador option:selected").val();
                var idColaborador = $("#idColaborador option:selected").val();
                if(nuAno){
                    url +="/ano/"+nuAno;
                }
                if(idColaborador){
                    url +="/colaborador/"+idColaborador;
                }
            }else if(opcao ==="livro"){
                var idLivro = $("#nuExemplar option:selected").val();
                var noLivro = $("#idLivro option:selected").val();
                if(noLivro){
                    url +="/livro/"+noLivro;
                }
                if(idLivro){
                    url +="/exemplar/"+idLivro;
                }
            }
            url+='/emprestimo/'+stEmprestimo;
            location.href=url;
        }
    });

    var option = true;
    $('td input[type=checkbox]').click(function() {
        var idCheck = $(this).attr('rel');
        option = false;
        var check = false;
        $("td input[type=checkbox]:checked").each(function() {
            check = true;
        });
        if(check){
            $('td[rel="'+idCheck+'"]').each(function() {
                if($(this).text()==="Ativo"){
                    $('a#updateLivro').show();
                    $('a#excluir').show();
                }
            });
        }else{
            $('a#updateLivro').hide();
            $('a#excluir').hide();
            
        }
    });
    $('tbody tr td.link').click(function() {
        option = true;
    });
    $('tbody tr.pointer').click(function() {
        var id = $(this).attr('rel');
        if(option){
            location.href="/livro/emprestimo/editar/id/"+id;
        }
    });
    
    $('a#excluir').click(function(e) {
        e.preventDefault();
        new Messi('Tem certeza que deseja excluir o(s) empréstimo(s)?', {
            title: 'Excluir Empréstimo', 
            buttons: [{
                id: 0, 
                label: 'Sim', 
                val: 'ok'
            }, {
                id: 1, 
                label: 'Não', 
                val: ''
            }]
        });
        $('button.btn').click(function(e) {
            var code = new Array();
            $("td input[type=checkbox]:checked").each(function() {
                if($(this).attr('rel')){
                    code.push($(this).attr('rel'));
                }
            });
            if($(this).text()==="Sim"){
            
                if(code.length){
                    $.ajax({
                        url: '/livro/emprestimo/excluir',
                        dataType: 'html',
                        type: 'post',
                        data: {
                            code: code
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
                                new Messi('Empréstimo(s) excluído(s) com sucesso!', {
                                    title: 'SUCESSO'
                                });
                                $('span.messi-closebtn').click(function(e){
                                    location.reload();
                                });
                            }else{
                                new Messi('Não foi possível excluir o empréstimo, por favor entre em contato com o administrador.', {
                                    title: 'ERRO'
                                });
                            }
                        },
                        error: function(xhr,er){
                            new Messi('Não foi possível excluir o empréstimo, por favor entre em contato com o administrador.', {
                                title: 'ERRO'
                            });
                        }
                    });
                }
            }
        });
    
    });
    
    $('a#updateLivro').click(function(e) {
        e.preventDefault();
        var code = new Array();
        $("td input[type=checkbox]:checked").each(function() {
            if($(this).attr('rel')){
                code.push($(this).attr('rel'));
            }
        });
        
                
        new Messi('<input name="dtDevolucao" id="dtDevolucao" type="text">', {
            title: 'Data de Devolução', 
            buttons: [{
                id: 0, 
                label: 'OK', 
                val: 'ok'
            }, {
                id: 1, 
                label: 'Cancelar', 
                val: ''
            }]
        });
        var date = new Date();
        var dt =  dia(date.getDate())+"/"+mes((date.getMonth())+1)+"/"+date.getFullYear();
        $("div.messi-content input#dtDevolucao").mask("99/99/9999");    
        $("div.messi-content input#dtDevolucao").val(dt);
        
        $('button.btn').click(function(e) {
            if($(this).text()==="OK"){
                var dtDevolucao = $("div.messi-content input#dtDevolucao").val();
                if(code.length > 0){
                    $.ajax({
                        url: '/livro/emprestimo/editar',
                        dataType: 'html',
                        type: 'post',
                        data: {
                            code: code,
                            method: "devolucao",
                            dtDevolucao: dtDevolucao
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
                                new Messi('Livro(s) devolvido(s) com sucesso!', {
                                    title: 'SUCESSO'
                                });
                                $('span.messi-closebtn').click(function(e){
                                    location.reload();
                                });
                            }else{
                                new Messi('Não foi possível devolver o(s) livro(s), por favor entre em contato com o administrador.', {
                                    title: 'ERRO'
                                });
                            }
                        },
                        error: function(xhr,er){
                            new Messi('Não foi possível devolver o(s) livro(s), por favor entre em contato com o administrador.', {
                                title: 'ERRO'
                            });
                        }
                    });
                }
            }
        });
    });
});




