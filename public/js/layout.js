$(document).ready(function () {
    $(document).on('click','#addsessaolayout', function (e) {
        e.preventDefault();

        ajaxLayoutSessao(e, $('#sessao').val(), $('#layout_id').val());

    })

    $(document).on('click','#destroysessaolayout', function (e) {
        e.preventDefault();

        ajaxLayoutSessao(e, $(e.target).attr('data-id'), $('#layout_id').val(), 'DELETE');

    })


    function ajaxLayoutSessao(event, sessao_id, layout_id, type = 'POST') {
        var token = $('.token input').val();
        var url = $(event.target).attr('url')
        $.ajax({
            type: type,
            url: url,
            data: { "_token": token, "sessao_id": sessao_id, "layout_id": layout_id },
            dataType: 'json'
        }).done(function (data) {
            if(data){
                $('#listasessoes').html(data.ul);

                if(data['sessao']){
                    let option = ''
                    data.sessao.forEach(function(val)  {
                        option+='<option value="'+val.id+'">'+val.titulo+'</option>'
                    });
                    $('#sessao ').html('')
                    $('#sessao ').html(option);
                }
            }
        })
    }
})
