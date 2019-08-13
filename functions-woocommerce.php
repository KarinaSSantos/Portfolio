<?php
//varios códigos úteis para modificar coisas no woocommerce

//add preço de valor unitário nos produtos  Importante: necessário criar o campo personalizado

function cw_change_product_price_display( $price ) {
	 $unit_price = get_field('valor_unitario');
	 if (function_exists('get_field')){
		if (!empty (get_field('valor_unitario'))){
        $price .= " <p>Valor Unitário: </span <span class='unit-price'>". get_field('valor_unitario'). "</p>";
        return $price;
      }
		 else {
			 $price;
			 return $price;
		 }
		 
	 }
 }
      add_filter( 'woocommerce_get_price_html', 'cw_change_product_price_display' );
      add_filter( 'woocommerce_cart_item_price', 'cw_change_product_price_display' );

      
//add linha "a partir de:" no preço variavel dos produtos

function fa_custom_range_price( $price, $from, $to )
{
    return sprintf('A partir de %s', wc_price($from));
}
add_filter('woocommerce_format_price_range', 'fa_custom_range_price', 10, 3);

?>
