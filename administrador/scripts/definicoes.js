


let general_data, contactos_data;


let contactos_form = document.getElementById('contactos_form');

let administradores_form = document.getElementById('administradores_form');
let nome_membro_inp = document.getElementById('nome_membro_inp');
let foto_membro_inp = document.getElementById('foto_membro_inp');


function get_geral() {

    let titulo_pagina = document.getElementById('titulo_pagina');
    let sobre_pagina = document.getElementById('sobre_pagina');

    let titulo_pagina_inp = document.getElementById('titulo_pagina_inp');
    let sobre_pagina_inp = document.getElementById('sobre_pagina_inp');




    let encerrar_toggle = document.getElementById('encerrar-toggle');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/definicoes_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        general_data = JSON.parse(this.responseText);
        titulo_pagina.innerText = general_data.titulo_pagina;
        sobre_pagina.innerText = general_data.sobre_pagina;

        titulo_pagina_inp.value = general_data.titulo_pagina;
        sobre_pagina_inp.value = general_data.sobre_pagina;


        if (general_data.encerrar == 0) {
            encerrar_toggle.checked = false;
            encerrar_toggle.value = 0;

        } else {
            encerrar_toggle.checked = true;
            encerrar_toggle.value = 1;

        }


    }
    xhr.send('get_geral');
}


function upd_geral(titulo_pagina_val, sobre_pagina_val) {
    if (titulo_pagina_val.trim() === '' || sobre_pagina_val.trim() === '') {
        alert('Por favor, preencha todos os campos!');
        return;
    }

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/definicoes_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        var myModalEl = document.getElementById('defi_geral-s');
        var modal = bootstrap.Modal.getInstance(myModalEl);
        modal.hide();
        if (this.responseText == 1) {
            get_geral();
        } else {
            alert('Ocorreu um erro ao atualizar os dados!');
        }
    };
    xhr.send('titulo_pagina=' + titulo_pagina_val + '&sobre_pagina=' + sobre_pagina_val + '&upd_geral');
}




function upd_encerrar(val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/definicoes_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {



        if (this.responseText == 1 && general_data.encerrar == 0) {


        }
        else {

        }

        get_geral();

    }
    xhr.send('upd_encerrar=' + val);


}



function get_contactos() {
    let contactos_p_id = ['endereco', 'gmap', 't1', 't2', 'email', 'fb', 'insta', 'iframe'];
    let iframe = document.getElementById('iframe');


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/definicoes_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {

        contactos_data = JSON.parse(this.responseText);
        contactos_data = Object.values(contactos_data);

        for (i = 0; i < contactos_p_id.length; i++) {
            document.getElementById(contactos_p_id[i]).innerText = contactos_data[i + 1];


        }
        iframe.src = contactos_data[8];
        contactos_inp(contactos_data);



    }
    xhr.send('get_contactos');
}
function contactos_inp(data) {
    let contactos_inp_id = ['endereco_inp', 'gmap_inp', 't1_inp', 't2_inp', 'email_inp', 'fb_inp', 'insta_inp', 'iframe_inp'];
    for (i = 0; i < contactos_inp_id.length; i++) {
        document.getElementById(contactos_inp_id[i]).value = data[i + 1];


    }
}
contactos_form.addEventListener('submit', function (e) {
    e.preventDefault();
    upd_contactos();
})
function upd_contactos() {
    let index = ['endereco', 'gmap', 't1', 't2', 'email', 'fb', 'insta', 'iframe'];
    let contactos_inp_id = ['endereco_inp', 'gmap_inp', 't1_inp', 't2_inp', 'email_inp', 'fb_inp', 'insta_inp', 'iframe_inp'];
    let data_str = "";

    for (i = 0; i < index.length; i++) {
        let value = document.getElementById(contactos_inp_id[i]).value.trim();
        if (value === '') {

            alert('Por favor, preencha todos os campos!');
            return;
        }
        data_str += index[i] + "=" + value + '&';
    }
    data_str += "upd_contactos";
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/definicoes_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        var myModalEl = document.getElementById('contactos-s');
        var modal = bootstrap.Modal.getInstance(myModalEl);
        modal.hide();

        if (this.responseText == 1) {
            get_contactos();
        } else {

        }
    }
    xhr.send(data_str);
}

administradores_form.addEventListener('submit', function (e) {
    e.preventDefault();
    adicionar_membro();
});

/*
        function adicionar_membro() {

            let data = new FormData();
            data.append('nome', nome_membro_inp.value);
            data.append('foto', foto_membro_inp.files[0]);

            data.append('adicionar_membro', '');

            //
            
                        if (ome_membro_val.trim() === '' || foto_membro_val.trim() === '') {
                            alert('Por favor, preencha todos os campos!');
                            return;
                        }
                       ///


            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/definicoes_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


            xhr.onload = function () {
                var myModalEl = document.getElementById('defi_administradores-s');
                var modal = bootstrap.Modal.getInstance(myModalEl);
                modal.hide();
                if (this.responseText == 'inv_img') {
                    alert('error', 'Apenas JPG and PNG sao aceitaveis');

                } else if (this.responseText == 'inv_size') {
                    alert('error', 'Apenas imagem abaixo de 2MB');

                } else if (this.responseText == 'upd_failed') {
                    alert('error', 'Falha a buscar a imagem');

                } else {
                    alert('sucess', 'novo membro adicionado');
                    nome_membro_inp.value = '';
                    foto_membro_inp.value = '';
                    get_membros();
                }

            }
            xhr.send(data);



        }
        */
function adicionar_membro() {
    // Obtenha os dados do formulário
    let form = document.querySelector('#form_adicionar_membro');
    let formData = new FormData(form);

    // Envie os dados do formulário para o arquivo PHP usando AJAX
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'definicoes_crud.php');
    xhr.onreadystatechange = function () {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            // Processar a resposta do servidor aqui
            console.log(this.responseText);
        }
    };
    xhr.send(formData);
}

function get_membros() {

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/definicoes_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        document.getElementById('defi_administradores-data').innerHTML = this.responseText;


    }
    xhr.send('get_membros');
}

function remov_membros() {

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/definicoes_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {

        if (this.responseText == 1) {
            alert('success', 'membro removido!');
            get_membros();
        } else {
            alert('error', 'server down');
        }

    }
    xhr.send('remov_membros' + val);
}

window.onload = function () {
    get_geral();
    get_contactos();
    get_membros();

}

function reserveQuarto(quartoId) {
    var confirmacao = confirm("Você deseja reservar este quarto?");

    if (confirmacao) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../tags/reservar_quarto.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert("Quarto reservado com sucesso!");
                // Atualize o status do quarto na interface ou faça outra ação necessária
            } else if (xhr.readyState === 4 && xhr.status !== 200) {
                alert("Ocorreu um erro ao reservar o quarto. Por favor, tente novamente.");
            }
        };

        xhr.send("quarto_id=" + quartoId);
    }
}




