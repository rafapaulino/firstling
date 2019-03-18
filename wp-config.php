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
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'firstling' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

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
define( 'AUTH_KEY',         '?<Yk e*@QhlJG/J|gG- GXD=.aNy.X[*h(uJTCjp4xw*1pAD<^~m!yt>^~hlP-B?' );
define( 'SECURE_AUTH_KEY',  '7&MhPFRckGkYau7EYOz>L+5#b}vNvmv>,yrnOrpOkeGwoaru;Q3e@V:ZBo9k}2Vv' );
define( 'LOGGED_IN_KEY',    'yR$`jg>UO($>A1}W?TT >n5>9 i*NQis&hG~>#(a`3fCaJ1a^Z=X`B3Yloa#en[c' );
define( 'NONCE_KEY',        '_T+YANZ)>&C*dIFYt3c6E5]nw8`pnmZT/w^|xw@>sPEY@lw]mbg0kdbrO5gM@w_0' );
define( 'AUTH_SALT',        'onAx.bT{.fw>cU )%g>JpdiZL;*g28dcD{TKz{G;|kdyi[Kgy4*}8c~+$Xo.p/_V' );
define( 'SECURE_AUTH_SALT', 'zriJXy(lmToNy,pt89.MKy0%P&E9jFV]c_3r+1H7T#dd[Pw+)Ju=0d(>q;vrr&YP' );
define( 'LOGGED_IN_SALT',   '$vF7xOF&r-MYjHq@uE$+7Z8?#SDaS`qu~-i|Xwa5W*%DO7T0D H![6YX4jKr4wIU' );
define( 'NONCE_SALT',       '?_W6f7t_z~k4q#.(gEx)t8Pzq4LMz&)}RG+$u%z{b,^^6-VI?r>3H4/M&4D< #uk' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'ftwp_';

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
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
