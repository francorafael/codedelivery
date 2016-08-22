function excluirCliente(codigo, nome) {
    BootstrapDialog.show(
            {
                message: 'Você realmente deseja excluir ' + nome + '? <br><br><small>Clique em não para continuar trabalhando. Clique em sim para excluir.</small>',
                title: "Excluir?",
                buttons: [{
                    label: 'Sim',
                    cssClass: 'btn-primary',
                    action: function (dlg) {

                        // duas chamadas: 1) request para eliminar 2) request para carregar a tabela novamente (ou eliminar simplesmente a linha da tabela)
                        var tr = document.getElementById('cliente.' + codigo);
                        if (tr) {

                            //DELETA SOMENTE A LINHA
                            tr.parentNode.deleteRow(tr.rowIndex - 1);

                            //POST
                            var string = 'codigo=' + codigo;

                            //URL DO SISTEMA
                            var newURL = window.location.protocol + "//" + window.location.host;

                            //AJAX
                            $.ajax({
                                type: "POST",
                                url: newURL + "/clientes-excluir.aspx",
                                data: string,
                                cache: false,
                                success: function () {
                                    commentContainer.slideUp('slow', function () { $(this).remove(); });
                                    $('#load').fadeOut();
                                }
                            });
                        }
                        dlg.close();
                    }
                }, {
                    label: 'Não',
                    action: function (dialogItself) {
                        dialogItself.close();
                    }
                }]
            }
    );

}

function excluirProduto(codigo, nome) {
    BootstrapDialog.show(
            {
                message: 'Você realmente deseja excluir ' + nome + '? <br><br><small>Clique em não para continuar trabalhando. Clique em sim para excluir.</small>',
                title: "Excluir?",
                buttons: [{
                    label: 'Sim',
                    cssClass: 'btn-primary',
                    action: function (dlg) {

                        // duas chamadas: 1) request para eliminar 2) request para carregar a tabela novamente (ou eliminar simplesmente a linha da tabela)
                        var tr = document.getElementById('produto.' + codigo);
                        if (tr) {

                            //DELETA SOMENTE A LINHA
                            tr.parentNode.deleteRow(tr.rowIndex - 1);

                            //POST
                            var string = 'codigo=' + codigo;

                            //URL DO SISTEMA
                            var newURL = window.location.protocol + "//" + window.location.host;

                            //AJAX
                            $.ajax({
                                type: "POST",
                                url: newURL + "/produtos-excluir.aspx",
                                data: string,
                                cache: false,
                                success: function () {
                                    commentContainer.slideUp('slow', function () { $(this).remove(); });
                                    $('#load').fadeOut();
                                }
                            });
                        }
                        dlg.close();
                    }
                }, {
                    label: 'Não',
                    action: function (dialogItself) {
                        dialogItself.close();
                    }
                }]
            }
    );

}

function cancelarVenda(codigo, nome) {
    BootstrapDialog.show(
            {
                message: 'Você realmente deseja cancelar ' + nome + '? <br><br><small>Clique em não para continuar trabalhando. Clique em sim para cancelar.</small>',
                title: "Cancelar Venda?",
                buttons: [{
                    label: 'Sim',
                    cssClass: 'btn-primary',
                    action: function (dlg) {

                        // duas chamadas: 1) request para eliminar 2) request para carregar a tabela novamente (ou eliminar simplesmente a linha da tabela)
                        var tr = document.getElementById('venda.' + codigo);
                        if (tr) {

                            //DELETA SOMENTE A LINHA
                            tr.parentNode.deleteRow(tr.rowIndex - 1);

                            //POST
                            var string = 'codigo=' + codigo;

                            //URL DO SISTEMA
                            var newURL = window.location.protocol + "//" + window.location.host;

                            //AJAX
                            $.ajax({
                                type: "POST",
                                url: newURL + "/vendas-excluir.aspx",
                                data: string,
                                cache: false,
                                success: function () {
                                    commentContainer.slideUp('slow', function () { $(this).remove(); });
                                    $('#load').fadeOut();
                                }
                            });
                        }
                        dlg.close();
                    }
                }, {
                    label: 'Não',
                    action: function (dialogItself) {
                        dialogItself.close();
                    }
                }]
            }
    );

}

$(document).ready(function () {
    $('.set-numeric').maskMoney({ thousands: '2', decimal: ',' });
});

$(function () {

    $('[data-target="#alterarqtde"]').click(function (e) {
        e.preventDefault();
        var produto_id = $(this).attr('itemid');
        var qtde = $('#alterarqtde' + produto_id).val();
        var venda_id = $(this).attr('vendaid');
        //URL DO SISTEMA
        var newURL = window.location.protocol + "//" + window.location.host;
        window.location.href = newURL + "/vendas-itens.aspx?a=u&id=" + produto_id + "&codigo=" + venda_id + "&qtde=" + qtde;
    });
});