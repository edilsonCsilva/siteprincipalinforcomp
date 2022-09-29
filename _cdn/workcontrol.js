$(function () {

    //############## GET PROJECT
    BASE = $("link[rel='base']").attr("href");

    //############## FBLIKE RESPONSIVE CONTROL
    if ($('.fb-like').length) {
        $(window).load(function () {
            if ($('.fb-like').width() < 600 && $(window).width() < 600) {
                $('.fb-like').attr('data-width', $('.fb-like').width());
            }
        });
    }

    //############## IFRAME RESET
    function VideoResize() {
        $('.htmlchars iframe').each(function () {
            var url = $(this).attr("src");
            var char = "?";
            if (url.indexOf("?") != -1) {
                var char = "&";
            }

            var iw = $(this).width();
            var width = $('.htmlchars').outerWidth();
            var height = (iw * 9) / 16;
            $(this).attr({width: width, height: height}).css({width: width + "px", height: height + "px"});
        });
    }
    VideoResize();
    $(window).resize(function () {
        VideoResize();
    });

    //############## GOTO CORE
    $('.wc_goto').click(function () {
        var Goto = $($(this).attr("href"));
        if (Goto.length) {
            $('html, body').animate({scrollTop: Goto.offset().top}, 800);
        } else {
            $('html, body').animate({scrollTop: 0}, 800);
        }
        return false;
    });

    //############## IMAGE ERROR
    $('img').error(function () {
        var s, w, h, b;
        s = $(this).attr('src');
        w = 500;
        h = 500;
        b = $('link[rel="base"]').attr('href');
        $(this).attr('src', b + '/tim.php?src=admin/_img/no_image.jpg&w=' + w + "&h=" + h);
    });

    //############## GET CEP
    $('.wc_getCep').change(function () {
        var cep = $(this).val().replace('-', '').replace('.', '');
        if (cep.length === 8) {
            $.get("https://viacep.com.br/ws/" + cep + "/json", function (data) {
                if (!data.erro) {
                    $('.wc_bairro').val(data.bairro);
                    $('.wc_complemento').val(data.complemento);
                    $('.wc_localidade').val(data.localidade);
                    $('.wc_logradouro').val(data.logradouro);
                    $('.wc_uf').val(data.uf);
                }
            }, 'json');
        }
    });

    //############## MASK INPUT
    if ($('.formDate').length || $('.formTime').length || $('.formCep').length || $('.formCpf').length || $('.formPhone').length) {
        $.getScript(BASE + '/_cdn/maskinput.js', function () {
            $(".formDate").mask("99/99/9999");
            $(".formTime").mask("99/99/9999 99:99");
            $(".formCep").mask("99999-999");
            $(".formCpf").mask("999.999.999-99");

            $('.formPhone').focusout(function () {
                var phone, element;
                element = $(this);
                element.unmask();
                phone = element.val().replace(/\D/g, '');
                if (phone.length > 10) {
                    element.mask("(99) 99999-999?9");
                } else {
                    element.mask("(99) 9999-9999?9");
                }
            }).trigger('focusout');
        });
    }

    //############## DATEPICKER
    if ($('.jwc_datepicker').length) {
        $("head").append('<link rel="stylesheet" href="' + BASE + '/_cdn/datepicker/datepicker.min.css">');
        $.getScript(BASE + '/_cdn/datepicker/datepicker.min.js');
        $.getScript(BASE + '/_cdn/datepicker/datepicker.pt-BR.js', function () {
            $('.jwc_datepicker').datepicker({language: 'pt-BR', autoClose: true});
        });
    }

    //############## WC TAB
    $('.wc_tab').click(function () {
        if (!$(this).hasClass('wc_active')) {
            var WcTab = $(this).attr('href');

            $('.wc_tab').removeClass('wc_active');
            $(this).addClass('wc_active');

            $('.wc_tab_target.wc_active').fadeOut(200, function () {
                $(WcTab).fadeIn(200).addClass('wc_active');
            }).removeClass('wc_active');
        }

        if (!$(this).hasClass('wc_active_go')) {
            return false;
        }
    });

    //############## WC ACCORDION
    $('.wc_accordion').click(function () {
        $('.wc_accordion_toogle_active').slideUp(200, function () {
            $(this).removeClass('wc_accordion_toogle_active');
        });
        $(this).find('.wc_accordion_toogle:not(.wc_accordion_toogle_active)').slideToggle(200).addClass('wc_accordion_toogle_active');
    });

    $('.wc_accordion div').click(function (e) {
        e.stopPropagation();
    });

    //############## HIGHLIGHT
    if ($('*[class="brush: php;"]').length) {
        $("head").append('<link rel="stylesheet" href="' + BASE + '/_cdn/highlight.min.css">');
        $.getScript(BASE + '/_cdn/highlight.min.js', function () {
            $('*[class="brush: php;"]').each(function (i, block) {
                hljs.highlightBlock(block);
            });
        });
    }

    //############## MODAL BOX
    if ($('*[rel*="shadowbox"]').length) {
        $("head").append('<link rel="stylesheet" href="' + BASE + '/_cdn/shadowbox/shadowbox.css">');
        $.getScript(BASE + '/_cdn/shadowbox/shadowbox.js', function () {
            Shadowbox.init();
        });
    }

    //############## STICKY HEADER
    $(window).scroll(function () {
        var sticky = $('.sticky'),
                scroll = $(window).scrollTop();

        if (scroll >= 10)
            sticky.addClass('fixed');
        else
            sticky.removeClass('fixed');
    });

//################# MAGNIFIC POPUP
    $(document).ready(function () {
        $('.popup-youtube').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
            autoFocusLast: false
        });
    });


    //######################## SCROLL SUAVE

    $('.nav a').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('href'),
                targetOffset = $(id).offset().top,
                menuHeight = 90;

        console.log(menuHeight);

        $('html, body').animate({
            scrollTop: targetOffset - menuHeight
        }, 500);
    });

    //############## SEARCH 
    $(document).ready(function () {
        var submitIcon = $('.searchbox-icon');
        var IconOpen = $('.icon-open');
        var inputBox = $('.searchbox-input');
        var searchBox = $('.searchbox');
        var isOpen = false;
        submitIcon.click(function () {
            if (isOpen == false) {
                searchBox.addClass('searchbox-open');
                submitIcon.addClass('icon-closed');
                IconOpen.removeClass('icon-open');
                inputBox.focus();
                isOpen = true;
            } else {
                searchBox.removeClass('searchbox-open');
                submitIcon.removeClass('icon-closed');
                IconOpen.addClass('icon-open');
                inputBox.focusout();
                isOpen = false;
            }
        });
        submitIcon.mouseup(function () {
            return false;
        });
        searchBox.mouseup(function () {
            return false;
        });
        $(document).mouseup(function () {
            if (isOpen == true) {
                $('.searchbox-icon').css('display', 'block');
                submitIcon.click();
            }
        });
    });
    function buttonUp() {
        var inputVal = $('.searchbox-input').val();
        inputVal = $.trim(inputVal).length;
        if (inputVal !== 0) {
            $('.searchbox-icon').css('display', 'none');
        } else {
            $('.searchbox-input').val('');
            $('.searchbox-icon').css('display', 'block');
        }
    }

/*
    $(document).ready(function () {
        $("#form").validate({
            rules: {
                "name": {
                    required: true,
                    minlength: 5
                },
                "email": {
                    required: true,
                    email: true
                },
                "message": {
                    required: true,
                    minlength: 5
                },
                "nameEmpresa": {
                    required: true,
                    minlength: 5
                },
                "phone": {
                    required: true,
                },
                "subject": {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                "name": {
                    required: "Por favor, digite seu nome",
                    minlength: "Digite no mínimo 5 caracteres"
                },
                "email": {
                    required: "Digite um endereço de e-mail válido",
                    email: "E-mail inválido",
                    minlength: "Digite no mínimo 5 caracteres"
                },
                "message": {
                    required: "Digite sua mensagem",
                    minlength: "Digite no mínimo 5 caracteres"
                },
                "nameEmpresa": {
                    required: "Digite um nome de empresa",
                    minlength: "Digite no mínimo 5 caracteres"
                },
                "phone": {
                    required: "Digite um número de telefone",
                    minlength: "Digite no mínimo 5 caracteres"
                },
                "subject": {
                    required: "Digite um assunto",
                    minlength: "Digite no mínimo 5 caracteres"
                }
            }
        });

    });
*/
});
