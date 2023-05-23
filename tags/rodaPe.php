<!--Rodape-->
<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-lg-4 p-4">
            <h3 class="h-font fw-bold fs-3 mb-2">HOTEL PAUNDE.</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis possimus sapiente fugit
                deserunt eos harum, aliquid sit consectetur. Magni totam rerum velit! Suscipit odio earum itaque
                quidem iure, culpa quaerat.
            </p>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Links</h5>
            <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a> <br>
            <a href="instalacoes.php" class="d-inline-block mb-2 text-dark text-decoration-none">Instalcoes</a> <br>
            <a href="quartos.php" class="d-inline-block mb-2 text-dark text-decoration-none">Quartos</a> <br>
            <a href="contactos.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contacte-nos</a> <br>
            <a href="sobre.php" class="d-inline-block mb-2 text-dark text-decoration-none">Sobre nós</a>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Siga-nos</h5>

            <?php
            if ($contact_r['fecebook'] != '') {


                echo <<<data

<a href=" $contact_r[fecebook]" class="d-inline-block text-dark text-decoration-none mb-2 ">
<i class="bi bi-facebook me-1"></i> Facebook </a>
           
data;
            }
            ?>



            <a href="<?php echo $contact_r['instagram'] ?>" class="d-inline-block text-dark text-decoration-none ">

                <i class="bi bi-instagram me-1"></i> Instagram
            </a><br>


        </div>
    </div>

</div>

<h6 class="text-center bg-dark text-white p-3 m-0">Projetado e Desenvolvido por Rito Paunde e Felix Paunde</h6>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script>

    function alert(type, msg, position = 'body') {
        let bs_class = (type == 'sucess') ? 'alert-sucess' : 'alert-danger';
        let element = document.createElement('div');
        element.innerHTML = `   <div class="alert ${bs_class} alert-dismissible fade show" role="alert">
        <strong class="me-3>${msg}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> 
`;
        if (position = 'body') {
            document.body.append(element);
            element.classList.add('custom-alert');


        } else {
            document.getElementById(position).appendChild(element);

        }
        setTimeout(remAlert, 2000);

    }
    function remAlert() {
        document.getElementsByClassName('alert')[0], remove();

    }
    function setActive() {
        let navbar = document.getElementById('painel-menu');
        let a_tags = navbar.getElementsByTagName('a');

        for (i = 0; i < a_tags.length; i++) {
            let file = a_tags[i].href.split('/').pop();
            let fil_name = file.split('.')[0];

            if (document.location.href.indexOf(fil_name) >= 0) {
                a_tags[i].classList.add('activo');

            }
        }

    }
    let registro_form = document.getElementById('registro_form');
    registro_form.addEventListener('submit', (e) => {
        e.preventDefault();

        let data = new FormData();

        data.append('nome', registro_form.elements['nome'].value);
        data.append('email', registro_form.elements['email'].value);
        data.append('telefone', registro_form.elements['telefone'].value);
        data.append('endereco', registro_form.elements['endereco'].value);
        data.append('pincode', registro_form.elements['pincode'].value);
        data.append('data_Nascimento', registro_form.elements['data_Nascimento'].value);
        data.append('senha', registro_form.elements['senha'].value);
        data.append('conf_Senha', registro_form.elements['conf_Senha'].value);
        data.append('fperfil', registro_form.elements['fperfil'].files[0]);
        data.append('cadastrar', '');

        var myModal = document.getElementById('RegistrarModal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_registrar.php", true);

        xhr.onload = function () {
            if (this.responseText == 'pass_mismatch') {
                alert('error', "Senha Incompativel");

            } else if (this.responseText == 'email_pronto') {
                alert('error', "Registro de Email pronto");

            } else if (this.responseText == 'telefone_pronto') {
                alert('error', "Registro de telefone pronto");

            } else if (this.responseText == 'inv_img') {
                alert('error', "Apenas sao aceite imagens co  formato JPG,WEBP & PNG");


            } else if (this.responseText == 'upd_failed') {
                alert('error', "Falha ao carregar a Imagem");


            } else if (this.responseText == 'mail_falhou') {
                alert('error', "Registro de Email falhou");

            } else if (this.responseText == 'ins_falhou') {
                alert('error', "Registro falhou! servidor desconectador");

            } else {
                alert('sucess', 'Registro bem sucedido. Confirm o link enviado no seu email!');
                registro_form.reset();

            }

        }

        xhr.send(data);
    })
    setActive();

</script>