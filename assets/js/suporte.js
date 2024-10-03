//suporte
var formulario = document.getElementById('form-contato');
formulario.addEventListener('submit', function(e) {
    e.preventDefault();
    document.getElementById('submit_button').disabled = true;

    const formdData = new FormData(this);
    fetch('assets/php/suporte.php', {
        method: 'post',
        body: formdData
    }).then(function(response) {
        return response.json();
    }).then(function(resposta) {
        if (resposta.retorno === 0) {
            Swal.fire({
                title: 'Atenção',
                text: 'Sua mensagem não pôde ser enviada, por favor entre em contato pelo whatsapp (14) 98188-2324',
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                showConfirmButton: true,
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location.reload();
                }
            });
        } else if (resposta.retorno === 1) {
            Swal.fire({
                title: 'Sucesso',
                text: 'Sua mensagem foi enviada com sucesso',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                showConfirmButton: true,
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location.href = `./?page=home`;
                }
            });            
        }
    }).catch(function(error) {
        //Swal.fire('Erro', 'A operação solicitada não pôde ser concluída, motivo: ' + error, 'error');
        document.getElementById('submit_button').disabled = false;
    })
})