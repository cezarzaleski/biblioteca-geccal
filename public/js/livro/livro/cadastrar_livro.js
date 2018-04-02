$(function(){
    
    $('input[name="opcao"]').click(function(){
        var opcao = $(this).val();
        $('form fieldset').removeClass('selected');
        if(opcao === "gerarExemplar"){
            $('fieldset#gerarExemplar').addClass('selected');
                    $.ajax({
                        url: '/livro/livro/cadastrar',
                        dataType: 'html',
                        type: 'post',
                        data: {
                            method:"findLivroGerarExemp"
                        },
                        beforeSend: function(){
                        	$.prompt("<div class='loadGif'><img src='/img/structure/load.gif'></img></div>");
                        },
                        complete: function(){
                        	$.prompt.close();
                        },
                        success: function(data, textStatus){
                            $('select#idLivro').html(data);
                        },
                        error: function(xhr,er){
                            new Messi('Não foi possível cadastrar nova editora, por favor entre em contato com o administrador.', {
                                title: 'ERRO'
                            });
                        }
            });

        }else if(opcao === "cadastrarLivro"){
            $('fieldset#cadastrarLivro').addClass('selected');
        }
    });
    
    $("select#autores").chosen({disable_search_threshold: 10});
//    $("select#idEditora").chosen({no_results_text: "Resultado não encontrado!"}); 
    
    $('select#idLivro').change(function(){
        var noLivro = $(this).val();
        if(noLivro[0]){
            $.ajax({
                url: '/livro/livro/cadastrar',
                dataType: 'text',
                type: 'post',
                data: {
                    noLivro: noLivro,
                    method:"findLivro"
                },
                beforeSend: function(){
                	$.prompt("<div class='loadGif'><img src='/img/structure/load.gif'></img></div>");                
                },
                complete: function(){
                	$.prompt.close();
                },
                success: function(data, textStatus){
                    $('fieldset#livro').addClass('selected');
                    var dados=data.split("-"); 
                    var nuEdicao = 'fieldset#livro input#'+dados[0];
                    var nuAno = 'fieldset#livro select#'+$.trim(dados[2])+' option[value="'+dados[3]+'"]';
                    var idOrigemLivro = 'fieldset#livro select#'+$.trim(dados[4])+' option[value="'+dados[5]+'"]';
                    var noObs = 'fieldset#livro textarea[name="'+$.trim(dados[6])+'"]';
                    var nuExemplar = 'fieldset#livro input#'+$.trim(dados[8]);
                    var idEditora = 'fieldset#livro select#'+$.trim(dados[10])+' option[value="'+dados[11]+'"]';
                    
                    var autores="";
                    $(nuEdicao).val(dados[1]);
                    $(nuAno).attr('selected', 'selected'); 
                    $(idOrigemLivro).attr('selected', 'selected'); 
                    $(noObs).val(dados[7]);
                    $(nuExemplar).val(dados[9]);
                    $(idEditora).attr('selected', 'selected'); 
                    
                    for(i=12; i < dados.length; i++){
                        if(i===12){
                            autores+=dados[i];
                        }else{
                            autores+="-"+dados[i];
                        }
                    }
                    $('fieldset#livro input#autores').val(autores);
                    $('fieldset#livro input#submit').val("Gerar Exemplar");
                    
                },
                error: function(xhr,er){                
                    new Messi('Não foi possível gerar exemplat do livro, por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        }
    });
  
    $('fieldset#cadastrarLivro input#submit').click(function(e){
        e.preventDefault();
        var validate = ( $('form#cadastrarLivro').validationEngine('validate') );
        if(validate === true){
            var autores = $("select#autores").val();
            if(autores){
                var noLivro = $('form#cadastrarLivro #noLivro').val();
                var nuEdicao = $('form#cadastrarLivro #nuEdicao').val();
                var nuAno = $('form#cadastrarLivro #nuAno').val();
                var idOrigemLivro = $('form#cadastrarLivro #idOrigemLivro').val();
                var idEditora = $('form#cadastrarLivro #idEditora').val();
                var noObs = $('form#cadastrarLivro #noObs').val();
                $.ajax({
                    url: '/livro/livro/cadastrar',
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
                        method:"cadastrar"
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
                            $('#noLivro, #nuEdicao, #nuAno, #idOrigemLivro, #idEditora, #noObs').val("");
                                $("select#autores").val('').trigger("chosen:updated");
                            new Messi('Livro cadastrado com sucesso!', {
                                title: 'SUCESSO'
                            });
                        }else{
                            new Messi('Não a foi possível cadastrar o livro, por favor entre em contato com o administrador.', {
                                title: 'ERRO'
                            });
                        }
                    },
                    error: function(xhr,er){
                        new Messi('Não foi possível cadastrar o livro, por favor entre em contato com o administrador.', {
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
    
        $('fieldset#livro input#submit').click(function(e){
            e.preventDefault();
            var autores = $('form#cadastrarLivro fieldset#livro #autores').val();
            var validate = ( $('form#cadastrarLivro').validationEngine('validate') );
            if(validate === true){
                var noLivro = $('form#cadastrarLivro fieldset#gerarExemplar #idLivro').find('option:selected').text();
                var nuEdicao = $('form#cadastrarLivro fieldset#livro #nuEdicao').val();
                var nuAno = $('form#cadastrarLivro fieldset#livro #nuAno').val();
                var idOrigemLivro = $('form#cadastrarLivro fieldset#livro #idOrigemLivro').val();
                var autores = $('form#cadastrarLivro fieldset#livro #autores').val();
                var noObs = $('form#cadastrarLivro fieldset#livro #noObs').val();
                var idEditora = $('form#cadastrarLivro fieldset#livro #idEditora').val();
                var nuExemplar = $('form#cadastrarLivro fieldset#livro #nuExemplar').val();
                $.ajax({
                    url: '/livro/livro/cadastrar',
                    dataType: 'html',
                    type: 'post',
                    data: {
                        autores: autores,
                        noLivro: noLivro,
                        idEditora: idEditora,
                        nuEdicao: nuEdicao,
                        nuAno: nuAno,
                        idOrigemLivro: idOrigemLivro,
                        noObs: noObs,
                        nuExemplar: nuExemplar,
                        method:"gerarExemplar"
                    },
                    beforeSend: function(){
                    	$.prompt("<div class='loadGif'><img src='/img/structure/load.gif'></img></div>");
                    },
                    complete: function(){
                    	$.prompt.close();
                    },
                    success: function(data, textStatus){
                    	var obj = $.parseJSON(data);
                    	
                    	if(obj.st === "true"){
                            $('#idLivro, #nuEdicao, #nuAno, #idOrigemLivro, #idEditora, #noObs').val("");
                            $('select#cadastrarLivro').multiSelect('deselect_all');
                            new Messi('Número do exemplar gerado: '+obj.nuExemplar, {
                                title: 'SUCESSO'
                            });
                        }else{
                            new Messi('Não a foi possível gerar exemplar, por favor entre em contato com o administrador.', {
                                title: 'ERRO'
                            });
                        }
                    },
                    error: function(xhr,er){
                        new Messi('Não a foi possível gerar exemplar, por favor entre em contato com o administrador.', {
                            title: 'ERRO'
                        });
                    }
                });
            }else{
                new Messi('Por favor selecione pelo menos um autor para o livro.', {
                    title: 'ERRO'
                });
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
                url: "/livro/livro/cadastrar",
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
                    if(retorno==="select#autores"){
                        $("select#autores").trigger("chosen:updated");
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
    
    $('form#cadastrarLivro p.cadastroExterno a#cadEditora').click(function(e){
        e.preventDefault();
        popup("/livro/editora/cadastrar","editora","form#cadastrarLivro select#idEditora");
    });
    
    $('form#cadastrarLivro p.cadastroExterno a#cadAutor').click(function(e){
        e.preventDefault();
        $('select#cadastrarLivro').multiSelect('deselect_all');
        popup("/livro/autor/cadastrar","autor","select#autores");
    });
    
    $('a.deselectAll').click(function(){
        $('select#cadastrarLivro').multiSelect('deselect_all');
        return false;
    });
});
