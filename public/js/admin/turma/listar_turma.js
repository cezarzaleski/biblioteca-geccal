$(function(){
         
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
                if($(this).text()=="Ativo"){
                    $('div#excluir').show();
                }
            });
        }else{
            $('div#excluir').hide();
        }
    });
    $('tbody tr td.link').click(function() {
        option = true;
        
    });

    $('tbody tr.pointer').click(function() {
        var id = $(this).attr('rel');
        if(option){
            location.href="/admin/turma/editar/id/"+id;
        }
    });
    
    $('a#excluir').click(function(e) {
        e.preventDefault();
        new Messi('Tem certeza que deseja excluir?', {
            title: 'Excluir Turma', 
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
                code.push($(this).attr('rel'));
            });
            if($(this).text()=="Sim"){
                if(code.length > 0){
                    $.ajax({
                        url: '/admin/turma/excluir',
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
                            if(confirm == "true"){
                                new Messi('Turma(s) excluída(s) com sucesso!', {
                                    title: 'SUCESSO'
                                });
                                $('span.messi-closebtn').click(function(e){
                                    location.href="/admin/turma/listar";
                                });
                            }else{
                                new Messi('Não foi possível excluir turma(s), por favor entre em contato com o administrador.', {
                                    title: 'ERRO'
                                });
                            }
                        },
                        error: function(xhr,er){
                            new Messi('Não foi possível excluir turma(s), por favor entre em contato com o administrador.', {
                                title: 'ERRO'
                            });
                        }
                    });
                }
            } 
        });
    });
    
    $('select#nuAno').change(function(){
        var nuAno = $(this).val();
        if(nuAno){
            location.href="/admin/turma/listar/ano/"+nuAno;
        }
    });

})




