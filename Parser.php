<?php
/*загрузка с интернета
$url='https://fishki.ua/bitrix/catalog_export/AMIBOX.xml';
$xml=file_get_contents($url);
//$xml=simplexml_load_file($url);
$doc = new DOMDocument();
//$doc->loadXML($xml);
$doc->save($xml);
*/

/*Проверка подключения файла*/
//$filename = 'AMIBOX.xml'
//if (file_exists($filename)) {
//    $xml = simplexml_load_file($filename);
//    //print_r($xml);
//	echo "File $filename exist <br/>";
//	//check_category($xml);
//	//check_offers($xml);
//} else {
//    exit("Failed to open $filename");
//}

/*Проверка наличия категории*/
function check_category($xml){
	$search_category = "Моноподы"; //Моноподы
	$result = 2;
	
	foreach ($xml->shop->categories->category as $category_param){
//		echo '<pre/>';
//		var_dump($category_param);
//		echo '<pre/>';
//		echo $category_param.'<br/>';
		If ($category_param == $search_category){
			$result = 0;
			//echo $result;
			//echo "МЫ НАШЛИ $search_category <br/>";
			break;
		} else {
			$result = 1;
			//echo $result;
			//echo "Добавим в базу <br/>";
		}
	}
	
	if ($result == 1){
		echo "Добавим в базу $search_category<br/>";
		sql_query_insert_category($search_category);
	} else {
		echo "Категория $search_category существует в базе";
	}
}

/*Проверка наличия товара*/
function check_offers($xml){
	//echo "Check offers OK";
	//$search_offer = 11111; //нет
	$search_offer = 43818; //есть
	
	/* -art -price -stock_quantity*/
	
	foreach ($xml->shop->offers->offer as $offer_article){
	$array_atributes = $offer_article->attributes();
	//echo $array_atributes['id'];
	$res = 3;	
		
		if ($search_offer == $array_atributes['id']){
		$res = 0;
			echo $res.'<br/>';
			/*Товар есть, обновить стоимость и количество на складе*/
		break;
		} else {
			$res = 1;
			echo $res.'<br/>';
			/*Товара нет, добавить его в базу установить стоимость и количество на складе*/
		}
	}
//	echo '<pre/>';
//	print_r($offer_article);
//		foreach($offer_article->price as $value)
//		{
//			echo $value;
//		}
//	echo '<pre/>';
//	break;
		
}

/*Добавление категории в базу данных*/
function sql_query_insert_category($param){
	$query = "INSERT INTO table_name (category) VALUES ('".$param."')";
}

/*Добавление товара в базу*/
function sql_query_insert_offer($art, $price, $s_q){
	
}

/*Обновление стоимости и количества товара*/
function sql_query_update_offer($art, $price, $s_q){
	
}
