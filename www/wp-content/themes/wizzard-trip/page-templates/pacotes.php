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
        
            <?php
                if ( have_rows('pacotes') ) :
                    while ( have_rows('pacotes') ) : the_row();
            ?>
                        <div class="card">
                            <img src="<?php echo get_sub_field("imagem"); ?>" class="card-img-top img-pacote">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo get_sub_field("nome"); ?></h5>
                                <p class="card-text"><?php echo get_sub_field("descricao"); ?></p>
                                <p class="card-text"><small class="text-muted">R$<?php echo get_sub_field("valor"); ?> /mês</small></p>
                                <?php 
                                    $url = is_user_logged_in() ? home_url() . "/pagamento/?plano=" . get_sub_field("nome") . "&descricao=" . get_sub_field("descricao") . "&valor=" . get_sub_field("valor") : home_url() . "/cadastro";
                                ?>
                                <a href="<?php echo $url; ?>" class="btn btn-primary botao-compra-pacotes roxo">Comprar</a>
                            </div>
                        </div>
            <?php
                    endwhile;
                endif;
            ?>
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