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



// bloqueia ou libera botao de acordo com o limite de rifas
$(document).ready(function () {
    $('#botao_comprar').prop('disabled', true);
    var checkedBefore = new Array();
    var checkedBefore = $('input[type=checkbox]:checked').map(function() {
        return this.value;
    }).get();
    var checkedAfter, i;
    validatecheckboxcount();
    var aux=$('#qtd_max').data('qtdmax');
    function validatecheckboxcount() {
            $('input[type=checkbox]').click(function () {
                checkedAfter =  $('input[type=checkbox]:checked').map(function() {
                    if(checkedBefore.length==0){
                        return this.value;
                    }else{
                        for(i=0;i<checkedBefore;i++){
                            if(this.value!=checkedBefore[i]){
                                return this.value;
                            }
                        }
                    }
                }).get();
            $('input[type=checkbox]').change(function(){
                if(checkedAfter.length<($('#qtd_max').data('qtdmax')+1) && checkedAfter.length>0){
                    $('#botao_comprar').prop('disabled', false)
                    $('[data-toggle="tooltip"]').removeAttr('title');

                }else{
                    $('#botao_comprar').prop('disabled', true);
                    $('[data-toggle="tooltip"]').attr('title', 'Selecione uma rifa');
                }
            });
        });
    }
});




