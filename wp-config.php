<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'uportfolio' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ryQJ+(=|DbB(VQi7CUKT(|#nEO<eqcyObW{Q$BVRo7&6|}yw@6W~V~Ft.Ca2M1?!' );
define( 'SECURE_AUTH_KEY',  '+h@M;YlgyOU|0c0<8S~) H[r.M}lE=ckc)$&n$$ )1+]o9B0#P_0rRtA;P;]1_Kw' );
define( 'LOGGED_IN_KEY',    'CR9&tgos5?[#Ssqu_`3j@&-Y,BPW2.QhYu5PdN43c9? x2!4<,5*/}D4AY)&8rm$' );
define( 'NONCE_KEY',        '[-e%%d6xp(d^P;NrdvloE+RnEleZe{W?Buu4k4)=Gy?bzKw~77Il/xq,.7,`D4{>' );
define( 'AUTH_SALT',        'J2+?u7%|ix]tf[-qU]:E;T%aC%s88Q rQ7LG/4k?18yTs;So=c$CF7#;^X,^idN5' );
define( 'SECURE_AUTH_SALT', 'uT}B7yf,%sWAl4}h.WVbfCLL&)=X![AYB[RpKcgNd@QucfvDd*pp$J&Dus<2G[dP' );
define( 'LOGGED_IN_SALT',   '5Vb{m@+=[8U<FCj:@zdsXMru-DyGv}ZN;jWS+(4,=Kf3s5+yg<-pZL$z47?D7/%D' );
define( 'NONCE_SALT',       'ilHmm;VdKp^MC91ArVM0dV];AmOEOOt:OIlkWpdS1x8@hHMKmRKZD64FRO_4^+J?' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
