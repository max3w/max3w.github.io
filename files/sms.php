<!-- Смс уведомление -->
<?php
$day_zakaza = $order->get_date_created()->format('H:i'); //Дата заказа
$today = date("H:i"); //Текущая дата
if ($day_zakaza == $today) {
    // Подключаемся к серверу
    $client = new SoapClient('http://turbosms.in.ua/api/wsdl.html');
    // Данные авторизации
    $auth = ['login' => 'xxx', 'password' => 'xxx'];
    // Авторизируемся на сервере
    $result = $client->Auth($auth);
    // Результат авторизации
    //echo $result->AuthResult . PHP_EOL;
    // Get and Loop Over Order Items
    //print_r ($order->get_items());
    /*foreach ( $order->get_items() as $item_id => $item ) {
        $raz = $item->get_meta_data()['0']->value; //Получаем размер
           $model = $item->get_name(); //Получаем имя
        $model = str_ireplace("/", "-", $model);
    }*/
    foreach ($order->get_items() as $item_id => $item) {
        $raz = $item->get_meta_data() ['0']->value; //Получаем размер
        $model = $item->get_name(); //Получаем имя
        $model = str_ireplace("/", "/", $model);
        $ar[] = ($model . "-розм:" . $raz);
    }
    $ar = implode("; ", $ar); //собираем в масив через ;
    // Отправляем сообщение администратору
    $num1 = '+380xxxxxxxxx';
    //$num2 = $order->get_billing_phone();
    //$numall = ("'" . $num1 . "," . $num2 . "'");
    $text = ('№' . $order->get_order_number() . ' ' . $ar . ' ' /*$order->get_payment_method_title() */ . ' ' . $order->get_billing_phone());
    $sms = ['sender' => 'Name', 'destination' => $num1, 'text' => $text];
    $result = $client->SendSMS($sms);
    //Смотрим содержимое сообщения
    //echo ($sms[text]);
    //       print_r ($order);
    //echo ('<pre>');
    //print_r ($order->get_meta('Дата доставки:', true));
    //echo ('</pre>');
    // Отправляем сообщение покупателю
    $num2 = $order->get_billing_phone();
    $text = "Замовлення " . '№' . $order->get_order_number() . ' ' . 'сума:' . $order->get_total() . 'грн.' . ' ' . 'Дякуємо за замовлення! Ми зв\'яжемось з Вами)';
    $sms = ['sender' => 'Name', 'destination' => $num2, 'text' => $text];
    $result = $client->SendSMS($sms);
    //Смотрим содержимое сообщения
    //echo ($sms[text]);
    //echo ($sms[destination]);
    // Выводим результат отправки.
    //echo $result->SendSMSResult->ResultArray[0] . PHP_EOL;
    //echo ($day_zakaza);
    //echo ($today);
    
}
?>
<!-- Смс уведомление енд -->