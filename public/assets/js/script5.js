var $j = jQuery.noConflict();
var modal = document.getElementsByClassName('botao-modal')
for (let i = 0; i < modal.length; i++) {
    modal[i].addEventListener('click', function () {
        var valor = ''
        valor = (this.getAttribute('id'))
        $j.ajax({
            url: APP_URL + '/lkjh',
            type: 'get',
            async: true,
            data: `valores=${valor}`,
            success: function (data) {
                if (data[0]['candidatos']) {
                    $j.each(data, function (i, item) {
                        $j('#id #TituloModalCentralizado').append(item.titulo);
                        var candidatos = item.candidatos
                        candidatos = candidatos.split(';')
                        newarray = []
                        for (let i = 0; i < candidatos.length; i++) {
                            for (let j = 0; j < all.length; j++) {
                                if (all[j]['id'] == candidatos[i]) {
                                    $j('#id .modal-body').append(`<strong>\instagram: </strong>${all[j]['insta']}</br>`)
                                }
                            }

                        }

                    })
                }else{
                    $j('#id .modal-body').append(`<strong>Não há candidatos</strong></br>`)
                }
            },
            error: function () {

            }

        });
    });
}
$j('.fechar').click(function () {
    setTimeout(function () {
        $j('#id #TituloModalCentralizado').empty()
        $j('#id .modal-body').empty()
    }, 200)
})


