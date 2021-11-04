// Mask Functions
(function ($) {
    $(function () {
        // Main Masks
        $('.cep').mask('00000-000');
        $('.cpf').mask('000.000.000-00', { reverse: true });
        $('.telefone_fixo').mask('(00) 00000000');
        $('.telefone_celular').mask('(00) 000000000');

        // Option Masks
        $('.date').mask('00/00/0000');
        $('.date_time').mask('00/00/0000 00:00:00');
        $('.time').mask('00:00:00');
        $('.placeholder').mask('00/00/0000', { placeholder: '__/__/____' });
        $('.fallback').mask('00r00r0000', {
            translation: {
                r: {
                    pattern: /[\/]/,
                    fallback: '/',
                },
                placeholder: '__/__/____',
            },
        });
    });
})(jQuery);
