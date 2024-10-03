const formTrocasenha = document.getElementById('form-newpassword');
formTrocasenha.addEventListener('submit', function(e) {
    e.preventDefault();

    if(document.getElementById('rsenha').value != document.getElementById('senha').value){
        if(localStorage.getItem('language') == "pt"){
            Swal.fire('Erro', 'As senhas precisam ser iguais', 'error');
        }else{
            Swal.fire('Error', 'Passwords must be equal', 'error');
        }
        
        return false;
    }

    document.getElementById('prl6').disabled = true;
    
    fetch('https://eventos.tbr.com.br/global/api/redefinesenha.api.php', {
        method: 'post',
        body: JSON.stringify({
            newpassowrd: document.getElementById('senha').value,
            passkey: document.getElementById('key').value
        })
    }).then(function(response){
        return response.json();
    }).then(function(resposta){
        if(resposta.retorno === 1){
            if(localStorage.getItem('language') == "pt"){
                Swal.fire({
                    title: 'Sucesso',
                    html: 'Sua senha foi alterada com sucesso.',
                    icon: 'success',
                    showCancelButton: false,
                    cancelButtonColor: '#cccccc',
                    confirmButtonColor: '#3085d6',
                    showConfirmButton: true,
                    cancelButtonText: 'Não',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if(result.value){
                        window.location.href = './?page=login';
                    }else{
                        window.location.reload();
                    }
                });
            }else{
                Swal.fire({
                    title: 'Success',
                    html: 'Your new password was successfully saved.',
                    icon: 'success',
                    showCancelButton: false,
                    cancelButtonColor: '#cccccc',
                    confirmButtonColor: '#3085d6',
                    showConfirmButton: true,
                    cancelButtonText: 'Não',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if(result.value){
                        window.location.href = './?page=login';
                    }else{
                        window.location.reload();
                    }
                });
            }            
        }else if(resposta.retorno == 0){
            if(localStorage.getItem('language') == "pt"){
                Swal.fire({
                    title: 'Atenção',
                    html: 'Não foi possível alterar sua senha, por favor entre em contato com o suporte',
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
                    title: 'Warning',
                    html: 'Unable to change your password, please contact support',
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
        //document.getElementById('prl6').disabled = false;
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