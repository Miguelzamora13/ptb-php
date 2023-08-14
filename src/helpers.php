<?php

namespace DevDasher\PTB_PHP\Helpers;

use function DevDasher\PTB_PHP\Config\sendRequestUsingCURL;

function downloadURL(string $url, string $save_path, array $curl_options = []): bool {
    $fp = fopen($save_path, 'w+');
    $result = sendRequestUsingCURL(url: $url, options: [
        CURLOPT_FILE => $fp,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_BUFFERSIZE => 1024 * 1024,
        CURLOPT_WRITEFUNCTION => function ($ch, $data) use ($fp) {
            return fwrite($fp, $data);
        }
    ] + $curl_options);
    fclose($fp);
    return $result;
}
