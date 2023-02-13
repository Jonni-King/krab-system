<?
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $terms = $_POST['terms'];
    
    $productName = $_POST['productName'];
    $productAmount = $_POST['productAmount'];
    $productPrice = $_POST['productPrice'];


    $to = "jeka.anarx@yandex.ru";
    $headers = "From: webmaster@example.com";


    $hasNameAndPhone = isset($name) && isset($phone);
    $hasPhoneAndEmailAndTerms = isset($phone) && isset($email) && isset($terms);
    $hasNameAndPhoneAndEmail = isset($name) && isset($phone) && isset($email);
    $hasNameAndPhoneAndEmailAndproductNameAndproductAmountAndproductPrice = isset($name) && isset($phone) && isset($email)&& isset($productName)&& isset($productAmount)&& isset($productPrice);


    function sendMail($to, $subject, $message, $headers) {
        if (mail($to, $subject, $message, $headers)) {
            echo "Ваши данные отправлены!";
        } else {
            echo "Ошибка отправки данных!";
        }

        header("Location: /");
    }


    if ($hasNameAndPhone) {
        $message = "Имя клиента: ".$name."\n"."Телефон клиента: ".$phone;
        $subject = "Заявка на звонок";


        sendMail($to, $subject, $message, $headers);
    }

    if ($hasPhoneAndEmailAndTerms) {
        $message = "Телефон клиента: ".$phone."\n"."Email клиента: ".$email;
        $subject = "Заявка от пользователя";


        sendMail($to, $subject, $message, $headers);
    }

    if ($hasNameAndPhoneAndEmail) {
        $message = "Имя клиента: ".$name."\n"."Телефон клиента: ".$phone."Email Клиента: ".$email;
        $subject = "Заявка от пользователя";


        sendMail($to, $subject, $message, $headers);
    }

    if ($hasNameAndPhoneAndEmailAndproductNameAndproductAmountAndproductPrice) {
        $message = "Имя клиента: ".$name."\n"."Телефон клиента: ".$phone."Email Клиента: ".$email."Продукт: ".$productName."Количество шт: ".$productAmount."Цена: ".$productPrice;
        $subject = "Заявка от пользователя";


        sendMail($to, $subject, $message, $headers);
    }

?>



