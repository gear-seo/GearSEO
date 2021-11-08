<?php
/**
 * Header file
 *
 * @package adios
 * @since 1.0
 */
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    
<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "3ykrud2w8e");
</script>

<meta name="p:domain_verify" content="d4efc9861d9e4ca481c3bb9adc9ffc7d"/>

  </head>
  <body <?php body_class(); ?>>

  <?php adios_loader('general-loader-logo', get_template_directory_uri().'/img/logo.png'); ?>
  <?php adios_header_template(adios_get_opt('header-template')); ?>
  <?php adios_title_wrapper_template(adios_get_opt('title-wrapper-template')); ?>