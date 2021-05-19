<?php
    /**
     * Template Name: Pagamento
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
    <div class="row">
    <div class="col-sm-4 m-3">
        <label for="Nome" class="form-label">CPF</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="123.234.567-89">
        </div>
        <label for="Nome" class="form-label">Nome do titular</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nome Sobrenome">
        </div>
        <label for="NumeroCartao" class="form-label">Numero do cartão</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="0000 0000 0000 0000">
        </div>
        <label for="Validade" class="form-label">Validade</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="05/2021">
        </div>
        <label for="CVV" class="form-label">CVV</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="000">
        </div>
        <label for="Parcelas" class="form-label">Parcelas</label>
        <div class="input-group mb-3">
            <select class="form-select" id="inputParcelas">
                <option selected>1x</option>
                <option value="1">2x</option>
                <option value="2">3x</option>
                <option value="3">4x</option>
            </select>
            <div class="botao-compra-pagamento">
                <a href="../views/Cliente.html" class="btn btn-primary botao-compra-pacotes roxo">Comprar</a>
            </div>
        </div>
    </div>
    <div class="col-sm-7 m-3 text-right">
        <h4 class="mb-3">Valor da assinatura</h4>
        <h6 class="mb-3">R$368,87 /mês</h6>
        <div class="d-flex flex-column">
            <h4 class="mb-3">Informações do plano escolhido</h4>
            <h5 class="mb-3">Plano Prata</h6>
            <p class="mb-3">Este plano fornece o escopo, passagens e hospedagem de uma viagem dentro dos limites da américa latina</p>
        </div>
    </div>
    </div>
</div>

<?php
    endwhile;

    wp_reset_postdata();

    get_footer();