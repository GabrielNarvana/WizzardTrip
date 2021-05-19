<?php
    /**
     * Template Name: Cliente
     * Template Post Type: page
     *
     * @package WizzardTrip
     * @since 1.0.0
     */

    get_header();

    while ( have_posts() ) : the_post();
        $post->post_content = apply_filters( 'the_content', $post->post_content );
?>

    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-sm-6">
                <div class="d-flex flex-row align-items-center">
                    <div class="d-flex flex-column align-items-center">
                        <h5>Nome do usuario</h5>
                        <img src="../img/perfil.png" class="img-perfil border-0 rounded-3" alt="...">
                        <img src="../img/edit.png" class="img-edit hvr-grow  border-0" alt="...">
                    </div>
                    <div class="flex-column p-3">
                        <h6 class="mb-3"> <img src="../img/place.png" class="img-icon border-0 rounded-3" alt="..." />Endereço, N</h6>
                        <h6 class="mb-3"> <img src="../img/mail.png" class="img-icon border-0 rounded-3" alt="..." />email@dominio.com</h6>
                        <h6 class="mb-3"> <img src="../img/phone.png" class="img-icon border-0 rounded-3" alt="..." />(11) 98765-4321</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 text-right">
                <h4 class="mb-3">Sobre seu plano</h4>
                <h6 class="mb-3 prata">Plano atual: Prata</h6>
                <h6 class="mb-3">Status: Ativo<img src="../img/check-planos.png" class="img-icon border-0 rounded-3" alt="..." /></h6>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-sm-6">
                <h4 class="mb-3">Confira alguns lugares já visitados</h4>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Viagem São Paulo</h5>
                            <small>3 dias atrás</small>
                        </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Viagem Rio de janeiro</h5>
                            <small class="text-muted">Em 01/01/2020</small>
                        </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Viagem Curitiba</h5>
                            <small class="text-muted">Em 01/06/2019</small>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 text-right">
                <h5 class="d-block mb-3 hvr-grow pointer">
                    <a href="../views/Pacotes.html" class="stretched-link text-dark">Atualize seu plano</a>
                    <img src="../img/update.png" class="img-icon border-0 rounded-3" alt="..." />
                </h5>
                <h5 class="d-block mb-3 hvr-grow pointer">
                    <a href="../views/Pagamento.html" class="stretched-link text-dark">Atualize a forma de pagamento</a>
                    <img src="../img/pay.png" class="img-icon border-0 rounded-3" alt="..." />
                </h5>
                <h5 class="d-block mb-3 hvr-grow pointer">
                    <a href="#" class="stretched-link text-dark">Veja o Historico de cobrança</a>
                    <img src="../img/wallet.png" class="img-icon border-0 rounded-3" alt="..." />
                </h5>
            </div>
        </div>
    </div>

<?php
    endwhile;

    wp_reset_postdata();

    get_footer();