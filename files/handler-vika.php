<?php
	echo ("Создание файла...");
	header("Content-Type: text/html; charset=utf-8");

	//$url_file = simplexml_load_file("1.xml"); // Путь до обрабатываемого файла
	$url_file = simplexml_load_file("https://sales-box-photos.s3.eu-central-1.amazonaws.com/vikaua/yml_ru.xml"); // Путь до обрабатываемого файла
	$name_new_file = "vika-ru.xml"; // Название файла для сохранения результата
	$separator = ">"; // Разделитель категорий

	$category_list = []; // Массив всех категорий в виде array(id => "", parent_id => "", name => "")
	$category_list_id = []; // Массив ID категорий
	$tree["0"] = ["id" => "", "parent_id" => "", "name" => ""]; // Начало дерева вложенных категорий

	@unlink($name_new_file);

	function get_parents($tree, $search_key, &$parents) { // Функция определения всех потомков где $tree - массив, $search_key - ключ, $parents - цепочка потомков
		
		if(is_array($tree)) {
			
			foreach($tree as $key => $value) {
			
				if($key == $search_key) {
				
					$parents[] = $value["name"];
				
					return true;
			
				} elseif($value && get_parents($value, $search_key, $parents)) {
				
					$parents[] = $value["name"];
				
					return true;
			
				}

			}
 
			return false;

		}

	}

	foreach($url_file->shop->categories->category as $category_item) {

		if(!isset($category_item["parentId"])) { // Если категория главная - указываем потомка 0

			$category_item["parentId"] = 0;

		}

		$category_list[] = ["id" => (String)$category_item["id"], "parent_id" => (String)$category_item["parentId"], "name" => (String)$category_item[0]];
		$category_list_id[] = (String)$category_item["id"];

	}

	// Делаем ID категории ее ключом, все остальное отправляем в значение

	foreach($category_list as $category) {
		
		$tree[$category["id"]] = $category;
		
		unset($tree[$category["id"]]["id"]);
	
	}

	// Формируем дерево категорий согласно их иерархии
	
	foreach($tree as $category_id => $category_value) {
		
		if(isset($tree[$category_value["parent_id"]])) {
			
			$tree[$category_value["parent_id"]][$category_id] = &$tree[$category_id];
		
		}
	
	}

	// Переобходим товары, меняем их структуру и указываем читаемые категории

	$content = <<<HTML
<?xml version="1.0" encoding="utf-8"?>

<data>
	
	<products>
HTML;

	file_put_contents($name_new_file, $content."\r\n", FILE_APPEND);

	foreach($url_file->shop->offers->offer as $items) {

		$price = $items->price; // Цена

		$parents = [];
		get_parents($tree[0], $items->categoryId[0], $parents); 
		$parents0 = array_reverse($parents, true);	
		$cat_names0 = implode($separator, $parents0); // Цепочка категорий

		$parents = [];
		get_parents($tree[0], $items->categoryId[1], $parents); 
		$parents1 = array_reverse($parents, true);
		$cat_names1 = implode($separator, $parents1); // Цепочка категорий	

		$parents = [];
		get_parents($tree[0], $items->categoryId[2], $parents); 
		$parents2 = array_reverse($parents, true);
		$cat_names2 = implode($separator, $parents2); // Цепочка категорий	

		$parents = [];
		get_parents($tree[0], $items->categoryId[3], $parents); 
		$parents3 = array_reverse($parents, true);
		$cat_names3 = implode($separator, $parents3); // Цепочка категорий	

		$parents = [];
		get_parents($tree[0], $items->categoryId[4], $parents); 
		$parents4 = array_reverse($parents, true);
		$cat_names4 = implode($separator, $parents4); // Цепочка категорий	
		
		$catnew = ($cat_names0 . "|" . $cat_names1 . "|" . $cat_names2 . "|" . $cat_names3 . "|" . $cat_names4); //Берем узлов 5 категорий
		$catnew = trim($catnew, '|'); //обрезаем | в конце

		//echo ("<br><pre>");
		//$picnew = ($pic[0] . "," . $pic[1] . "," . $pic[2] . "," . $pic[3]. "," . $pic[4] );
		//$picnew = trim($picnew, ',');
		//print_r($items->categoryId[0]);
		//print_r($items->categoryId[1]); print_r($items->categoryId[2]); print_r($items->categoryId[3]); print_r($items->categoryId[4]);
		//echo($cat_names0 . "<br>" . $cat_names1 . "<br>" . $cat_names2 . "<br>" . $cat_names3 . "<br>" . $cat_names4);
		//echo($catnew);
		//echo ("<br></pre>");


		$cat_name = implode($separator, $parents); // Цепочка категорий

		$id = $items->attributes()->id;
		$name = $items->name; // Название
		$name = str_replace(array ("&", "<", ">"), array ("&amp;", "&lt;", "&gt;"), $name); //Замена символов для xml
		
		$pic = $items->picture; // Картинка
		$picnew = ($pic[0] . "," . $pic[1] . "," . $pic[2] . "," . $pic[3]. "," . $pic[4] ); //Берем до 5 картинок через запятую
		$picnew = trim($picnew, ','); //обрезаем запятую в конце	
		

		//$vendor = $items->vendor; // Производитель
		
		$description = $items->description;
		$description = str_replace(array ("&", "<", ">"), array ("&amp;", "&lt;", "&gt;"), $description); //Замена символов для xml	

		$content = <<<HTML

			<product>
				<id>{$id}</id>
				<name>{$name}</name>
				<price>{$price}</price>
				<description>{$description}</description>
				<cat_name>{$catnew}</cat_name>
				<picture>{$picnew}</picture>
			</product>

HTML;

		file_put_contents($name_new_file, $content."\r\n", FILE_APPEND);

	}


	$content = <<<HTML
	</products>

</data>
HTML;
	
	file_put_contents($name_new_file, $content, FILE_APPEND);


//echo(header('content-type: text/xml'));
echo ("Файл создан! Сылка на файл: " . '<a href="https://vika.market/xml/vika-ru.xml">https://vika.market/xml/vika-ru.xml</a>');

?>