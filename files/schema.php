<?php //
//Дополнительные поля в записях
// подключаем функцию активации мета блока (my_extra_fields)
add_action('add_meta_boxes', 'my_extra_fields', 1);

function my_extra_fields() {
	add_meta_box( 'extra_fields', 'Дополнительные поля', 'extra_fields_box_func', 'post', 'normal', 'high'  );
}
function extra_fields_box_func($post){
?>
<tr class="form-field">
<th scope="row" valign="top"><label>Микроразметка для Google:</label></th>
<td>
<input type="text" name="extra[description]" style="width:100%;height:30px;" value='<?php echo get_post_meta($post->ID, 'description', 1); ?>'><br />
<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<p class="description">Пример: <textarea style="width:100%;" rows="5" name="comment">&lt;script type="application/ld+json"&gt;{"@context": "https://schema.org","@type": "Product","name": "Гипсовая лепнина","image": "https://lepka.biz/wp-content/uploads/2021/09/Hypsovaia-lepnyna-Kyev-foto-tsena-ustanovka-lepnyn-pod-kliuch-s-pokraskoy-y-pozolotoy.jpg","brand": "Lepka","description": "","offers": {"@type": "AggregateOffer","lowPrice": "78","highPrice": "5432","priceCurrency": "UAH"},"aggregateRating": {"@type": "AggregateRating","ratingCount": "55","ratingValue": "4.9"}}&lt;/script&gt;</textarea></p>
</td>
</tr>
<?php
}
/* Сохранение данных в БД */
// включаем обновление полей при сохранении
add_action('save_post', 'my_extra_fields_update', 0);
## Сохраняем данные, при сохранении поста
function my_extra_fields_update($post_id) {
    // базовая проверка
    if (empty($_POST['extra']) || !wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__) || wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) return false;
    foreach ($_POST['extra'] as $key => $value) {
        if (empty($value)) {
            delete_post_meta($post_id, $key); // удаляем поле если значение пустое
            continue;
        }
        update_post_meta($post_id, $key, $value);
    }
    return $post_id;
}
?>