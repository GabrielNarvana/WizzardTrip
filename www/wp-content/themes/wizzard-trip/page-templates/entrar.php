<?php
    /**
     * Template Name: Entrar
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
        <div class="row m-5 justify-content-center">
        <div class="col-sm-6">
            <!-- <form>
                <h4>Já sou cliente</h4>
                <div class="form-group">
                    <label for="campoEmail">Email</label>
                    <input type="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="campoSenha">Senha</label>
                    <input type="password" class="form-control">
                    <small class="form-text text-muted esqueceu">Esqueceu sua senha?</small>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input">
                    <label class="form-check-label" for="CheckRemember">Lembrar-me</label>
                </div>
                <div class="form-group">
                    <a href="../views/Cliente.html" class="btn btn-primary roxo">Entrar</a>
                    <a href="../views/Cadastro.html" class="btn btn-primary roxo">Cadastre-se</a>
                </div>
            </form> -->
            <?php echo do_shortcode('[forminator_form id="49"]'); ?>
        </div>
        </div>
    </div>

<?php
    endwhile;

    wp_reset_postdata();

    get_footer();