<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

$chat_id = $update["message"]["chat"]["id"];
$text = $update["message"]["text"];

if ($text == "/start") {
    sendMessage($chat_id, "👋 Hello Bro! Welcome to my PHP bot on Render.");
} else {
    sendMessage($chat_id, "📩 You said: $text");
}

function sendMessage($chat_id, $text) {
    $token = "7634927433:AAFEFLNY9sPxpR3Z40hFOkSM51dbNkHbEUk"; // <-- এখানে তোমার BotFather টোকেন বসাও
    $url = "https://api.telegram.org/bot$token/sendMessage";

    $data = [
        "chat_id" => $chat_id,
        "text" => $text
    ];

    $options = [
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => $data
    ];

    $ch = curl_init();
    curl_setopt_array($ch, $options);
    curl_exec($ch);
    curl_close($ch);
}
?>
