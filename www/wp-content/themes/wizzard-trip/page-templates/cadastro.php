<?php
    /**
     * Template Name: Cadastro
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
                <form>
                    <h4>Quero ser cliente</h4>
                    <div class="form-group">
                        <label for="campoNome">Nome completo</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="campoTelefone">Telefone</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="campoEndereco">Endereço</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="campoEmail">Email</label>
                        <input type="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="campoSenha">Senha</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="campoConfirmaSenha">Confirme sua senha</label>
                        <input type="password" class="form-control">
                    </div>
                    <a href="../views/Entrar.html" class="btn btn-primary botao-compra-pacotes roxo">Cadastrar</a>
                </form>
            </div>
        </div>
    </div>

<?php
    endwhile;

    wp_reset_postdata();

    get_footer();