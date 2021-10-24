add_action( 'woocommerce_after_shop_loop_item', 'custom_display_post_meta', 9 );

//Добавляем надпись о доставке в каждом товаре
function dost() {echo ('<p class="infodost">Замовляйте за 2 дні до отримання</p>');}
add_action( 'woocommerce_before_add_to_cart_form', 'dost', 9 );
//
//Функция подсчета числа категории роз в заказе
function getCountProduct($count = 0) {
	$attr_name = 'troiandy'; // Название атрибута
	global $woocommerce;
	$items = $woocommerce->cart->get_cart();
	foreach($items as $item) {
		$_product = wc_get_product($item['data']->get_id());
		print_r ($_product->category_ids[0]);
		if(in_array($_product->get_categories($attr_name))) {
			$count++;
		}
	} return $count; echo $count;}

add_action( 'woocommerce_before_cart' , 'getCountProduct', 3 );
//
//Функция пересчета цен для определенной категории от количества товаров в корзине
function calculate_price( $cart_object ) {
	if ( is_admin() && ! defined( 'DOING_AJAX' ) )
		return;
	// it is our quantity of products in specific product category
	$quantity = 0;
 
	// $hash = cart item unique hash
	// $value = cart item data
	foreach ( $cart_object->get_cart() as $hash => $value ) {

		// check if the product is in a specific category ID
		if( in_array( 15, $value['data']->get_category_ids() ) // Проста перевірка продукту
|| isset( $value['data']->variation_id ) && has_term( 15, 'product_cat', $value['data']->parent_id ) // Перевірка варіативного
) { 	
			// Узнаем и считаем количество товаров
			$quantity += $value['quantity'];   	
			//Подсчет сколько заказано роз
		}
	}
	//Сколько заказано товаров этой категории
	wc_print_notice('Акція! При замовленні <b>від 51</b> і більше <b>троянд</b> діє знижка - 20%! ' . 'Замовлено: <b>' . $quantity . 'шт</b>');
	
	// change prices
	if( $quantity > 50 ) {
		//Добавляем уведомление что цены снижено
		function cong() {wc_print_notice ('Вітаємо! Ваша знижка на троянди активна. Ціни знижено на 20%');}
		add_action( 'woocommerce_before_cart' , 'cong', 1 );
		//Перебор и изменение цен товаров категории 15
		foreach ( $cart_object->get_cart() as $hash => $value ) {
			// I want to make discounts only for products in category with ID 15
		if( in_array( 15, $value['data']->get_category_ids() ) // Проста перевірка продукту
|| isset( $value['data']->variation_id ) && has_term( 15, 'product_cat', $value['data']->parent_id ) // Перевірка варіативного
) {   	
				//minus 20%
				$newprice = $value['data']->get_regular_price() * 0.8;  
				//устанавливаем новое значение
				$value['data']->set_price($newprice);
		}
	}}}
add_action( 'woocommerce_before_calculate_totals', 'calculate_price' );
//
function wc_minimum_order_amount() {
 // Установка минимального заказа корзины
$minimum = 500;
if ( WC()->cart->total < $minimum ) {	
if( is_cart() ) {
wc_print_notice(
  sprintf ('Мінімальне замовлення %s, Ваше замовлення %s Що додамо?',
 wc_price( $minimum ),
 wc_price( WC()->cart->total )
 ), 'error'
);	
} else {
wc_add_notice(
 sprintf ('Мінімальне замовлення %s, Ваше замовлення %s Що додамо?',
 wc_price( $minimum ),
 wc_price( WC()->cart->total )
 ), 'error'
 );
}
 }
}
add_action( 'woocommerce_checkout_process', 'wc_minimum_order_amount' );
add_action( 'woocommerce_before_cart' , 'wc_minimum_order_amount' );
/**
 *Авто обновление корзины при смене количества
 **/
add_action( 'wp_footer', 'cart_update_qty_script' );
function cart_update_qty_script() {
    if (is_cart()) :
    ?>
    <script>
		jQuery('div.woocommerce').bind('input keyup', '.qty', function(){
    var $this = jQuery(this);
    var delay = 1000; // 1 seconds delay after last input
    clearTimeout($this.data('timer'));
    $this.data('timer', setTimeout(function(){
       $this.removeData('timer');
jQuery("[name='update_cart']").trigger("click"); 
        // Do your stuff after 2 seconds of last user input
    }, delay));
});	
    </script>
    <?php
    endif;
}