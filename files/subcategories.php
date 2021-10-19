<?php
//echo ('<div><span class="widgettitle">Categorii</span><ul>');
//Запрос категорий
$args = array('taxonomy' => 'product_cat', 'orderby' => 'menu_order', 'hide_empty' => 1,);
$product_categories = get_terms($args);
//Перебор категорий
echo ('<ul class="parrent">');
foreach ($product_categories as $category) {
    if ($category->parent == 0) {
        # получаем дочерние рубрики
        $parent_id = $category->term_id;
        $childCategories = get_terms(array('taxonomy' => 'product_cat', 'parent' => $parent_id, 'hide_empty' => 1,));
        if ($childCategories) {
            //Выводим информацию о подкатегории 1 уровня
            echo ('<li class="cat-item');
            if ((get_queried_object()->term_id) == $category->term_id) {
                echo (' current-cat');
            }
            echo ('"><details><summary>');
            echo ('<a href=' . get_term_link($category) . '>' . $category->name . '</a>');
            echo ('</summary>');
            //Перебор подкатегорий
            echo ('<ul class="children">');
            foreach ($childCategories as $childCategory) {
                //Получаем родительские рубрики 2 група
                #######222222222########
                # получаем дочерние рубрики
                $parent_idnew = $childCategory->term_id;
                $childCategoriesnew = get_terms(array('taxonomy' => 'product_cat', 'parent' => $parent_idnew, 'hide_empty' => 1,));
                if ($childCategoriesnew) {
                    //Выводим информацию о подкатегории 2 уровня
                    echo ('<li class="cat-item');
                    if ((get_queried_object()->term_id) == $childCategory->term_id) {
                        echo (' current-cat');
                    }
                    echo ('"><details><summary>');
                    echo ('<a href=' . get_term_link($childCategory) . '>' . $childCategory->name . ' (' . $childCategory->count . ')' . '</a>');
                    echo ('</summary>');
                    # получаем дочерние рубрики 3 группа
                    $parenttwo_id = $childCategory->term_id;
                    $childCategoriestwo = get_terms(array('taxonomy' => 'product_cat', 'child_of' => $parenttwo_id, 'hide_empty' => 1));
                    //Перебор подкатегорий
                    echo ('<ul class="childrentwo">');
                    foreach ($childCategoriestwo as $childCategorytwo) {
                        if ($childCategoriestwo) {
                            //Выводим информацию о подкатегории 3 уровня
                            echo ('<li class="cat-item');
                            if ((get_queried_object()->term_id) == $childCategorytwo->term_id) {
                                echo (' current-cat');
                            }
                            echo ('">');
                            echo ('<a href=' . get_term_link($childCategorytwo) . '>' . $childCategorytwo->name . ' (' . $childCategorytwo->count . ')' . '</a>');
                            echo ('</li>');
                        } else {
                        }
                    }
                    echo ('</ul>');
                    echo ('</details></li>');
                } else {
                    //Выводим информацию о подкатегории 2 уровня
                    echo ('<li class="cat-item');
                    if ((get_queried_object()->term_id) == $childCategory->term_id) {
                        echo (' current-cat');
                    }
                    echo ('">');
                    echo ('<a href=' . get_term_link($childCategory) . '>' . $childCategory->name . ' (' . $childCategory->count . ')' . '</a>');
                    echo ('</li>');
                }
                ###2222222222222###
                
            }
            echo ('</ul>');
        } else {
            //Выводим информацию о категории если нет дочерних
            echo ('<li class="cat-item');
            if ((get_queried_object()->term_id) == $parenttwo_id) {
                echo (' current-cat');
            }
            echo ('">');
            echo ('<a href=' . get_term_link($category) . '>' . $category->name . '</a>');
        }
        echo ('</details></li>');
    }
}
echo ('</ul>');
?>
<script>
	document.addEventListener('DOMContentLoaded', (event) => { //DOM полностью загружен и разобран
	var elem = document.querySelectorAll("li.cat-item") // Получаем всех 
	elem.forEach(function(userItem) {
  	//console.log(userItem);
  	if(userItem.classList.contains('current-cat')) {
	userItem.parentNode.parentNode.setAttribute('open', ''); // Раскрываем ближайшего родителя
	userItem.parentNode.parentNode.parentNode.parentNode.parentNode.setAttribute('open', ''); // Раскрываем верхнего род
	userItem.firstChild.setAttribute('open', ''); //Раскрываем дочерние категории
	  }
	});
	});
</script>
<style>
	.Category.Woo {
    padding: 0 0 14px 0;
    background-color: #f7f7f7;
}
	.Category.Woo .widgettitle {
    color: #fff;
    /*background: linear-gradient(to top, #0d9f67, #3cd98d);*/
	    background: linear-gradient(to top, #2f45bf, #2643cf);
    display: block;
    padding: 15px;
	text-transform: capitalize;	
}
	li:first-letter {text-transform: capitalize;}
	ul.parrent {
    padding: 0 20px;
}
	ul.children {
    padding: 0 30px;
}
	li.cat-item {
    white-space: nowrap;
}
	li.cat-item.current-cat {
    font-weight: bold;
    color: #000;
}
		li.cat-item {
    font-weight: normal;
}
	ul.parrent>li.cat-item {
    list-style-type: none;
    line-height: 1.7;
	cursor: pointer;
}
.alink {
    cursor: pointer;
    font-size: 14pt;
}
details>summary::after {
content: "+";
margin-left: 10px;
color: #be2e21;
}
details[open]>summary::after {
content: "-";
}
details summary::-webkit-details-marker {
display: none;
}
details[open] li {
animation: spoiler 1s;
}
@keyframes spoiler {
0%   {opacity: 0;}
100% {opacity: 1;}
}
</style>