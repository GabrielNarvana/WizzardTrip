<?php
    /**
     * Template Name: Pacotes
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
        <div class="card-group">
            <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/rio.jpg" class="card-img-top img-pacote">
                <div class="card-body">
                    <h5 class="card-title">Plano Bronze</h5>
                    <p class="card-text">Para os amantes de viagens nacionais oferecemos o que o Brasil tem de melhor desde suas praias em vários cantos do País até pontos turísticos que vai de Cristo Redentor até as cataratas do Iguaçu</p>
                    <p class="card-text"><small class="text-muted">R$256,87 /mês</small></p>
                    <a href="../views/Pagamento.html" class="btn btn-primary botao-compra-pacotes roxo">Comprar</a>
                </div>
            </div>
            <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/peru.jpg" class="card-img-top img-pacote">
                <div class="card-body">
                    <h5 class="card-title">Plano Prata</h5>
                    <p class="card-text">Escolher a América Latina como seu plano é garantia de encontrar lugares fascinantes. De praias a desertos, de ilhas a cidades históricas passando por sítios arqueológicos de importância histórica única.</p>
                    <p class="card-text"><small class="text-muted">R$368,87 /mês</small></p>
                    <a href="../views/Pagamento.html" class="btn btn-primary botao-compra-pacotes roxo">Comprar</a>
                </div>
            </div>
            <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/paris.jpg" class="card-img-top img-pacote">
                <div class="card-body">
                    <h5 class="card-title">Plano Ouro</h5>
                    <p class="card-text">Não tenha limites e viaje o mundo todo, seja uma viagem na Europa ou até mesmo no continente asiático, nós oferecemos o que o mundo tem de melhor para você. Com viagens inesquecíveis ao redor do mundo.</p>
                    <p class="card-text"><small class="text-muted">R$598,47 /mês</small></p>
                    <a href="../views/Pagamento.html" class="btn btn-primary botao-compra-pacotes roxo">Comprar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th class="bronze" scope="col">Bronze</th>
                    <th class="prata" scope="col">Prata</th>
                    <th class="ouro" scope="col">Ouro</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Viagens Nacionais</th>
                    <td><img src="<?php echo get_template_directory_uri(); ?>/assets/img/check-planos.png" class="img-icon bronze-img border-0 rounded-3" alt="..." /></td>
                    <td><img src="<?php echo get_template_directory_uri(); ?>/assets/img/check-planos.png" class="img-icon prata-img border-0 rounded-3" alt="..." /></td>
                    <td><img src="<?php echo get_template_directory_uri(); ?>/assets/img/check-planos.png" class="img-icon ouro-img border-0 rounded-3" alt="..." /></td>
                </tr>
                <tr>
                    <th scope="row">Viagens Internacionais na America do Sul</th>
                    <td></td>
                    <td><img src="<?php echo get_template_directory_uri(); ?>/assets/img/check-planos.png" class="img-icon prata-img border-0 rounded-3" alt="..." /></td>
                    <td><img src="<?php echo get_template_directory_uri(); ?>/assets/img/check-planos.png" class="img-icon ouro-img border-0 rounded-3" alt="..." /></td>
                </tr>
                <tr>
                    <th scope="row">Viagens Internacionais no Mundo</th>
                    <td></td>
                    <td></td>
                    <td><img src="<?php echo get_template_directory_uri(); ?>/assets/img/check-planos.png" class="img-icon ouro-img border-0 rounded-3" alt="..." /></td>
                </tr>
            </tbody>
        </table>
    </div>

<?php
    endwhile;

    wp_reset_postdata();

    get_footer();