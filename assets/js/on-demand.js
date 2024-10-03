var defineConfig = (x) => {
    const cardElements = document.getElementsByClassName('card_element');
    const cardImage = document.getElementsByClassName('card_image');
    const cardBody = document.getElementsByClassName('card_body');
    const text_box = document.getElementsByClassName('text_box');
    const text_line = document.getElementsByClassName('text_line');

    if (x == 'list') {
        // definir configuração para exibição no modo lista
        for (y of cardElements) {
            y.classList.remove('col-md-6', 'col-lg-4', 'col-xl-3');
            y.classList.add('col-12');
        }

        for (g of cardImage) {
            g.classList.remove('col-12');
            g.classList.add('col-4');
        }

        for (h of cardBody) {
            h.classList.remove('col-12');
            h.classList.add('col-8');
            h.style.minHeight = "auto";
        }

        for (i of text_box){
            i.classList.add('d-none');
        }

        for (j of text_line){
            j.classList.remove('d-none');
        }

    } else if (x == 'grid') {
        // definir configuração para exibição no modo grid        
        for (y of cardElements) {
            y.classList.remove('col-12');
            y.classList.add('col-md-6', 'col-lg-4', 'col-xl-3');
            //col-md-6 col-lg-4 col-xl-3
        }

        for (g of cardImage) {
            g.classList.add('col-12');
            g.classList.remove('col-4');
        }

        for (h of cardBody) {
            h.classList.add('col-12');
            h.classList.remove('col-8');
            h.style.minHeight = "130px";
        }

        for (i of text_box){
            i.classList.remove('d-none');
        }

        for (j of text_line){
            j.classList.add('d-none');
        }

    }
}

const resetButton = document.querySelector('button[type="reset"]');
const searchForm = document.getElementById('form-search');

resetButton.addEventListener('click', (e) => {
    e.preventDefault();
    document.getElementById('pesquisa').value = '';
    document.getElementById('pesquisa').require = false;
    searchForm.submit();
});

if (sessionStorage.getItem('enable') == 1) {
    document.getElementById('enable').classList.remove('d-none');
} else {
    document.getElementById('disable').classList.remove('d-none');
}

function fechaAcesso(){
    $.post('./assets/php/ondemand.php', {
        controle: "fechaacesso",
        evento: $('#eventId').val(),
        usuario: sessionStorage.getItem('id')
    }).done(function(data){
        console.log('data');
    })
}

window.onload = () => {
    fechaAcesso();
}

/*
const btnLogout = `
    <li class="nav-item">
        <a class="nav-link text-uppercase baloo" href="./?page=logout">Sair</a>
    </li>
`;
document.querySelector('#navBarHeaderColapse>ul').innerHTML += btnLogout;
*/
document.getElementById('navLogout').parentElement.classList.remove('d-none');

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