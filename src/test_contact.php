<?php

function http_get($url, &$headers_out = null) {
    $opts = [
        'http' => ['method' => 'GET', 'header' => "Accept: text/html\r\n", 'ignore_errors' => true],
        'ssl' => ['verify_peer' => false, 'verify_peer_name' => false],
    ];
    $ctx = stream_context_create($opts);
    $html = @file_get_contents($url, false, $ctx);
    $headers_out = $http_response_header ?? [];
    return $html;
}

function http_post_json($url, $data, $token = '', $cookie = '') {
    $payload = json_encode($data);
    $headers = "Accept: application/json\r\nContent-Type: application/json\r\n";
    if ($token) $headers .= "X-CSRF-TOKEN: $token\r\n";
    if ($cookie) $headers .= "Cookie: $cookie\r\n";
    $opts = [
        'http' => ['method' => 'POST', 'header' => $headers, 'content' => $payload, 'ignore_errors' => true],
        'ssl' => ['verify_peer' => false, 'verify_peer_name' => false],
    ];
    $ctx = stream_context_create($opts);
    $res = @file_get_contents($url, false, $ctx);
    return [$res, $http_response_header ?? []];
}

// 1) GET homepage to extract CSRF token and session cookie
$base = 'http://nginx/';
$html = http_get($base, $headers);
$cookie = '';
foreach ($headers as $h) {
    if (preg_match('/^Set-Cookie:\s*([^;]+)/i', $h, $m)) {
        $cookieParts[] = $m[1];
    }
}
$location = null;
if (!empty($cookieParts)) $cookie = implode('; ', $cookieParts);
// follow redirect if present
foreach ($headers as $h) {
    if (preg_match('/^Location:\s*(\S+)/i', $h, $m)) { $location = $m[1]; break; }
}
if ($location) {
    // try follow redirect
    if (stripos($location, 'http') !== 0) {
        // relative -> make absolute
        $location = rtrim($base, '/') . '/' . ltrim($location, '/');
    }
    $html = http_get($location, $headers);
    // collect any additional cookies
    foreach ($headers as $h) {
        if (preg_match('/^Set-Cookie:\s*([^;]+)/i', $h, $m)) {
            $cookieParts2[] = $m[1];
        }
    }
    if (!empty($cookieParts2)) {
        $cookie = trim($cookie . '; ' . implode('; ', $cookieParts2), " ;");
    }
}
$token = '';
if (preg_match('/<meta name="csrf-token" content="([^"]+)"/i', $html, $m)) {
    $token = $m[1];
}

// 2) POST to /contact
$data = ['name' => 'Script Tester', 'email' => 'script@test.local', 'message' => 'Mengirim pesan melalui skrip otomatis.'];
$postUrl = isset($location) && $location ? $location : rtrim($base, '/') . '/contact';
list($resp, $respHeaders) = http_post_json($postUrl, $data, $token, $cookie);

echo "CSRF_TOKEN: " . $token . "\n";
echo "COOKIE: " . $cookie . "\n\n";
echo "RESPONSE:\n" . $resp . "\n\n";
echo "RESPONSE HEADERS:\n";
foreach ($respHeaders as $h) echo $h . "\n";

?>
