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
                if($(this).text()==="Ativo"){
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
    $('tbody tr td#visualizar').click(function() {
        option = false;
        
    });

    $('tbody tr.pointer').click(function() {
        var id = $(this).attr('rel');
        if(option){
            location.href="/pessoa/matricula/editar/id/"+id;
        }
    });
    
    $('a#excluir').click(function(e) {
        e.preventDefault();
        var code = new Array();
        $("td input[type=checkbox]:checked").each(function() {
            code.push($(this).attr('rel'));
        });
        
        new Messi('Tem certeza que deseja excluir?', {
            title: 'Excluir Matrícula', 
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
            if($(this).text()==="Sim"){
                if(code.length > 0){
                    $.ajax({
                        url: '/pessoa/matricula/excluir',
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
                                new Messi('Matrícula(s) excluída(s) com sucesso!', {
                                    title: 'SUCESSO'
                                });
                                $('span.messi-closebtn').click(function(e){
                                    location.href="/pessoa/matricula/listar";
                                });
                            }else{
                                new Messi('Não foi possível excluir a(s) matricula(s), por favor entre em contato com o administrador.', {
                                    title: 'ERRO'
                                });
                            }
                        },
                        error: function(xhr,er){
                            new Messi('Não foi possível excluir a(s) matricula(s), por favor entre em contato com o administrador.', {
                                title: 'ERRO'
                            });
                        }
                    });
                }
            }
        });
        
    });
    var pathname = window.location.pathname;
    if(pathname.indexOf("ano/all", pathname)!==-1){
        $('label[for="idTurma"]').hide();
        $('select#idTurma').hide();
    }else{
        $('label[for="idTurma"]').show();
        $('select#idTurma').show;            
    }
    $('select#nuAno').change(function(){
        var nuAno = $(this).val();
        if(nuAno){
            location.href="/pessoa/matricula/listar/ano/"+nuAno;
        }
    });
    $('select#idTurma').change(function(){
        var nuAno = $('select#nuAno').val();
        var idTurma = $(this).val();
        if(idTurma){
            location.href="/pessoa/matricula/listar/ano/"+nuAno+"/turma/"+idTurma;
        }
    });
});
