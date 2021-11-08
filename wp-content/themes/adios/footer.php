<?php
/**
 * Footer file
 *
 * @package adios
 * @since 1.0
 */
?>

<?php adios_footer_template(adios_get_opt('footer-template')); ?>
<?php wp_footer(); ?>

    <script>
jQuery(function(){
	jQuery(".lead").on("click", function() {
    	//alert("Clicado");
		gtag('event','clicar', {'event_category':'CapturaDeLead','event_label':'Formulario_De_Contato','value':500});
    });
});
</script>

 <! - BEGIN PLERDY CODE ->
<script type = "text / javascript" defer>
    var _protocol = (("https:" == document.location.protocol)? "https: //": "http: //");
    var _site_hash_code = "21cf8ea79a08f9c2fc5e8980558aab50";
    var _suid = 18777;
    </script>
<script type = "text / javascript" defer src = "https://a.plerdy.com/public/js/click/main.js"> </script>
<! - CÓDIGO FINAL DA PLERDY ->
  
</body>
</html>