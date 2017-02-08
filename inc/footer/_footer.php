<?php
/// TODO:
// - pull logic below into dedicated function(s).
$social_fields = array(
    'contact_info_instagram',
    'contact_info_linkedin'
);

$social_values = array();

foreach( $social_fields as $field ) {
    $key = explode( '_', $field );

    $val = get_theme_mod( $field );

    if ( $val ) {
        $social_values[ $key[ 2 ] ] = $val;
    }
}
?>

<footer class="footer">
    <div class="footer__inner">
        <ul class="footer-list">
            <li class="footer-list__item">
                <a href="mailto:<?= get_theme_mod( 'contact_info_email' ); ?>"><?= get_theme_mod( 'contact_info_email' ); ?></a>
            </li>
        </ul>
        <?php
        if ( count( $social_values ) ):
        ?>
        <ul class="footer-list">
            <?php
            foreach( $social_values as $key => $val ):
            ?>
            <li class="footer-list__item">
                <a href="<?= $val; ?>" target="_blank"><?= ucfirst( $key ); ?></a>
            </li>
            <?php
            endforeach;
            ?>
        </ul>
        <?php
        endif;
        ?>
    </div>
</footer>