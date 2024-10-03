const formulary = document.getElementById('formulary');
const url = "https://eventos.tbr.com.br/global/api/cadastro.api.php";
const urlLogin = "https://eventos.tbr.com.br/global/api/login.api.php"
const btnSubmit = document.getElementById('submit_button');
const controlSubscribe = document.getElementById('loginPage');

$('#subscribe_cpf').mask('999.999.999-99');

window.onload = () => {
    var updateCityText = function(geoipResponse) {        
        document.getElementById('ip_country').value = geoipResponse.country.names.en;        
        document.getElementById('ip_country_code').value = geoipResponse.country.iso_code;        
        document.getElementById('ip_city').value = geoipResponse.city.names.en;        
        document.getElementById('ip_continent').value = geoipResponse.continent.names.en;        
        document.getElementById('ip_latitude').value = geoipResponse.location.latitude;        
        document.getElementById('ip_longitude').value = geoipResponse.location.longitude;        
        document.getElementById('ip_time_zone').value = geoipResponse.location.time_zone;        
        document.getElementById('ip_postal_code').value = geoipResponse.postal.code;        
        document.getElementById('ip_subdivision').value = geoipResponse.subdivisions[0].iso_code;
    };

    var onSuccess = function(geoipResponse) {
        updateCityText(geoipResponse);
    };

    var onError = function(error) {
        console.log('An error!  Please try again..');
    };

    return function() {
        if (typeof geoip2 !== 'undefined') {
            geoip2.city(onSuccess, onError);
        } else {
            console.log('A browser that blocks GeoIP2 requests')
        }
    };
}

//telefone internacional
const phoneInputField = document.querySelector("#partial_cellphone");
const phoneInput = window.intlTelInput(phoneInputField, {
    initialCountry: "br",
    preferredCountries: ["ar", "br", "py", "us"],
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});

/**
 * A função retorna se o número de celular inserido é válido ou não
 */
function verificaNumero() {
    const phoneNumber = phoneInput.getNumber();

    if (phoneInput.isValidNumber()) {
        console.log('formato válido');
        console.log(phoneNumber);
        document.getElementById('subscribe_cellphone').value = phoneNumber;
    } else {
        Swal.fire('Atenção', `Número de celular com formato inválido: ${phoneNumber}`, 'warning');       
    }
}

/**
 * Realiza o login do usuário após a inscrição
 */
async function login(){
    var formLogin = new FormData();
    formLogin.append('evento', evento.value);
    formLogin.append('language', 'pt');
    formLogin.append('pagina', 'live');
    formLogin.append('tipoLogin', 'authentication');
    formLogin.append('email', email.value);
    //formLogin.append('senha', password.value);

    try {
        const res = await fetch(urlLogin, {
            method: 'POST',
            body: formLogin
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
        }

    } catch (err) {
        console.log(err.message);
    }
}

/**
 * @param {string} x parâmetro para definir o redirecionamento do usuário
 */
function postSubscribe(x){
    if(x == "login"){
        //login
        login();
    }else if(x == "possubscribe"){
        Swal.fire({
            title: 'Sucesso',
            html: 'Seu cadastro foi realizado com sucesso!',
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            showConfirmButton: true,
            confirmButtonText: 'OK'
        }).then((result) => {
            if(result.value){
                window.location.href = `./`;
            }
        });
        
    }
}

formulary.addEventListener('submit', async event => {
    event.preventDefault();
    
    if(email.value != confirmemail.value){
        Swal.fire("Atenção", "Os emails precisam ser iguais", "warning");
    }else{
        //tudo certo
        btnSubmit.disabled = true;
        const formData = new FormData(formulary);

        try{
            const res = await fetch(url, {
                method: 'POST',
                body: formData
            });
    
            const resData = await res.json();
    
            console.log(resData.retorno);
            if(resData.retorno == 0 || resData.retorno == '0'){
                Swal.fire("Erro","Não foi possível realizar a inscrição, por favor, entre em contato com o suporte","error");
                
            }else if(resData.retorno == 1 || resData.retorno == '1'){
                postSubscribe(controlSubscribe.value);
            }else if(resData.retorno == 2 || resData.retorno == '2'){
                Swal.fire({
                    title: 'Atenção',
                    html: 'O email informado já se encontra cadastrado. Em caso de dúvida, por favor entre em contato com o suporte',
                    icon: 'info',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                }).then((result) => {
                    btnSubmit.disabled = false;
                    if(result.value){
                        window.location.href = './?page=home';
                    }
                });
                
            }else{
                Swal.fire('Atenção','Não foi possível realizar sua inscrição, por favor entre em contato com o suporte','warning');
                
            }
        }catch(err){
            Swal.fire('Atenção','Não foi possível realizar sua inscrição, por favor entre em contato com o suporte','warning');
            
            console.log(err.message);
            btnSubmit.disabled = false;
        }        
    }
})