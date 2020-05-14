    var i = 1;
    var pickr = [];
    $(document).on("change",'.cattb select',function () {
        var _inside = $(this).parents('.clone');
        var j = _inside.attr('id');
        var color = $(this).children('option:selected').text().toLowerCase();
        if(color === 'color'){
            pickroption.el = '.color-picker-'+j;
            pickr[j] = new Pickr(pickroption);
            if (typeof pickr[j] == "undefined") {    
                pickr[j] = new Pickr(pickroption);
            }
            _inside.find('.pickr').show().append('<input type="hidden" name="color_code'+j+'" value="">');
            checkpickr(_inside,j);
        }else{
            if (typeof pickr[j] != "undefined") {
                pickr[j].destroyAndRemove();
                _inside.find('.clr-pickr').append('<div class="color-picker-'+j+'"></div>');
            }
        }
    });
    function checkpickr(_inside,j){
        if (typeof pickr[j] != "undefined") {    
            pickr[j].on('save', (color, instance) => {
                pickr[j].hide();
                var code = color.toHEXA().toString();
                _inside.find('input[name="color_code'+j+'"]').val(code);
            });
        }
    }
    $('.add_more').click(function(){
        i++;
        $('.selectpicker').selectpicker('destroy').addClass('selectpicker');
        var clone = $('.clone:first-child').clone();
        clone.attr("id", i);
        clone.find("input").val("");
        clone.find('.pickr').hide();
        clone.find('.pickr input[name="color_code"]').remove();
        clone.find('.clr-pickr').children().remove();
        clone.find('.clr-pickr').append('<div class="color-picker-'+i+'"></div>');
        // init more input upload file
        clone.find('.imageuploadify').remove();
        clone.find('input[type="file"]').attr('name','image'+i+'[]').imageuploadify();
        $('.appdn').append(clone);
        $('.selectpicker').selectpicker('refresh');
    });
    
    $('.money').simpleMoneyFormat();
    $('input[type="file"]').imageuploadify();