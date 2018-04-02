$(function(){
    $('a#matricular').click(function(e) {
        e.preventDefault();
        var code = new Array();
        $("td input[type=checkbox]:checked").each(function() {
            code.push($(this).attr('rel'));
        });
        
        $.ajax({
            url: '/pessoa/matricula/cadastrar',
            dataType: 'text',
            type: 'post',
            data: {
                method:"turma"
            },
            beforeSend: function(){
            	$.prompt("<div class='loadGif'><img src='/img/structure/load.gif'></img></div>");
            },
            complete: function(){
            	$.prompt.close();
            },
            success: function(data, textStatus){
                new Messi(data, {
                    title: 'Escolher Turma', 
                    buttons: [{
                        id: 0, 
                        label: 'Matricular', 
                        val: 'matricular'
                    }, {
                        id: 1, 
                        label: 'Cancelar', 
                        val: ''
                    }]
                });
                $('button.btn').click(function(e) {
                    if($(this).text()==="Matricular"){
                        var turma = $("form#matricular fieldset select").val();
                        if(code.length > 0){
                            if(turma){
                                $.ajax({
                                    url: '/pessoa/matricula/cadastrar',
                                    dataType: 'html',
                                    type: 'post',
                                    data: {
                                        method: "matricular",
                                        idTurma: turma,
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
                                            new Messi('Matricula(s)realizada(s) com sucesso!', {
                                                title: 'SUCESSO'
                                            });
                                            $('span.messi-closebtn').click(function(e){
                                                location.href="/pessoa/matricula/cadastrar";
                                            });
                                        }else{
                                            new Messi('Não foi possível realizar a(s) matrícula(s), por favor entre em contato com o administrador.', {
                                                title: 'ERRO'
                                            });
                                        }
                                    },
                                    error: function(xhr,er){
                                        new Messi('Não foi possível realizar a(s) matrícula(s), por favor entre em contato com o administrador.', {
                                            title: 'ERRO'
                                        });
                                    }
                                });
                            }else{
                                new Messi('Por favor, selecione uma turma para matricular o(s) evangelizando(s).', {
                                    title: 'ERRO'
                                });
                            }
                        }
                    }
                });
            },
            error: function(xhr,er){                
                new Messi('Não foi possível matricular o(s) evangelizando(s), por favor entre em contato com o administrador.', {
                    title: 'ERRO'
                });
            }
        });
        
    
    $('input[name="filtroIdade"]').change(function(){
        var filtroIdade = $(this).val();
        var idTurma = $("select#idTurma").val();
        if(idTurma){
            $.ajax({
                url: '/pessoa/matricula/cadastrar',
                dataType: 'text',
                type: 'post',
                data: {
                    idTurma: idTurma,
                    filtroIdade: filtroIdade,
                    method:"evangelizando"
                },
                beforeSend: function(){
                	$.prompt("<div class='loadGif'><img src='/img/structure/load.gif'></img></div>");
                },
                complete: function(){
                	$.prompt.close();                    
                },
                success: function(data, textStatus){
                    $('form fieldset#cadMatSelect').addClass('selected');
                    $('select#idEvangelizando').html(data);
                },
                error: function(xhr,er){                
                    new Messi('Não foi possível matricular evangelizando, por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        }else{
            $('form fieldset#cadMatSelect').removeClass('selected');
        }
    });
    
    $('select#idTurma').change(function(){
        var idTurma = $(this).val();
        var filtroIdade = $("input[name='filtroIdade']:checked").val();
        if(idTurma){
            $.ajax({
                url: '/pessoa/matricula/cadastrar',
                dataType: 'text',
                type: 'post',
                data: {
                    idTurma: idTurma,
                    filtroIdade: filtroIdade,
                    method:"evangelizando"
                },
                beforeSend: function(){
                	$.prompt("<div class='loadGif'><img src='/img/structure/load.gif'></img></div>");
                },
                complete: function(){
                	$.prompt.close();
                },
                success: function(data, textStatus){
                    $('form fieldset#cadMatSelect').addClass('selected');
                    $('select#idEvangelizando').html(data);
                },
                error: function(xhr,er){                
                    new Messi('Não foi possível matricular evangelizando, por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        }else{
            $('form fieldset#cadMatSelect').removeClass('selected'); 
        }
    });
    
    $('input#submit').click(function(e){
        e.preventDefault();
        var serialize = $('form#cadastrarMatricula').serialize();
        var validate = ( $('form#cadastrarMatricula').validationEngine('validate') );
        if(validate === true){
            $.ajax({
                url: '/pessoa/matricula/cadastrar',
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
                        $('#idTurma').val("");
                        $('form fieldset#cadMatSelect').removeClass('selected'); 
                        new Messi('Evangelizando matriculado com sucesso!', {
                            title: 'SUCESSO'
                        });
                    
                    }else{
                        new Messi('Não foi possível matricular evangelizando, por favor entre em contato com o administrador.', {
                            title: 'ERRO'
                        });
                    }
                },
                error: function(xhr,er){
                    new Messi('Não foi possível matricular evangelizando, por favor entre em contato com o administrador.', {
                        title: 'ERRO'
                    });
                }
            });
        }
    });
    });
});
