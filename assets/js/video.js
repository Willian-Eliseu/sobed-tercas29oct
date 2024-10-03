window.addEventListener('load', function() {
    $.post('./assets/php/video.php', {
        id: $('#id').val(),
        key: $('#key').val(),
        course: $('#course').val(),
        order: $('#order').val(),
        userid: sessionStorage.getItem('id')
    })
})

function showFullText() {
    document.getElementById('textIni').classList.add('d-none');
    document.getElementById('textPos').classList.remove('d-none');
}

function ocultFullText() {
    document.getElementById('textIni').classList.remove('d-none');
    document.getElementById('textPos').classList.add('d-none');
}