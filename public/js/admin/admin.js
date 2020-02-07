$(function() {

	// confirma a exclusão de algum recurso
	$('a[data-confirm], input[data-confirm]').click(function() {
		if (!confirm($(this).attr('data-confirm'))) {
			return false;
		};
	});
    
    $(".maxlength").keyup(function(event){
        var target    = $("#content-countdown");       
        var max        = target.attr('title');
        var len     = $(this).val().length;
        var remain    = max - len;
         if(len > max)
        {
           
            var val = $(this).val();
            $(this).val(val.substr(0, max));
 
            remain = 0;
        }
        
        target.html(remain);
    });

    // seleciona todos os checkboxes
    $('input[name="check_all"]').click(function() {
        var checkboxes = $(':checkbox'); // pega todos os checkbox

        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = this.checked;
        }
    });

    // cadastro de cliente
    if ($('input[name=tipo_cadastro]:checked').val() == 'PF') {
        $('.div_fisica').show();
        $('.div_juridica').hide();
    } else {
        $('.div_fisica').hide();
        $('.div_juridica').show();
    }

    $('input[name=tipo_cadastro]').click(function(){
        if ($('input[name=tipo_cadastro]:checked').val() == 'PF') {
            $('.div_fisica').show();
            $('.div_juridica').hide();
        } else {
            $('.div_fisica').hide();
            $('.div_juridica').show();
        }       
    });
    
    $('.btn_cep').click(function(){
        var cep = $('#cep').val();
        $('.btn_cep').html('Aguarde...');
        $('.btn_cep').prop('disabled', true);

        $.ajax({
            url: path + "/clientes/buscar-endereco",
            type: "GET",
            data: {cep: cep},
            success: function(result){
                $('.btn_cep').html('Buscar endereço');
                $('.btn_cep').prop('disabled', false);
    
                if(result.cep){
                    $('.cep').removeClass("has-error");
                    $('.cep_help_text').html('');

                    $('#endereco').val(result.logradouro);
                    $('#bairro').val(result.bairro);
                    $('#cidade').val(result.cidade);
                    $("#estado").val(result.estado);
                }else{
                    $('.cep').addClass("has-error");
                    $('.cep_help_text').html('Não encontramos o endereço referente ao cep digitado. Por favor, complete com seu endereço abaixo.');
                }
            },
            dataType: "json"
        });
    });

    if ($('input[name="submenu"]').is(':checked')) {
        $('#pagina_pai').show();
    } else {
        $('pagina_pai').hide();
    }
    
    
    $('input[name="submenu"]').click(function() {
        if (this.checked) {
            $('#pagina_pai').show(300);
        } else {
            $('#pagina_pai').hide(300);
        }
    });


});