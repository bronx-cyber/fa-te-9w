<?php
// ============================================
// 🚗 BRONX 91WHEELS PROXY V5 - ULTIMATE BYPASS
// Multi-Endpoint + Session Spoofing + IP Rotation
// ============================================

set_time_limit(20);
ini_set('max_execution_time', 20);

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: *");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$rc = trim($_GET['rc'] ?? $_GET['term'] ?? '');

// ============================================
// 🏠 HOME PAGE
// ============================================
if ($rc === '') {
    header("Content-Type: text/html");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🚗 BRONX RC PROXY V5 - ULTIMATE</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{background:linear-gradient(135deg,#0a0a0a,#1a0a2e);color:#e0e0e0;font-family:'Segoe UI',Arial,sans-serif;min-height:100vh;display:flex;justify-content:center;align-items:center;padding:20px}
        .card{background:rgba(10,10,30,.95);border:1px solid rgba(138,43,226,.3);border-radius:24px;padding:35px;max-width:750px;width:100%;text-align:center;backdrop-filter:blur(10px)}
        h1{font-size:28px;background:linear-gradient(90deg,#ff0080,#8b00ff,#00bfff);-webkit-background-clip:text;-webkit-text-fill-color:transparent;animation:glow 2s infinite}
        @keyframes glow{0%,100%{filter:brightness(1)}50%{filter:brightness(1.5)}}
        .subtitle{color:#8b00ff;font-size:12px;letter-spacing:3px;margin:8px 0 15px;text-transform:uppercase}
        .features{display:flex;justify-content:center;flex-wrap:wrap;gap:8px;margin:20px 0}
        .feat{display:inline-flex;align-items:center;gap:6px;padding:6px 14px;border-radius:20px;font-size:10px;font-weight:700;background:rgba(138,43,226,.1);color:#ba68c8;border:1px solid rgba(138,43,226,.2)}
        .feat.gold{background:rgba(255,215,0,.1);color:#ffd700;border:1px solid rgba(255,215,0,.2)}
        .stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:10px;margin:20px 0}
        .stat-box{background:rgba(0,0,0,.4);border:1px solid rgba(255,255,255,.05);border-radius:14px;padding:16px 8px;position:relative;overflow:hidden}
        .stat-box::before{content:'';position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,#ff0080,#8b00ff,#00bfff)}
        .stat-value{font-size:24px;font-weight:900;color:#fff;display:block}
        .stat-label{font-size:8px;color:#777;text-transform:uppercase;margin-top:6px;letter-spacing:1px}
        .api-section{background:rgba(0,0,0,.3);border:1px solid rgba(0,191,255,.2);border-radius:14px;padding:18px;margin:15px 0;text-align:left}
        .api-section code{color:#ffd700;font-family:'Courier New',monospace;font-size:12px;display:block;margin:8px 0;background:rgba(0,0,0,.5);padding:12px;border-radius:8px;word-break:break-all;border-left:3px solid #8b00ff}
        .endpoint-info{color:#00bfff;font-size:10px;margin-top:8px}
        input{width:100%;padding:16px;background:rgba(0,0,0,.5);border:2px solid rgba(138,43,226,.3);border-radius:14px;color:#fff;font-size:16px;outline:none;margin:10px 0;transition:all 0.3s;letter-spacing:1px}
        input:focus{border-color:#8b00ff;box-shadow:0 0 25px rgba(138,43,226,.2)}
        button{width:100%;padding:18px;background:linear-gradient(135deg,#8b00ff,#ff0080);color:#fff;border:none;border-radius:14px;font-weight:800;cursor:pointer;font-size:16px;margin:10px 0;transition:all 0.3s;text-transform:uppercase;letter-spacing:2px;position:relative;overflow:hidden}
        button:hover{transform:translateY(-2px);box-shadow:0 15px 35px rgba(138,43,226,.3)}
        button:active{transform:scale(0.98)}
        .response-area{background:rgba(0,0,0,.5);border:1px solid rgba(138,43,226,.2);border-radius:14px;padding:18px;margin-top:15px;text-align:left;display:none;max-height:500px;overflow:auto;font-family:'Courier New',monospace}
        .response-area.show{display:block}
        .info-bar{color:#ffd700;font-size:11px;margin-bottom:10px;padding:8px;background:rgba(255,215,0,.05);border-radius:8px}
        pre{color:#00ff88;font-size:12px;white-space:pre-wrap;line-height:1.5}
        .badge{display:inline-block;padding:3px 8px;border-radius:10px;font-size:9px;font-weight:700;margin:2px}
        .badge-success{background:rgba(0,255,136,.1);color:#00ff88}
        .badge-warning{background:rgba(255,215,0,.1);color:#ffd700}
        .badge-error{background:rgba(255,0,128,.1);color:#ff0080}
        footer{color:#555;font-size:9px;margin-top:20px;letter-spacing:1px}
        .loading{animation:pulse 1.5s infinite}
        @keyframes pulse{0%,100%{opacity:1}50%{opacity:0.5}}
    </style>
</head>
<body>
    <div class="card">
        <h1>⚡ BRONX RC PROXY V5</h1>
        <p class="subtitle">ULTIMATE RATE LIMIT BYPASS</p>
        
        <div class="features">
            <span class="feat gold">🎯 Multi-Endpoint</span>
            <span class="feat">🔄 Auto Retry 5x</span>
            <span class="feat gold">🌐 IP Rotation</span>
            <span class="feat">🎭 Session Spoof</span>
            <span class="feat gold">⚡ 2-5s Response</span>
        </div>
        
        <div class="stats-grid">
            <div class="stat-box">
                <span class="stat-value" id="total">0</span>
                <span class="stat-label">Total Requests</span>
            </div>
            <div class="stat-box">
                <span class="stat-value" id="success">0</span>
                <span class="stat-label">Success</span>
            </div>
            <div class="stat-box">
                <span class="stat-value" id="retries">0</span>
                <span class="stat-label">Avg Retries</span>
            </div>
            <div class="stat-box">
                <span class="stat-value" id="speed">0s</span>
                <span class="stat-label">Last Speed</span>
            </div>
        </div>
        
        <div class="api-section">
            <div style="color:#ba68c8;font-weight:700;margin-bottom:8px">🔌 API Endpoints:</div>
            <code>GET /?rc=MH02FZ0555</code>
            <div class="endpoint-info">✅ Multiple fallback endpoints • Auto proxy rotation</div>
        </div>
        
        <input type="text" id="rcInput" placeholder="Enter RC Number (e.g., MH02FZ0555)..." autocomplete="off" maxlength="20">
        <button onclick="fetchRC()">⚡ ULTIMATE FETCH</button>
        
        <div class="response-area" id="result">
            <div class="info-bar" id="info"></div>
            <pre id="data"></pre>
        </div>
        
        <footer>@BRONX_ULTRA • V5 ULTIMATE • NO RATE LIMITS</footer>
    </div>
    
    <script>
        let totalReqs = 0, successReqs = 0, totalRetries = 0, totalSpeed = 0;
        
        async function fetchRC() {
            const rc = document.getElementById('rcInput').value.trim();
            if (!rc) { alert('Please enter RC number!'); return; }
            
            const resultDiv = document.getElementById('result');
            const dataPre = document.getElementById('data');
            const infoDiv = document.getElementById('info');
            
            resultDiv.classList.add('show');
            dataPre.style.color = '#ffd700';
            dataPre.textContent = '⚡ Initializing ultimate bypass...';
            dataPre.classList.add('loading');
            infoDiv.innerHTML = '<span class="badge badge-warning">PROCESSING</span> Trying multiple endpoints...';
            
            const startTime = Date.now();
            
            try {
                const response = await fetch(`?rc=${encodeURIComponent(rc)}&_=${Date.now()}`);
                const json = await response.json();
                const elapsed = ((Date.now() - startTime) / 1000).toFixed(2);
                
                dataPre.classList.remove('loading');
                
                // Update stats
                totalReqs++;
                if (json.status === 'success' || (json.data && !json.message)) {
                    successReqs++;
                    dataPre.style.color = '#00ff88';
                } else {
                    dataPre.style.color = '#ff0080';
                }
                
                if (json._proxy) {
                    totalRetries += (json._proxy.attempts || 1);
                    totalSpeed += parseFloat(elapsed);
                    
                    const avgRetries = (totalRetries / totalReqs).toFixed(1);
                    const avgSpeed = (totalSpeed / totalReqs).toFixed(1);
                    
                    document.getElementById('total').textContent = totalReqs;
                    document.getElementById('success').textContent = successReqs;
                    document.getElementById('retries').textContent = avgRetries;
                    document.getElementById('speed').textContent = avgSpeed + 's';
                    
                    infoDiv.innerHTML = `
                        <span class="badge badge-success">ATTEMPTS: ${json._proxy.attempts}</span>
                        <span class="badge badge-warning">ENDPOINT: ${json._proxy.endpoint || 'auto'}</span>
                        <span class="badge badge-success">⚡ ${elapsed}s</span>
                        ${json._proxy.rate_limited ? '<span class="badge badge-error">RATE LIMITED</span>' : '<span class="badge badge-success">BYPASSED</span>'}
                    `;
                }
                
                dataPre.textContent = JSON.stringify(json, null, 2);
                
            } catch (error) {
                dataPre.classList.remove('loading');
                dataPre.style.color = '#ff0080';
                dataPre.textContent = 'Connection Error: ' + error.message;
                totalReqs++;
                document.getElementById('total').textContent = totalReqs;
                infoDiv.innerHTML = '<span class="badge badge-error">ERROR</span> Failed to connect';
            }
        }
        
        // Enter key support
        document.getElementById('rcInput').addEventListener('keypress', (e) => {
            if (e.key === 'Enter') fetchRC();
        });
    </script>
</body>
</html>
    <?php
    exit;
}

// ============================================
// 🎯 ULTIMATE RATE LIMIT BYPASS SYSTEM
// ============================================

/**
 * MULTI-ENDPOINT STRATEGY:
 * 91wheels might have different rate limits per endpoint
 * We try multiple endpoints to bypass limits
 */

// Primary API endpoints (try different paths)
$API_ENDPOINTS = [
    'https://api1.91wheels.com/api/v1/third/rc-detail',
    'https://api.91wheels.com/api/v1/third/rc-detail',
    'https://api2.91wheels.com/api/v1/third/rc-detail',
    'https://www.91wheels.com/api/v1/third/rc-detail',
];

// Alternative: Try RC verification through different paths
$ALT_ENDPOINTS = [
    'https://api1.91wheels.com/api/v1/third/rc-detail',
    'https://api1.91wheels.com/api/v2/rc/verify',
    'https://api1.91wheels.com/api/v1/vehicle/rc',
];

// ============================================
// 🌐 AGGRESSIVE PROXY FETCHING
// ============================================
function fetchAllProxies() {
    $sources = [
        'https://api.proxyscrape.com/v2/?request=displayproxies&protocol=http&timeout=2000&country=all&ssl=all&anonymity=elite',
        'https://api.proxyscrape.com/v2/?request=displayproxies&protocol=http&timeout=2000&country=all&ssl=all&anonymity=anonymous',
        'https://www.proxy-list.download/api/v1/get?type=http&anon=elite',
        'https://raw.githubusercontent.com/TheSpeedX/PROXY-List/master/http.txt',
        'https://raw.githubusercontent.com/ShiftyTR/Proxy-List/master/http.txt',
        'https://raw.githubusercontent.com/monosans/proxy-list/main/proxies/http.txt',
        'https://raw.githubusercontent.com/hookzof/socks5_list/master/proxy.txt',
        'https://raw.githubusercontent.com/jetkai/proxy-list/main/online-proxies/txt/proxies-http.txt',
        'https://raw.githubusercontent.com/roosterkid/openproxylist/main/HTTPS_RAW.txt',
        'https://proxylist.geonode.com/api/proxy-list?limit=50&page=1&sort_by=lastChecked&sort_type=desc&protocols=http',
    ];
    
    $allProxies = [];
    
    // Parallel fetch with curl_multi
    $mh = curl_multi_init();
    $handles = [];
    
    foreach ($sources as $index => $url) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 4,
            CURLOPT_CONNECTTIMEOUT => 2,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            CURLOPT_HTTPHEADER => ['Accept: text/plain, application/json'],
        ]);
        curl_multi_add_handle($mh, $ch);
        $handles[$index] = $ch;
    }
    
    // Execute all
    do {
        curl_multi_exec($mh, $running);
        curl_multi_select($mh, 0.1);
    } while ($running > 0);
    
    // Collect results
    foreach ($handles as $ch) {
        $response = curl_multi_getcontent($ch);
        if ($response) {
            // Try JSON first (for geonode)
            $jsonData = json_decode($response, true);
            if ($jsonData && isset($jsonData['data'])) {
                foreach ($jsonData['data'] as $item) {
                    if (isset($item['ip']) && isset($item['port'])) {
                        $allProxies[] = $item['ip'] . ':' . $item['port'];
                    }
                }
            } else {
                // Extract IP:Port patterns
                preg_match_all('/\b\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}:\d{2,5}\b/', $response, $matches);
                if (!empty($matches[0])) {
                    $allProxies = array_merge($allProxies, $matches[0]);
                }
            }
        }
        curl_multi_remove_handle($mh, $ch);
        curl_close($ch);
    }
    curl_multi_close($mh);
    
    // Remove duplicates and invalid
    $allProxies = array_unique($allProxies);
    $allProxies = array_filter($allProxies, function($proxy) {
        // Filter out common bad ports
        $badPorts = [80, 443, 1080, 8080]; // Too common, likely transparent
        $parts = explode(':', $proxy);
        $port = intval($parts[1] ?? 0);
        return $port > 0 && $port < 65536;
    });
    
    return array_values($allProxies);
}

// ============================================
// 🎭 ADVANCED SESSION SPOOFING
// ============================================
function generateSpoofedSession() {
    $templates = [
        // Mobile app session format
        'android_' . bin2hex(random_bytes(8)) . '_' . time(),
        // Web session format
        'web_' . bin2hex(random_bytes(6)) . '_' . dechex(time()),
        // iOS session format
        'ios_' . bin2hex(random_bytes(7)) . '_' . time(),
        // Random UUID format
        sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        ),
    ];
    
    return $templates[array_rand($templates)];
}

// ============================================
// 🎯 REQUEST EXECUTOR WITH RETRY
// ============================================
function executeRequest($url, $rc, $proxy = null, $sessionId = null, $userAgent = null) {
    if (!$sessionId) {
        $sessionId = generateSpoofedSession();
    }
    
    if (!$userAgent) {
        $userAgents = [
            'Mozilla/5.0 (Linux; Android 14; Pixel 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36',
            'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.2 Mobile/15E148 Safari/604.1',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
        ];
        $userAgent = $userAgents[array_rand($userAgents)];
    }
    
    // Generate random origin/referer
    $origins = [
        'https://www.91wheels.com',
        'https://91wheels.com',
        'https://m.91wheels.com',
        'https://app.91wheels.com',
    ];
    $origin = $origins[array_rand($origins)];
    
    $payload = json_encode([
        "regNo" => $rc,
        "sessionid" => $sessionId
    ]);
    
    $ch = curl_init($url);
    
    $options = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_TIMEOUT => 8,
        CURLOPT_CONNECTTIMEOUT => 4,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "Accept: application/json, text/plain, */*",
            "Accept-Language: en-US,en;q=0.9,hi;q=0.8",
            "Accept-Encoding: gzip, deflate, br",
            "Origin: $origin",
            "Referer: $origin/rc-status",
            "User-Agent: $userAgent",
            "Cache-Control: no-cache, no-store, must-revalidate",
            "Pragma: no-cache",
            "X-Requested-With: XMLHttpRequest",
            "Sec-Fetch-Dest: empty",
            "Sec-Fetch-Mode: cors",
            "Sec-Fetch-Site: same-site",
        ],
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_FRESH_CONNECT => true,
        CURLOPT_FORBID_REUSE => true,
        CURLOPT_ENCODING => 'gzip, deflate',
    ];
    
    // Add proxy with authentication
    if ($proxy) {
        $options[CURLOPT_PROXY] = $proxy;
        $options[CURLOPT_PROXYTYPE] = CURLPROXY_HTTP;
        $options[CURLOPT_TIMEOUT] = 6;
        $options[CURLOPT_CONNECTTIMEOUT] = 3;
        $options[CURLOPT_HTTPPROXYTUNNEL] = true;
    }
    
    curl_setopt_array($ch, $options);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    $totalTime = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
    $effectiveUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    curl_close($ch);
    
    return [
        'response' => $response,
        'http_code' => $httpCode,
        'error' => $error,
        'time' => $totalTime,
        'proxy' => $proxy ?: 'direct',
        'endpoint' => $url,
        'session_id' => substr($sessionId, 0, 12) . '...',
        'user_agent' => substr($userAgent, 0, 50) . '...',
        'effective_url' => $effectiveUrl,
    ];
}

// ============================================
// 🎯 RATE LIMIT DETECTOR
// ============================================
function isRateLimited($response, $httpCode) {
    if ($httpCode === 429 || $httpCode === 403) return true;
    
    $limitIndicators = [
        'daily limit', 'rate limit', 'too many', 'try again',
        'quota exceeded', 'maximum', 'reached the', 'limit for',
        'verification limit', 'exceeded', 'throttled', 'blocked',
    ];
    
    $responseLower = strtolower($response ?? '');
    foreach ($limitIndicators as $indicator) {
        if (strpos($responseLower, $indicator) !== false) return true;
    }
    
    return false;
}

// ============================================
// 🎯 MAIN EXECUTION
// ============================================

// Cache handling
$cacheFile = sys_get_temp_dir() . '/bronx_proxies_v5.json';
$cacheTTL = 180; // 3 minutes

$allProxies = [];
$workingProxies = [];

if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTTL) {
    $cached = json_decode(file_get_contents($cacheFile), true);
    if ($cached && isset($cached['proxies'])) {
        $allProxies = $cached['proxies'];
    }
}

// Fetch fresh proxies if needed
if (count($allProxies) < 10) {
    $allProxies = fetchAllProxies();
    if (count($allProxies) > 0) {
        file_put_contents($cacheFile, json_encode([
            'proxies' => array_slice($allProxies, 0, 50),
            'time' => time()
        ]));
    }
}

// Prepare strategy: Mix of endpoints and proxies
$maxAttempts = 8;
$attempts = [];
$successResponse = null;

// Create attempt combinations
$attemptCombinations = [];
$proxyPool = array_slice($allProxies, 0, min(15, count($allProxies)));
$endpointPool = $API_ENDPOINTS;

// Add null proxy for direct connections
$proxyPool[] = null;

foreach ($endpointPool as $endpoint) {
    foreach (array_slice($proxyPool, 0, 4) as $proxy) {
        $attemptCombinations[] = [
            'endpoint' => $endpoint,
            'proxy' => $proxy,
        ];
    }
}

// Shuffle for randomness
shuffle($attemptCombinations);
$attemptCombinations = array_slice($attemptCombinations, 0, $maxAttempts);

// Execute attempts
foreach ($attemptCombinations as $index => $combo) {
    if ($successResponse) break;
    if ($index >= $maxAttempts) break;
    
    $result = executeRequest(
        $combo['endpoint'],
        $rc,
        $combo['proxy'],
        generateSpoofedSession()
    );
    
    $attempts[] = [
        'attempt' => $index + 1,
        'endpoint' => parse_url($combo['endpoint'], PHP_URL_HOST),
        'proxy' => $combo['proxy'] ?: 'direct',
        'http_code' => $result['http_code'],
        'time' => round($result['time'], 2),
    ];
    
    // Check if successful
    if (!$result['error'] && $result['response']) {
        if (!isRateLimited($result['response'], $result['http_code'])) {
            $successResponse = $result;
            break;
        }
    }
    
    // Tiny delay between attempts (50-150ms)
    if ($index < $maxAttempts - 1) {
        usleep(rand(50000, 150000));
    }
}

// ============================================
// 📊 FORMAT RESPONSE
// ============================================

if (!$successResponse) {
    // All attempts failed
    $lastAttempt = end($attempts) ?: ['http_code' => 0, 'time' => 0];
    
    echo json_encode([
        "success" => false,
        "status" => "rate_limited",
        "message" => "All endpoints rate limited. Service may be down or IP blocked.",
        "_proxy" => [
            "attempts" => count($attempts),
            "tried" => $attempts,
            "proxies_available" => count($allProxies),
            "endpoints_tried" => count($API_ENDPOINTS),
            "rate_limited" => true,
            "recommendation" => "Wait 5-10 minutes before retrying",
            "credit" => "@BRONX_ULTRA • V5"
        ]
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

// Parse successful response
$data = json_decode($successResponse['response'], true);

if (!$data) {
    $data = [
        "status" => "success",
        "raw_data" => $successResponse['response'],
    ];
}

// Add proxy metadata
$data["_proxy"] = [
    "attempts" => count($attempts),
    "tried" => $attempts,
    "successful_endpoint" => parse_url($successResponse['endpoint'], PHP_URL_HOST),
    "proxy_used" => $successResponse['proxy'],
    "proxies_available" => count($allProxies),
    "response_time" => round($successResponse['time'], 2) . "s",
    "rate_limited" => false,
    "status" => "bypassed",
    "credit" => "@BRONX_ULTRA • V5 ULTIMATE"
];

echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
