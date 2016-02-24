/**
 * Created by rodolfo on 15/02/16.
 */
$(document).ready(function() {
    $('#botao_mensagem').prop('disabled', true);
    $('#texto_mensagem').keyup(function() {
        if($(this).val() != '') {
            $('#botao_mensagem').prop('disabled', false);
        } else {
            $('#botao_mensagem').prop('disabled', true);
        }
    });
});

//libera botao de compra apos nova entrada de checkbox
$(document).ready(function () {
    $('#botao_comprar').prop('disabled', true);
    validate();
    function validate() {
        $('input[type=checkbox]').change(function () {
            $('#botao_comprar').prop('disabled', false);
        });
    }
});




