$(function(){

//$("select#idTurma").chosen({no_results_text: "Resultado não encontrado!"});
	//$.prompt("<div class='loadGif'><img src='/img/structure/11.gif'><img></div>");
    var data = new Date();
    $("input#dtEmprestimo").mask("99/99/9999");    
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
    };
    
    var verificaPendencia = function(id, opcao){
        if(id && opcao){
            $.ajax({
                url: '/livro/emprestimo/cadastrar',
                dataType: 'text',
                type: 'post',
                data: {
                    id: id,
                    method:"findPendencia",
                    opcao: opcao
                },
                beforeSend: function(){
                    
                },
                complete: function(){
                    
                }, 
                success: function(data, textStatus){
                    var conf = data;
                    var confirm = $.trim(conf);
                    
                    $('<input>').attr({
                        type: 'hidden', 
                        id: 'devLivro', 
                        name: 'devLivro'
                    }).val('').appendTo('.form');
                	
                    if(confirm > 0 || confirm === ('-1')){
                        $('div#mensagem').show();
                        if(confirm == 1){
                            $('input#devLivro').val('1');
                            $("div#mensagem img").attr('src', '/img/structure/atencao.png');
                            $('div#mensagem p').css("color",'#eaaf51');
                            if(opcao === "evangelizando"){
                                $('div#mensagem p').text('Evangelizando(a) com 1 empréstimo em aberto');
                            }else if(opcao === "colaborador"){
                                $('div#mensagem p').text('Colaborador(a) com 1 empréstimo em aberto');
                            }
                        }else if(confirm == 2){
                            $('input#devLivro').val('2');
                            $("div#mensagem img").attr('src', '/img/structure/atention.png');
                            $('div#mensagem p').css("color",'#cd0a0a');
                            if(opcao === "evangelizando"){
                                $('div#mensagem p').text('Evangelizando(a) com 2 empréstimos em aberto e impossibilitado de realizar\n\
                                                        novo empréstimo. Favor verificar.');
                            }else if(opcao === "colaborador"){
                                $('div#mensagem p').text('Colaborador(a) com 2 empréstimos em aberto e impossibilitado de realizar\n\
                                                        novo empréstimo. Favor verificar.');
                            }
                        }else if(confirm > 2){
                            $('input#devLivro').val('3');
                            $("div#mensagem img").attr('src', '/img/structure/atention.png');
                            $('div#mensagem p').css("color",'#cd0a0a');
                            if(opcao === "evangelizando"){
                                $('div#mensagem p').text('Evangelizando(a) com mais de 2 empréstimos em aberto e impossibilitado de realizar\n\
                                                        novo empréstimo. Favor verificar.');
                            }else if(opcao === "colaborador"){
                                $('div#mensagem p').text('Colaborador(a) com mais de 2 empréstimos em aberto e impossibilitado de realizar\n\
                                                        novo empréstimo. Favor verificar.');
                            }
                            
                        }else if(confirm === ('-1')){
                            $('input#devLivro').val('2');
                            $("div#mensagem img").attr('src', '/img/structure/atention.png');
                            $('div#mensagem p').css("color",'#cd0a0a');
                            if(opcao === "evangelizando"){
                                $('div#mensagem p').text('Evangelizando(a) com empréstimo(s) em aberto de ano(s) anterior(es) e impossibilitado de realizar\n\
                                                        novo empréstimo. Favor verificar.');
                            }else if(opcao === "colaborador"){
                            	$('div#mensagem p').text('Colaborador(a) com empréstimo(s) em aberto de ano(s) anterior(es) e impossibilitado de realizar\n\
                                                        novo empréstimo. Favor verificar.');
                            }
                        }
                    }else{
                        $('div#mensagem').hide();
                        $('input#devLivro').val('0');
                    }
                                        
                },
                error: function(xhr,er){                
                    new Messi('Erro interno, por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        }else{
            $('div#mensagem').hide();
        }
    };
    
    
    
    var addDias = function(){
        var novaData = $('#dtEmprestimo').sumdate({
            functions:['sum'],
            "sumValues":{
                "days":7
            },
            pattern:'DD/MM/YYYY'
        });
        return novaData;
    };
    
    var diaAtual =  dia(data.getDate())+"/"+mes((data.getMonth())+1)+"/"+data.getFullYear();
    $('input[name="dtEmprestimo"]').val(diaAtual);
    var novaData = addDias();
    
    $('input[name="dtPrevDevolucao"]').val(novaData);
    
    $('input[name="opcao"]').click(function(){
        $('div#mensagem').hide();
        var opcao = $(this).val();
        $('form fieldset').removeClass('selected');
        $('select#idColaborador, select#idLivro, select#idTurma').val("");
        $("select#noEvangelizando").html('<option label="Selecione a turma..." value="">Selecione a turma...</option>');
        $("div#nuExemplar").hide();
        if(opcao === "evangelizando"){
            $('fieldset#evangelizando').addClass('selected');
                    
        }else if(opcao === "colaborador"){
            $('fieldset#colaborador').addClass('selected');
        }
    });
    
    $('input[name="dtEmprestimo"]').blur(function(){
        var dataEmp = $(this).val();
        if(dataEmp){
            var novaData = addDias();
            $('input[name="dtPrevDevolucao"]').val(novaData);
        }else{
            $('input[name="dtPrevDevolucao"]').val('');
        }
        
    });
        
    $('select#idTurma').change(function(){
        var idTurma = $(this).val();
        if(idTurma){
            $.ajax({
                url: '/livro/emprestimo/cadastrar',
                dataType: 'text',
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
        }else{
            $('fieldset#evangelizandoTurma').removeClass('selected');
        }
    });
    
    $('select#noEvangelizando').change(function(){
        var id = $(this).val();
        verificaPendencia(id, "evangelizando");
    });
    
    $('select#idColaborador').change(function(){
        var id = $(this).val();
        verificaPendencia(id, "colaborador");
    });
    
    $('select#idLivro').change(function(){
        var noLivro = $(this).val();
        if(noLivro){
            $.ajax({
                url: '/livro/emprestimo/cadastrar',
                dataType: 'text',
                type: 'post',
                data: {
                    noLivro: noLivro,
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
       
        var validate = ( $('form#cadastrarEmprestimo').validationEngine('validate') );
        var devLivro = $("input#devLivro").val();
        var nuLivro = $("form#cadastrarEmprestimo fieldset.selected select#nuExemplar").val();
        $("select#nuExemplar").val(nuLivro);
                
        if(validate === true){
            if(devLivro < 2){
                $("input#dtPrevDevolucao").removeAttr('disabled');
                $("select#nuExemplar").css("display","block");
                $('<input>').attr({
                    type: 'hidden', 
                    id: 'method', 
                    name: 'method'
                }).val('save').appendTo('.form');
		
                $("input#dtEmprestimo").val($("input#dtEmprestimo").val());
                var serialize = $('form#cadastrarEmprestimo').serialize();

                $.ajax({
                    url: '/livro/emprestimo/cadastrar',
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
                            $('#noAutor').val("");
                            new Messi('Emprétimo cadastrado com sucesso!', {
                                title: 'SUCESSO'
                            });
                            $('span.messi-closebtn').click(function(e){
                                location.href="/livro/emprestimo/cadastrar";
                            });
                        }else{
                            new Messi('Não foi possível cadastrar novo empréstimo, por favor entre em contato com o administrador.', {
                                title: 'ERRO'
                            });
                        }
                    },
                    error: function(xhr,er){
                        new Messi('Não foi possível cadastrar novo empréstimo, por favor entre em contato com o administrador.', {
                            title: 'ERRO'
                        });
                    }
                });
            }else{
                new Messi('Não foi possível cadastrar novo empréstimo para o(a) evangelizando(a), devido o\n\
                            mesmo possuir 2 empréstimos pendentes. Favor verificar.', {
                    title: 'ERRO'
                });
            }
        }
    });
    
    $('a.pendencia').click(function(e){
        e.preventDefault();
        var opcao = $('input[name="opcao"]:checked').val();
        var id;
        var url="/livro/emprestimo/listar/method/listar/opcao/"+opcao;
        if(opcao==="evangelizando"){
            id = $('select#noEvangelizando').val();
            url +="/origem/cadastrar";
        }else if (opcao==="colaborador"){
            id = $('select#idColaborador').val();
        }
        url +="/"+opcao+"/"+id+"/emprestimo/emprestado";
        
        var width = 1200;
        var height = 600;
        var left = 99;
        var top = 99;
 
        var janela = window.open(url,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
        janela.focus();
        
        janela.onbeforeunload = function() {
            verificaPendencia(id, opcao);
        };
    });


});
