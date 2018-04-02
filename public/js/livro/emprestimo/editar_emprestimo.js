$(function(){
    
    $('input[name="opcao"]').attr("disabled","disabled");
    $('#dtPrevDevolucao,#idLivro').removeClass('validate[required]');
    
    var opcaoForm = function(opcao){
        $('form#editarEmprestimo fieldset').removeClass('selected');
        if(opcao === "evangelizando"){
            $('fieldset#evangelizando').addClass('selected');
        }else if(opcao === "colaborador"){
            $('fieldset#colaborador').addClass('selected');
        }
    };
    opcaoForm($('input[name="opcao"]:checked').val());
    
    data = new Date();
    $("input#dtEmprestimo").mask("99/99/9999");    
    dia = function(dia){
        if(dia < 10){
            dia="0"+dia;
        }
        return dia;
    };
    
    mes = function(mes){
        if(mes < 10){
            mes="0"+mes;
        }
        return mes;
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
    
    $('input[name="dtEmprestimo"]').blur(function(){
        var dataEmp = $(this).val();
        if(dataEmp){
            var novaData = addDias();
            $('input[name="dtPrevDevolucao"]').val(novaData);
        }else{
            $('input[name="dtPrevDevolucao"]').val('');
        }
        
    });
    
    
    $('select#idLivro').change(function(){
        var noLivro = $(this).val();
        if(noLivro){
            $.ajax({
                url: '/livro/emprestimo/editar',
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
        $('input[name="opcao"]').removeAttr("disabled");
        var opcao = $('input[name="opcao"]:checked').val();
        var nuLivro = $("form#editarEmprestimo fieldset.selected select#nuExemplar").val();
        var dtEmprestimo = $("form#editarEmprestimo fieldset.selected input#dtEmprestimo").val();
        $("select#nuExemplar").val(nuLivro);
        $("input#dtEmprestimo").val(dtEmprestimo);
        $("input#dtPrevDevolucao").removeAttr('disabled');
        var serialize = $("form#editarEmprestimo").serialize();
        var validate = $("form#editarEmprestimo").validationEngine('validate');
        if(validate === true){
            $.ajax({
                url: '/livro/emprestimo/editar',
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
                        new Messi('Empréstimo alterado com sucesso!', {
                            title: 'SUCESSO'
                        });
                        $('span.messi-closebtn').click(function(e){
                            location.href="/livro/emprestimo/listar/opcao/"+opcao;
                        });
                    }else{
                        new Messi('Não foi possível alterar o empréstimo, por favor entre em contato com o administrador.', {
                            title: 'ERRO'
                        });
                    }
                },
                error: function(xhr,er){
                    new Messi('Não foi possível alterar o empréstimo, por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        }else{
            
        }
    });
});


