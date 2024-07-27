<?

/*получаем значения полей из формы*/
$name = $_POST['name'];
$phone = $_POST['phone'];
$sname = $_POST['sname'];
$age = $_POST['age'];

/*функция для создания запроса на сервер Telegram */
function parser($url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    if($result == false){     
      echo "Ошибка отправки запроса: " . curl_error($curl);
      return false;
    }
    else{
      return true;
    }
}

function orderSendTelegram($message) {

    /*токен который выдаётся при регистрации бота */
    $token = "7285555170:AAFYqt-unYvsnnGTNLRCnvSJP7OwZPhxDzU";
    /*идентификатор группы*/
    $chat_id = "-4268516201";

    /*делаем запрос*/
    parser("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$message}");

}

/*собираем сообщение*/
$textmessage .= "Новое сообщение из формы\n";
$textmessage .= "Имя: ".$name."\n";
$textmessage .= "Фамилия:".$sname."\n";
$textmessage .= "Возраст:".$age."\n";
$textmessage .= "Телефон:".$phone;
$textmessage = urlencode($textmessage);

orderSendTelegram($textmessage);

?>