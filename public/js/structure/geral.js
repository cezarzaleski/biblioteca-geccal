$(function(){
	$('table.table').dataTable({
    "sScrollY": "416px",
    "bPaginate": true,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": false,
    "oLanguage": {
        "sProcessing": "Processando...",
        "sLengthMenu": "Mostrar_MENU_ registros por página",
        "sZeroRecords": "Nenhum Registro Encontrado...",
        "sInfo": "Paginação _START_ de _END_, Total _TOTAL_ registros",
        "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros", 
        "sInfoEmpty": "Paginação 0 de 0, Total 0 registros",
        "sInfoFiltered": "(Filtrado de _MAX_ registros ao todo)",
        "sSearch": "Procurar:",
        "sNext": "Próximo",
        "oPaginate": {
            "sPrevious": "Anterior",
            "sNext": "Próximo",
            "sFirst": "Primeira",
            "sLast": "Última"
        }
    },
    
    "sPaginationType": "full_numbers",
    "bProcessing": true,
    "bStateSave": true
    });
	
	
    //   validação de formulários
    $('.form').validationEngine();      
       
    //formatação tabelas
    $('tbody tr').mouseover(function(){
        $(this).css({
            background : '#DDECF7',
            color : '#000'
        });
    }).mouseout(function(){
        $(this).css({            
            background : 'none',
            color : '#000'
        });
    });
        
    $('table > tbody > tr > td > :checkbox').bind('click change', function(){
        var tr = $(this).parent().parent();
        if($(this).is(':checked')){
            $(tr).addClass('selected');
            $('a#excluir').show();
            $('a#updateLivro').show();
            $('a#matricular').show();
        } else {
            $(tr).removeClass('selected');
            $('a#excluir').hide();
            $('a#updateLivro').hide();
            $('a#matricular').hide();
        }
    });
    if($('p#checkAll').text()=="false"){
        
        $('th input#selectAll').attr('disabled','disabled');
    }
    
    $('th input#selectAll').click(function(){
        $('table > tbody > tr > td > :checkbox:enabled').attr('checked',$(this).is(':checked')).trigger('change');
    });
    
    $('#pesquisar').keydown(function(){
        var encontrou = false;
        var termo = $(this).val().toLowerCase();
        $('table > tbody > tr').each(function(){
            $(this).find('td').each(function(){
                if($(this).text().toLowerCase().indexOf(termo) > -1) encontrou = true;
            });
            if(!encontrou) $(this).hide();
            else $(this).show();
            encontrou = false;
        });
    });
    
    
    var modulo = $('span#modulo').attr('rel');
    var mod = "#tabMenu li."+modulo;
    $(mod).addClass('selected');
    $('.boxBody div.parent:eq(' + $(mod).index() + ')').slideDown('1500');
    
    if(modulo !="home"){
        $('div.boxBody div#home').hide();
    }
    
    //pesquisar endereço pelo cep
    $('input#nuCep').blur(function(){
        var cep = $(this).val();
        cep = cep.replace("-", "");
        
        if(cep != ""){
            $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+cep, function(){
                if(resultadoCEP["resultado"] > 0){
                    $("input#noEndereco").val(unescape(resultadoCEP["tipo_logradouro"])+": "+unescape(resultadoCEP["logradouro"]));
                    $("input#noBairro").val(unescape(resultadoCEP["bairro"]));
                    $("input#noCidade").val(unescape(resultadoCEP["cidade"])+'/'+unescape(resultadoCEP["uf"]));
                }else{
                    $("input#noEndereco").val('');
                    $("input#noBairro").val('');
                    $("input#noCidade").val('');
                }
            });
        }
    });
    
    //jquery para dinâmica de modulos
    
    $('p#modulo').click(function(e){
        $('div.modulo').removeClass('selected');
        var modulo = $(this).attr('rel');
        modulo = "div#"+modulo;
        $(modulo).addClass('selected');
    });
           
})