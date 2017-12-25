<?php
$true_page = 'site-options.php'; // это часть URL страницы, рекомендую использовать строковое значение, т.к. в данном случае не будет зависимости от того, в какой файл вы всё это вставите

/*
 * Функция, добавляющая страницу в пункт меню Настройки
 */
function true_options() {
	global $true_page;
	add_options_page( 'Параметры', 'Параметры', 'manage_options', $true_page, 'true_option_page');  
}
add_action('admin_menu', 'true_options');

/**
 * Возвратная функция (Callback)
 */ 
function true_option_page(){
	global $true_page;
	?><div class="wrap">
		<h2>Дополнительные параметры сайта</h2>
		<form method="post" enctype="multipart/form-data" action="options.php">
			<?php 
			settings_fields('true_options'); // меняем под себя только здесь (название настроек)
			do_settings_sections($true_page);
			?>
			<p class="submit">  
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
			</p>
		</form>
		</div><?php
	}

/*
 * Регистрируем настройки
 * Мои настройки будут храниться в базе под названием true_options (это также видно в предыдущей функции)
 */
function true_option_settings() {
	global $true_page;
	// Присваиваем функцию валидации ( true_validate_settings() ). Вы найдете её ниже
	register_setting( 'true_options', 'true_options', 'true_validate_settings' ); // true_options

 	// ЛОГОТИПЫ
	add_settings_section( 'section_logo', 'Логотипы', '', $true_page );

	$true_field_params = array(
		'type'      => 'text', 
		'id'        => 'logo-header-url',
		'label_for' => 'logo-header-url' 
	);
	add_settings_field( 'logo-header-url', 'Ссылка на логотип в хедере', 'true_option_display_settings', $true_page, 'section_logo', $true_field_params );

	$true_field_params = array(
		'type'      => 'text', 
		'id'        => 'logo-footer-url',
		'label_for' => 'logo-footer-url' 
	);
	add_settings_field( 'logo-footer-url', 'Ссылка на логотип в футере', 'true_option_display_settings', $true_page, 'section_logo', $true_field_params );

	// СОЦ. СЕТИ
	add_settings_section( 'section__socials', 'Социальные сети', '', $true_page );	

	$true_field_params = array(
		'type'      => 'text', 
		'id'        => 'facebook-url',
		'label_for' => 'facebook-url' 
	);
	add_settings_field( 'facebook-url', 'Ссылка на Facebook', 'true_option_display_settings', $true_page, 'section__socials', $true_field_params );

	$true_field_params = array(
		'type'      => 'text', 
		'id'        => 'twitter-url',
		'label_for' => 'twitter-url' 
	);
	add_settings_field( 'twitter-url', 'Ссылка на Twitter', 'true_option_display_settings', $true_page, 'section__socials', $true_field_params );

	// ГЛАВНЫЙ БЛОК
	add_settings_section( 'section__intro', 'Главный блок', '', $true_page );	

	$true_field_params = array(
		'type'      => 'text', 
		'id'        => 'intro-title',
		'label_for' => 'intro-title' 
	);
	add_settings_field( 'intro-title', 'Заголовок', 'true_option_display_settings', $true_page, 'section__intro', $true_field_params );

	$true_field_params = array(
		'type'      => 'textarea', 
		'id'        => 'intro-subtitle',
		'label_for' => 'intro-subtitle' 
	);
	add_settings_field( 'intro-subtitle', 'Подзаголовок', 'true_option_display_settings', $true_page, 'section__intro', $true_field_params );

	$true_field_params = array(
		'type'      => 'text', 
		'id'        => 'intro-bg',
		'label_for' => 'intro-bg' 
	);
	add_settings_field( 'intro-bg', 'Ссылка на фон', 'true_option_display_settings', $true_page, 'section__intro', $true_field_params );

	// СТАТИСТИКА
	add_settings_section( 'section__statistics', 'Статистика', '', $true_page );	

	$true_field_params = array(
		'type'      => 'text', 
		'id'        => 'statistics-title',
		'label_for' => 'statistics-title' 
	);
	add_settings_field( 'statistics-title', 'Заголовок блока', 'true_option_display_settings', $true_page, 'section__statistics', $true_field_params );

	$true_field_params = array(
		'type'      => 'text', 
		'id'        => 'statistics-val-1',
		'label_for' => 'statistics-val-1' 
	);
	add_settings_field( 'statistics-val-1', 'Первое значение:', 'true_option_display_settings', $true_page, 'section__statistics', $true_field_params );

	$true_field_params = array(
		'type'      => 'text', 
		'id'        => 'statistics-text-1',
		'label_for' => 'statistics-text-1' 
	);
	add_settings_field( 'statistics-text-1', 'Надпись', 'true_option_display_settings', $true_page, 'section__statistics', $true_field_params );

	$true_field_params = array(
		'type'      => 'text', 
		'id'        => 'statistics-img-1',
		'label_for' => 'statistics-img-1' 
	);
	add_settings_field( 'statistics-img-1', 'Ссылка на картинку', 'true_option_display_settings', $true_page, 'section__statistics', $true_field_params );

	$true_field_params = array(
		'type'      => 'text', 
		'id'        => 'statistics-val-2',
		'label_for' => 'statistics-val-2' 
	);
	add_settings_field( 'statistics-val-2', 'Второе значение:', 'true_option_display_settings', $true_page, 'section__statistics', $true_field_params );

	$true_field_params = array(
		'type'      => 'text', 
		'id'        => 'statistics-text-2',
		'label_for' => 'statistics-text-2' 
	);
	add_settings_field( 'tatistics-text-2', 'Надпись', 'true_option_display_settings', $true_page, 'section__statistics', $true_field_params );

	$true_field_params = array(
		'type'      => 'text', 
		'id'        => 'statistics-img-2',
		'label_for' => 'statistics-img-2' 
	);
	add_settings_field( 'statistics-img-2', 'Ссылка на картинку', 'true_option_display_settings', $true_page, 'section__statistics', $true_field_params );

	$true_field_params = array(
		'type'      => 'text', 
		'id'        => 'statistics-val-3',
		'label_for' => 'statistics-val-3' 
	);
	add_settings_field( 'statistics-val-3', 'Третье значение:', 'true_option_display_settings', $true_page, 'section__statistics', $true_field_params );

	$true_field_params = array(
		'type'      => 'text', 
		'id'        => 'statistics-text-3',
		'label_for' => 'statistics-text-3' 
	);
	add_settings_field( 'statistics-text-3', 'Надпись', 'true_option_display_settings', $true_page, 'section__statistics', $true_field_params );

	$true_field_params = array(
		'type'      => 'text', 
		'id'        => 'statistics-img-3',
		'label_for' => 'statistics-img-3' 
	);
	add_settings_field( 'statistics-img-3', 'Ссылка на картинку', 'true_option_display_settings', $true_page, 'section__statistics', $true_field_params );

	$true_field_params = array(
		'type'      => 'text', 
		'id'        => 'statistics-call',
		'label_for' => 'statistics-call' 
	);
	add_settings_field( 'statistics-call', 'Девиз', 'true_option_display_settings', $true_page, 'section__statistics', $true_field_params );

	// О НАС
	add_settings_section( 'section_about', 'Страница "О нас"', '', $true_page );

	$true_field_params = array(
		'type'      => 'text', 
		'id'        => 'about-slogan',
		'label_for' => 'about-slogan' 
	);
	add_settings_field( 'about-slogan', 'Cлоган', 'true_option_display_settings', $true_page, 'section_about', $true_field_params );

	$true_field_params = array(
		'type'      => 'text', 
		'id'        => 'about-bg',
		'label_for' => 'about-bg' 
	);
	add_settings_field( 'about-bg', 'Ссылка на фоновое изображение', 'true_option_display_settings', $true_page, 'section_about', $true_field_params );

}
add_action( 'admin_init', 'true_option_settings' );

/*
 * Функция отображения полей ввода
 * Здесь задаётся HTML и PHP, выводящий поля
 */
function true_option_display_settings($args) {
	extract( $args );

	$option_name = 'true_options';

	$o = get_option( $option_name );

	switch ( $type ) {  
		case 'text':  
		$o[$id] = esc_attr( stripslashes($o[$id]) );
		echo "<input class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";  
		echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
		break;
		case 'textarea':  
		$o[$id] = esc_attr( stripslashes($o[$id]) );
		echo "<textarea class='code large-text' cols='50' rows='10' type='text' id='$id' name='" . $option_name . "[$id]'>$o[$id]</textarea>";  
		echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
		break;
		case 'checkbox':
		$checked = ($o[$id] == 'on') ? " checked='checked'" :  '';  
		echo "<label><input type='checkbox' id='$id' name='" . $option_name . "[$id]' $checked /> ";  
		echo ($desc != '') ? $desc : "";
		echo "</label>";  
		break;
		case 'select':
		echo "<select id='$id' name='" . $option_name . "[$id]'>";
		foreach($vals as $v=>$l){
			$selected = ($o[$id] == $v) ? "selected='selected'" : '';  
			echo "<option value='$v' $selected>$l</option>";
		}
		echo ($desc != '') ? $desc : "";
		echo "</select>";  
		break;
		case 'radio':
		echo "<fieldset>";
		foreach($vals as $v=>$l){
			$checked = ($o[$id] == $v) ? "checked='checked'" : '';  
			echo "<label><input type='radio' name='" . $option_name . "[$id]' value='$v' $checked />$l</label><br />";
		}
		echo "</fieldset>";  
		break; 
		case 'uploader':
		echo "<fieldset>";
		if( function_exists( 'true_image_uploader_field' ) ) {
			true_image_uploader_field( $option_name . '[$id]', $v );
		}
		echo "</fieldset>";
		break;
	}
}

/*
 * Функция проверки правильности вводимых полей
 */
function true_validate_settings($input) {
	foreach($input as $k => $v) {
		$valid_input[$k] = trim($v);

		/* Вы можете включить в эту функцию различные проверки значений, например
		if(! задаем условие ) { // если не выполняется
			$valid_input[$k] = ''; // тогда присваиваем значению пустую строку
		}
		*/
	}
	return $valid_input;
}