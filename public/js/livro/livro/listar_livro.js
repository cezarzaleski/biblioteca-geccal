$(function() {

    var option = true;
    $('td input[type=checkbox]').click(function() {
        var idCheck = $(this).attr('rel');
        option = false;
        var check = false;
        $("td input[type=checkbox]:checked").each(function() {
            check = true;
        });
        if (check) {
            $('td[rel="' + idCheck + '"]').each(function() {
                if ($(this).text() === "Ativo") {
                    $('div#excluir').show();
                }
            });
        } else {
            $('div#excluir').hide();
        }
    });
    $('tbody tr td.link').click(function() {
        option = true;

    });
    $('tbody tr td#autores').click(function() {
        option = false;

    });

    $('tbody tr.pointer').click(function() {
        var id = $(this).attr('rel');
        if (option) {
            location.href = "/livro/livro/editar/id/" + id;
        }
    });



    $('a#excluir').click(function(e) {
        e.preventDefault();
        var code = new Array();

        $("td input[type=checkbox]:checked").each(function() {
            code.push($(this).attr('rel'));

        });
        new Messi('<p>Motivo da Exlusão</p><textarea id="motivoExclusao"/></textarea>', {
            title: 'Excluir Livro',
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
            if ($(this).text() === "Sim") {
                var code = new Array();
                $("td input[type=checkbox]:checked").each(function() {
                    code.push($(this).attr('rel'));

                });
                var motivo = $('#motivoExclusao').val();
                if (motivo !== "") {
                    $.ajax({
                        url: '/livro/livro/excluir',
                        dataType: 'html',
                        type: 'post',
                        data: {
                            code: code,
                            noMotivoExclusao: motivo
                        },
                        beforeSend: function() {
                            $.prompt("<div class='loadGif'><img src='/img/structure/load.gif'></img></div>");
                        },
                        complete: function() {
                            $.prompt.close();
                        },
                        success: function(data, textStatus) {
                            var conf = data;
                            var confirm = $.trim(conf);
                            if (confirm === "true") {
                                new Messi('Livro(s) excluido(s) com sucesso!', {
                                    title: 'SUCESSO'
                                });
                                $('span.messi-closebtn').click(function(e) {
                                    location.href = "/livro/livro/listar";
                                });
                            } else {
                                new Messi('Não foi possível excluir livro(s), por favor entre em contato com o administrador.', {
                                    title: 'ERRO'
                                });
                            }
                        },
                        error: function(xhr, er) {
                            new Messi('Não foi possível excluir livro(s), por favor entre em contato com o administrador.', {
                                title: 'ERRO'
                            });
                        }
                    });


                } else {
                    new Messi('Por favor preencha o motivo da exclusão.', {
                        title: 'ERRO'
                    });
                }
            }
        });

    });

    $('td#autores').click(function() {
        var id = $(this).attr('rel');
        $.ajax({
            url: '/livro/livro/listar/id/' + id,
            dataType: 'html',
            type: 'get',
            beforeSend: function() {
                $.prompt("<div class='loadGif'><img src='/img/structure/load.gif'></img></div>");
            },
            complete: function() {
                $.prompt.close();
            },
            success: function(data, textStatus) {
                new Messi('<div id="modal">' + data + '</div>', {
                    title: 'Autores'
                });
            },
            error: function(xhr, er) {
                new Messi('Não foi possível visualizar os autores, por favor entre em contato com o administrador.', {
                    title: 'ERRO'
                });
            }
        });
    });

    $('.searchable').multiSelect({
        selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='try \"12\"'>",
        selectionHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='try \"4\"'>",
        afterInit: function(ms) {
            var that = this,
                    $selectableSearch = that.$selectableUl.prev(),
                    $selectionSearch = that.$selectionUl.prev(),
                    selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                    selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

            that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                    .on('keydown', function(e) {
                        if (e.which === 40) {
                            that.$selectableUl.focus();
                            return false;
                        }
                    });

            that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                    .on('keydown', function(e) {
                        if (e.which === 40) {
                            that.$selectionUl.focus();
                            return false;
                        }
                    });
        },
        afterSelect: function() {
            this.qs1.cache();
            this.qs2.cache();
        },
        afterDeselect: function() {
            this.qs1.cache();
            this.qs2.cache();
        }
    });
});




