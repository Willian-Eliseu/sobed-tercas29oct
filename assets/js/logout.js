$(document).ready(function() {
    Swal.fire({
        title: "Logout",
        text: "Quer realmente sair?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Sim, sair",
        cancelButtonText: "Não"
    }).then((result) => {
        if (result.isConfirmed) {
            //limpando a sessão javascript
            sessionStorage.clear();
            $.post("./assets/php/logout.php", function() {
                window.location.href = `./?page=home`;
            })
        } else {
            history.back();
        }
    })
})