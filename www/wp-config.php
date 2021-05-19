<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'wp_wizzard' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4_unicode_ci' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'NEF+$!j0AaW/Z:TVj JMB/APR0qaZerk4BE`/WOh]fUsz@BDvnY6yrD&1--aoNf+' );
define( 'SECURE_AUTH_KEY',  '6$lA}P)Yx[O] tx!iEO;Zx9:/npRJgi,ZOjh+t/qqct JC4<_0@jZz#w>x[.) Fg' );
define( 'LOGGED_IN_KEY',    'y@&W(M99;yw:cS|x+#aziZ]GicdBy$I`9T18L+ D-;}r6.RAE&sv`.8Qv,oevXqQ' );
define( 'NONCE_KEY',        '+)IFyWrV,yhMW(UYdpl0ueSWWpqg.Cr25(,sDv4YXu}(:>,:ym+L4@D/7f]v|f<J' );
define( 'AUTH_SALT',        'V%50&n/@Okz,R4Bu$/(mV+Zl37+8W2kIj+ %-9SookjBB(8B1wU>%*n[h==5OjhZ' );
define( 'SECURE_AUTH_SALT', ',H@rEH+ uos_:OPGZ*gDRY5FevPv!CWY*!n`ENQTn<8IR7;4Nb/Y&t~Q8{-6@m01' );
define( 'LOGGED_IN_SALT',   '~T^)QHBMU4]R91xdwr&y >L1bi]qaw=V@Z,J(Zlb#eo3AFbA$@$-S)^0#xk2>;w[' );
define( 'NONCE_SALT',       '7sp0>Uj*%D/CJvh%^]]xKzFP|>GP(S+_Y-;<@Xrg~&bF7ryTv`s6hn4R.o&nTlAl' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';

set_time_limit(300);