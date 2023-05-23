
let carousel_form = document.getElementById('carousel_form');
let foto_carousel_inp = document.getElementById('foto_carousel_inp');


carousel_form.addEventListener('submit', function (e) {
    e.preventDefault();
    adicionar_carousel();
});


function adicionar_carousel() {

    let data = new FormData();

    data.append('foto', foto_carousel_inp.files[0]);

    data.append('adicionar_foto', '');

    /*

    if (ome_membro_val.trim() === '' || foto_membro_val.trim() === '') {
        alert('Por favor, preencha todos os campos!');
        return;
    }
    */


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/carousel_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


    xhr.onload = function () {
        var myModalEl = document.getElementById('carousel-s');
        var modal = bootstrap.Modal.getInstance(myModalEl);
        modal.hide();
        if (this.responseText == 'inv_img') {
            alert('error', 'Apenas JPG and PNG sao aceitaveis');

        } else if (this.responseText == 'inv_size') {
            alert('error', 'Apenas imagem abaixo de 2MB');

        } else if (this.responseText == 'upd_failed') {
            alert('error', 'Falha a buscar a imagem');

        } else {
            alert('sucess', 'novo imagem adicionada');

            foto_carousel_inp.value = '';
            get_carousel();
        }

    }
    xhr.send(data);



}


function get_carousel() {

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/definicoes_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        document.getElementById('defi_administradores-data').innerHTML = this.responseText;


    }
    xhr.send('get_carousel');
}

function remov_imagem() {

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/carousel_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {

        if (this.responseText == 1) {
            alert('success', 'Imagem removida!');
            get_membros();
        } else {
            alert('error', 'server down');
        }

    }
    xhr.send('remov_imagem' + val);
}

window.onload = function () {

    get_carousel();


}



