//login direto sem uso do php

window.addEventListener('load', function(){
    if(
        sessionStorage.getItem('firstname') != null &&
        sessionStorage.getItem('lastname') != null &&
        sessionStorage.getItem('email') != null &&
        sessionStorage.getItem('event') != null &&
        sessionStorage.getItem('id') != null &&
        sessionStorage.getItem('enable') != null &&
        sessionStorage.getItem('control_hash') != null
    ){
        window.location.href = "./?page=live";
    }
});

const url = "https://eventos.tbr.com.br/global/api/login.api.php"
const formLogin = document.getElementById('form_login');
const btnSubmit = document.getElementById('btn-submit');

formLogin.addEventListener('submit', async event => {
    event.preventDefault();
    btnSubmit.disabled = true;
    const formData = new FormData(formLogin);
    
    try {
        const res = await fetch(url, {
            method: 'POST',
            body: formData
        });

        const resData = await res.json();
                
        if(resData.code === 0){ // usuário não encontrado
            Swal.fire({
                title: 'Atenção!',
                text: 'O email ou a senha informados não foram encontrados no sistema, por favor verifique ou faça o cadastro',
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
            
            // Swal.fire({
            //     title: 'Atenção!',
            //     text: 'O email ou a senha informados não foram encontrados no sistema, por favor verifique ou faça o cadastro',
            //     icon: 'warning',
            //     showCancelButton: false,
            //     confirmButtonColor: '#3085d6',
            //     showConfirmButton: true,
            //     confirmButtonText: 'OK'
            // }).then((result) => {
            //     if (result.value) {
            //         window.location.reload();
            //     }
            // }); 
        }else{ // usuário encontrado - adm ou usuário comum
            for(x in resData.data){
                if(
                    x == 'firstname' ||
                    x == 'lastname' ||
                    x == 'email' ||
                    x == 'event' ||
                    x == 'id' ||
                    x == 'enable' ||
                    x == 'control_hash' ||
                    x == 'treatment'
                ){
                    sessionStorage.setItem(x, resData.data[x]);
                }
            }
            if(sessionStorage.getItem('control_hash') == null || sessionStorage.getItem('control_hash') == ""){
                sessionStorage.setItem('control_hash', "123456ADM");
            }
            window.location.href = "./?page=live";
            //window.location.href = `./?page=${document.querySelector('#pagina').value}`;
        }

    } catch (err) {
        console.log(err.message);
        btnSubmit.disabled = false;
    }
});

$(()=>{
    document.getElementById('language').value = localStorage.getItem('language');
})

navBr.onclick = ()=>{ 
    localStorage.setItem('language', 'pt');
    document.getElementById('language').value = "pt";
    translateTo("pt"); 
    
};
navEn.onclick = ()=>{ 
    localStorage.setItem('language', 'en');
    document.getElementById('language').value = "en";
    translateTo("en");
};