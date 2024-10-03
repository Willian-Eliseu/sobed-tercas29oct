
//esqueci minha senha
const formConsulta = document.getElementById('form_consulta');
formConsulta.addEventListener('submit', function(e) {
    e.preventDefault();    
    document.getElementById('sel7').disabled = true;
    
    fetch('https://eventos.tbr.com.br/global/api/senha.api.php', {
        method: 'post',
        body: JSON.stringify({
            email: document.getElementById('email').value,
            evento: document.getElementById('evento').value,
            pagina: document.getElementById('pagina').value
        })
    }).then(function(response){
        return response.json();
    }).then(function(resposta){
        if(resposta.retorno === 1){
            if(localStorage.getItem('language') == "pt"){
                Swal.fire({
                    title: 'Sucesso',
                    html: 'Um link foi enviado para o seu email. Por favor acesse o link para redefinir sua senha.',
                    icon: 'success',
                    showCancelButton: false,
                    cancelButtonColor: '#cccccc',
                    confirmButtonColor: '#3085d6',
                    showConfirmButton: true,
                    cancelButtonText: 'Não',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if(result.value){
                        window.location.href = './?page=home';
                    }else{
                        window.location.reload();
                    }
                });
            }else{
                Swal.fire({
                    title: 'Success',
                    html: 'A link has been sent to your email. Please follow the link to reset your password.',
                    icon: 'success',
                    showCancelButton: false,
                    cancelButtonColor: '#cccccc',
                    confirmButtonColor: '#3085d6',
                    showConfirmButton: true,
                    cancelButtonText: 'Não',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if(result.value){
                        window.location.href = './?page=home';
                    }else{
                        window.location.reload();
                    }
                });
            }
            
        }else if(resposta.retorno == 0){
            if(localStorage.getItem('language') == "pt"){
                Swal.fire({
                    title: 'Atenção',
                    html: 'O email informado não foi encontrado no nosso sistema. Por favor, verifique o email informado ou faça seu cadastro.',
                    icon: 'info',
                    showCancelButton: false,
                    cancelButtonColor: '#cccccc',
                    confirmButtonColor: '#3085d6',
                    showConfirmButton: true,
                    cancelButtonText: 'Não',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if(result.value){
                        // window.location.href = './?page=home';
                        window.location.reload();
                    }else{
                        window.location.reload();
                    }
                });
            }else{
                Swal.fire({
                    title: 'Attention',
                    html: 'The email provided was not found in our system. Please check the email address provided or register.',
                    icon: 'info',
                    showCancelButton: false,
                    cancelButtonColor: '#cccccc',
                    confirmButtonColor: '#3085d6',
                    showConfirmButton: true,
                    cancelButtonText: 'Não',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if(result.value){
                        // window.location.href = './?page=home';
                        window.location.reload();
                    }else{
                        window.location.reload();
                    }
                });
            }
            
        }
    }).catch(function(error){
        //Swal.fire('Erro', 'A operação solicitada não pôde ser concluída, motivo: ' + error, 'error');
        //document.getElementById('sel7').disabled = false;
    });
});

navBr.onclick = ()=>{ 
    localStorage.setItem('language', 'pt');
    translateTo("pt"); 
};
navEn.onclick = ()=>{ 
    localStorage.setItem('language', 'en');
    translateTo("en");
};