var $j = jQuery.noConflict();
let valor = '';
const coloca = $j('#form');
const cria = $j('<div/>')
var criaDivisor = $j('<div/>')
var criaCampo = $j('<input/>')
var crialavel = $j('<label/>')
var a = document.getElementsByClassName('ed-usu')
for (let i = 0; i < a.length; i++) {
    a[i].addEventListener('click', function () {
        cria.empty();

        const campos = ['name', 'cpf', 'rg', 'data_nascimento', 'Perfil']
        const tipoCampos = ['text', 'text', 'text', 'date', 'hidden'];

        valor = this.getAttribute('dado')
        $j(this).removeClass('active')
        $j.ajax({
            url: '/ed',
            type: 'get',
            async: true,
            data: `valores=${valor}`,
            success: function (data) {
                var criaBotao = $j('<button/>')
                var criaSelect = $j('<select/>')
                criaSelect.attr('class', 'form-controls')
                criaSelect.attr('name', 'perfil_id');

                var perfil = {1: 'usuario', 2: 'gestor', 3: 'admin'};
                var valor = {1: '1', 2: '2', 3: '3'};
                
                for (let a = 1; a < 4; a++) {
                    if (valor[a] != data[0]['perfil_id']){
                        criaSelect.append(`<option value="${valor[a]}">${perfil[a]}</option>`);
                    }
                }
                criaSelect.append(`<option value="${valor[data[0]['perfil_id']]}" selected required>${perfil[data[0]['perfil_id']]}</option>`);

                criaBotao.attr('class', 'btn btn-success')
                criaBotao.append('Editar')
                for (let i = 0; i < campos.length; i++) {
                    crialavel = ''
                    criaDivisor = ''
                    criaCampo = ''
                    for (let j = 0; j < data.length; j++) {
                        criaDivisor = $j('<div/>')
                        criaDivisor.attr('class', 'form-group row ')

                        var criaUma =  $j('<div/>');
                        criaUma.attr('class','col-md-6')

                        
                        criaCampo = $j('<input/>')
                        criaCampo.attr('type', tipoCampos[i]);
                        criaCampo.attr('name', campos[i])
                        criaCampo.attr('placeholder', 'Digite')
                        criaCampo.attr('class', 'form-controls')
                        criaCampo.attr('value', data[j][campos[i]]);

                        crialavel = $j('<label/>')
                        crialavel.attr('class', 'col-md-4 col-form-label text-md-right')
                        crialavel.append(`${campos[i]}: `)

                        criaDivisor.append(crialavel)
                        criaUma.append(criaCampo)
                        criaUma.append(criaSelect)

                        criaDivisor.append(criaUma);
                        
                        cria.attr('class', 'card')
                        cria.append(criaDivisor)
                        coloca.append(cria)
                    }
                }
                cria.append(criaBotao)
            },
        });

    });
}