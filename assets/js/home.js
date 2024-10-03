//home

function consultarVagas() 
{
    fetch('assets/php/home.php')
        .then(response =>
        {
            if (!response.ok) 
                throw new Error('Erro na consulta.');

            return response.json();
        })
        .then(data => 
        {
            if (data.vagas < 1)
            {
                document.querySelector('.vagas').innerText = `Vagas Esgotadas!`;
                let btnInscricao = document.querySelector('.btn-inscricao');

                btnInscricao.classList.remove('btn-green');
                btnInscricao.classList.add('btn-red');

                btnInscricao.href       = 'javacript:;';
                btnInscricao.innerText  = 'Vagas Esgotadas'; 
            }
            else
                document.querySelector('.num-vagas').innerText = `${data.vagas}`;
        })
        .catch(error => 
        {
            console.error(error);
        });
}
//consultarVagas();
