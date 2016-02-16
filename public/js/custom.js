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
