<?php
// ============================================
// 🚗 BRONX 91WHEELS PROXY V4 - LIMIT BYPASS
// Rate Limit Bypass + Smart Proxy Rotation
// ============================================

set_time_limit(15);
ini_set('max_execution_time', 15);

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: *");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$rc = trim($_GET['rc'] ?? $_GET['term'] ?? '');

// Home page (same as before, just updated version number)
if ($rc === '') {
    header("Content-Type: text/html");
    ?>
<!DOCTYPE html>
<html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>🚗 BRONX RC PROXY V4 - LIMIT BYPASS</title>
<style>
*{margin:0;padding:0;box-sizing:border-box}
body{background:#000a14;color:#d0d8f0;font-family:'Segoe UI',Arial,sans-serif;min-height:100vh;display:flex;justify-content:center;align-items:center;padding:20px}
.card{background:rgba(5,15,35,.95);border:1px solid rgba(0,255,136,.2);border-radius:24px;padding:35px;max-width:700px;width:100%;text-align:center}
h1{font-size:24px;background:linear-gradient(90deg,#ff6b6b,#ffd93d,#6bff6b);-webkit-background-clip:text;-webkit-text-fill-color:transparent;animation:pulse 2s infinite}
@keyframes pulse{0%,100%{opacity:1}50%{opacity:0.7}}
.subtitle{color:#ffd93d;font-size:11px;letter-spacing:2px;margin:5px 0 12px}
.badges{display:flex;justify-content:center;flex-wrap:wrap;gap:8px;margin:15px 0}
.badge{display:inline-block;padding:5px 12px;border-radius:20px;font-size:9px;font-weight:700;background:rgba(255,107,107,.1);color:#ff6b6b;border:1px solid rgba(255,107,107,.2)}
.badge.green{background:rgba(107,255,107,.1);color:#6bff6b;border:1px solid rgba(107,255,107,.2)}
.stats{display:grid;grid-template-columns:repeat(4,1fr);gap:8px;margin:15px 0}
.stat{background:rgba(0,0,0,.5);border:1px solid rgba(255,255,255,.08);border-radius:12px;padding:14px 6px}
.stat .num{font-size:22px;font-weight:900;color:#ffd93d}
.stat .lbl{font-size:8px;color:#888;text-transform:uppercase;margin-top:4px}
.api-box{background:rgba(0,0,0,.4);border:1px solid rgba(255,107,107,.2);border-radius:12px;padding:16px;margin:12px 0;text-align:left}
.api-box code{color:#ffd93d;font-family:'Courier New',monospace;font-size:12px;display:block;margin:6px 0;background:rgba(0,0,0,.3);padding:10px;border-radius:8px;word-break:break-all}
input{width:100%;padding:15px;background:rgba(0,0,0,.6);border:2px solid rgba(255,107,107,.3);border-radius:12px;color:#fff;font-size:16px;outline:none;margin:8px 0;transition:all 0.3s}
input:focus{border-color:#ff6b6b;box-shadow:0 0 20px rgba(255,107,107,.1)}
button{width:100%;padding:16px;background:linear-gradient(135deg,#ff6b6b,#ffd93d,#6bff6b);color:#000;border:none;border-radius:12px;font-weight:800;cursor:pointer;font-size:15px;margin:8px 0;transition:all 0.3s;text-transform:uppercase;letter-spacing:1px}
button:hover{transform:scale(1.02);box-shadow:0 10px 30px rgba(255,107,107,.2)}
.result{background:rgba(0,0,0,.6);border:1px solid rgba(255,107,107,.15);border-radius:12px;padding:16px;margin-top:12px;text-align:left;display:none;max-height:500px;overflow:auto}
.result.show{display:block}
.info{color:#ffd93d;font-size:11px;margin-bottom:8px}
pre{color:#6bff6b;font-family:'Courier New',monospace;font-size:11px;white-space:pre-wrap;line-height:1.4}
footer{color:#444;font-size:9px;margin-top:15px}
</style></head>
<body>
<div class="card">
<h1>🛡️ BRONX RC PROXY V4</h1>
<p class="subtitle">LIMIT BYPASS • MULTI-TRY • AUTO RETRY</p>
<div class="badges">
<span class="badge">🛡️ Rate Limit Bypass</span><span class="badge green">🌐 Multi-Proxy</span>
<span class="badge">🔄 Auto Retry 3x</span><span class="badge green">∞ No Limit</span>
</div>
<div class="stats">
<div class="stat"><div class="num" id="reqs">0</div><div class="lbl">Requests</div></div>
<div class="stat"><div class="num" id="oks">0</div><div class="lbl">Success</div></div>
<div class="stat"><div class="num" id="retries">0</div><div class="lbl">Retries</div></div>
<div class="stat"><div class="num" id="speed">0s</div><div class="lbl">Speed</div></div>
</div>
<div class="api-box"><code>GET /?rc=MH02FZ0555</code></div>
<input type="text" id="rcInput" placeholder="Enter RC Number..." autocomplete="off">
<button onclick="fetchRC()">🛡️ FETCH WITH LIMIT BYPASS</button>
<div class="result" id="result"><div class="info" id="info"></div><pre id="data"></pre></div>
<footer>@BRONX_ULTRA • V4 LIMIT BYPASS</footer>
</div>
<script>
var req=0,ok=0,retries=0;
async function fetchRC(){
var n=document.getElementById('rcInput').value.trim();
if(!n){alert('Enter RC Number!');return}
var r=document.getElementById('result'),d=document.getElementById('data'),i=document.getElementById('info');
r.classList.add('show');d.style.color='#ffd93d';d.textContent='🛡️ Bypassing rate limits & fetching...';
var start=Date.now();
try{
var resp=await fetch('?rc='+encodeURIComponent(n));
var json=await resp.json();
var elapsed=((Date.now()-start)/1000).toFixed(1);
d.style.color='#6bff6b';d.textContent=JSON.stringify(json,null,2);
req++;
if(json._proxy && json._proxy.attempts) retries+=json._proxy.attempts-1;
if(json.status==='success' || (json.data && !json.message))ok++;
document.getElementById('reqs').textContent=req;
document.getElementById('oks').textContent=ok;
document.getElementById('retries').textContent=retries;
document.getElementById('speed').textContent=elapsed+'s';
if(json._proxy){
i.innerHTML='🛡️ Attempts: '+json._proxy.attempts+' | 🌐 '+json._proxy.proxy_used+' | ⚡ '+elapsed+'s';
}
}catch(e){
d.style.color='#ff6b6b';d.textContent='Error: '+e.message;
req++;document.getElementById('reqs').textContent=req;
}
}
</script>
</body></html>
    <?php
    exit;
}

// ============================================
// 🛡️ RATE LIMIT BYPASS CONFIGURATION
// ============================================
$MAX_RETRIES = 3; // Try up to 3 times with different proxies/IPs
$PROXY_TIMEOUT = 4; // Quick proxy timeout

// ============================================
// 🌐 ADVANCED PROXY SOURCES
// ============================================
function fetchProxiesAggressive() {
    $sources = [
        'https://api.proxyscrape.com/v2/?request=displayproxies&protocol=http&timeout=20000&country=all&ssl=all&anonymity=elite',
        'https://api.proxyscrape.com/v2/?request=displayproxies&protocol=http&timeout=20000&country=all&ssl=all&anonymity=anonymous',
        'https://www.proxy-list.download/api/v1/get?type=http&anon=elite',
        'https://www.proxy-list.download/api/v1/get?type=http&anon=anonymous',
        'https://raw.githubusercontent.com/TheSpeedX/PROXY-List/master/http.txt',
        'https://raw.githubusercontent.com/ShiftyTR/Proxy-List/master/http.txt',
        'https://raw.githubusercontent.com/monosans/proxy-list/main/proxies/http.txt',
        'https://raw.githubusercontent.com/clarketm/proxy-list/master/proxy-list-raw.txt',
        'https://raw.githubusercontent.com/sunny9577/proxy-scraper/master/proxies.txt',
    ];
    
    $allProxies = [];
    
    // Parallel fetch
    $mh = curl_multi_init();
    $handles = [];
    
    foreach ($sources as $url) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 3,
            CURLOPT_CONNECTTIMEOUT => 2,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_USERAGENT => 'Mozilla/5.0',
        ]);
        curl_multi_add_handle($mh, $ch);
        $handles[] = $ch;
    }
    
    do { curl_multi_exec($mh, $running); curl_multi_select($mh, 0.1); } while ($running > 0);
    
    foreach ($handles as $ch) {
        $result = curl_multi_getcontent($ch);
        if ($result) {
            preg_match_all('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}:\d{2,5}/', $result, $matches);
            if (!empty($matches[0])) {
                $allProxies = array_merge($allProxies, $matches[0]);
            }
        }
        curl_multi_remove_handle($mh, $ch);
        curl_close($ch);
    }
    curl_multi_close($mh);
    
    return array_values(array_unique($allProxies));
}

// ============================================
// 🛡️ RATE LIMIT DETECTOR
// ============================================
function isRateLimited($response, $httpCode) {
    if ($httpCode === 429) return true;
    if ($httpCode === 403) return true;
    
    $limitPhrases = [
        'daily limit',
        'rate limit',
        'too many requests',
        'try again later',
        'limit reached',
        'quota exceeded',
        'maximum limit',
        'request limit',
        'verification limit',
        'reached the daily',
        'limit for RC',
    ];
    
    $responseLower = strtolower($response);
    foreach ($limitPhrases as $phrase) {
        if (strpos($responseLower, $phrase) !== false) {
            return true;
        }
    }
    
    return false;
}

// ============================================
// 🛡️ SMART PROXY TEST (Light test to save time)
// ============================================
function quickProxyTest($proxy) {
    $ch = curl_init("https://api1.91wheels.com/api/v1/third/rc-detail");
    
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode(["regNo" => "DL01AB1234", "sessionid" => "test"]),
        CURLOPT_TIMEOUT => 3,
        CURLOPT_CONNECTTIMEOUT => 2,
        CURLOPT_PROXY => $proxy,
        CURLOPT_PROXYTYPE => CURLPROXY_HTTP,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "User-Agent: Mozilla/5.0",
        ],
        CURLOPT_SSL_VERIFYPEER => false,
    ]);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    // Accept 200 or 429 (rate limited but proxy works)
    if (($httpCode === 200 || $httpCode === 429 || $httpCode === 403) && $response) {
        return true;
    }
    
    return false;
}

// ============================================
// 🛡️ MAIN REQUEST WITH RETRY LOGIC
// ============================================
function makeRequest($rc, $proxy = null, $deviceName = "Default") {
    $sessionId = bin2hex(random_bytes(4)) . '-' . dechex(time());
    
    $payload = json_encode([
        "regNo" => $rc,
        "sessionid" => $sessionId
    ]);
    
    $userAgents = [
        "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36",
        "Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1",
        "Mozilla/5.0 (Linux; Android 14; Pixel 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36",
        "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36",
        "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0",
    ];
    
    $ua = $userAgents[array_rand($userAgents)];
    
    $ch = curl_init("https://api1.91wheels.com/api/v1/third/rc-detail");
    
    $options = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "Accept: application/json, text/plain, */*",
            "Accept-Language: en-US,en;q=0.9",
            "Origin: https://www.91wheels.com",
            "Referer: https://www.91wheels.com/rc-status",
            "User-Agent: $ua",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
        ],
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_FRESH_CONNECT => true,
        CURLOPT_FORBID_REUSE => true,
    ];
    
    if ($proxy) {
        $options[CURLOPT_PROXY] = $proxy;
        $options[CURLOPT_PROXYTYPE] = CURLPROXY_HTTP;
        $options[CURLOPT_TIMEOUT] = 8;
        $options[CURLOPT_CONNECTTIMEOUT] = 4;
    }
    
    curl_setopt_array($ch, $options);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    $totalTime = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
    curl_close($ch);
    
    return [
        'response' => $response,
        'httpCode' => $httpCode,
        'error' => $error,
        'time' => $totalTime,
        'proxy' => $proxy ?: 'direct',
        'ua' => $ua,
    ];
}

// ============================================
// 🛡️ MAIN EXECUTION WITH SMART RETRY
// ============================================

// Get proxy cache
$cacheFile = sys_get_temp_dir() . '/bronx_proxies_v4.json';
$cacheTTL = 120; // 2 minute cache

$allProxies = [];
$workingProxies = [];

if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTTL) {
    $cached = json_decode(file_get_contents($cacheFile), true);
    $workingProxies = $cached['working'] ?? [];
    $allProxies = $cached['all'] ?? [];
}

// Fetch fresh proxies if cache empty
if (count($workingProxies) < 3) {
    $allProxies = fetchProxiesAggressive();
    $workingProxies = [];
    
    // Quick test a few proxies (test 10 max, get 3 working)
    $testBatch = array_slice($allProxies, 0, min(10, count($allProxies)));
    foreach ($testBatch as $proxy) {
        if (quickProxyTest($proxy)) {
            $workingProxies[] = $proxy;
            if (count($workingProxies) >= 3) break;
        }
    }
    
    // Cache if we found working proxies
    if (count($workingProxies) > 0) {
        file_put_contents($cacheFile, json_encode([
            'working' => $workingProxies,
            'all' => $allProxies,
            'time' => time()
        ]));
    }
}

// Prepare proxy rotation list
$proxyRotation = array_merge(
    $workingProxies,
    array_slice($allProxies, 0, 5) // Add some untested proxies as fallback
);
$proxyRotation = array_unique($proxyRotation);
$proxyRotation = array_values($proxyRotation);

// Add direct connection as last resort
$proxyRotation[] = null;

// Try requests with retry logic
$attempt = 0;
$finalResponse = null;
$usedProxies = [];
$allAttempts = [];

foreach ($proxyRotation as $proxy) {
    if ($attempt >= $MAX_RETRIES + 1) break; // +1 for direct try
    
    $attempt++;
    $proxyLabel = $proxy ?: 'direct';
    
    // Skip if already tried this proxy
    if (in_array($proxyLabel, $usedProxies)) continue;
    $usedProxies[] = $proxyLabel;
    
    $result = makeRequest($rc, $proxy, "Device-$attempt");
    $allAttempts[] = [
        'attempt' => $attempt,
        'proxy' => $proxyLabel,
        'httpCode' => $result['httpCode'],
        'time' => round($result['time'], 2),
    ];
    
    // Check if successful (not rate limited)
    if (!$result['error'] && $result['response']) {
        if (!isRateLimited($result['response'], $result['httpCode'])) {
            $finalResponse = $result;
            break;
        }
    }
    
    // Small delay between retries (but not for last attempt)
    if ($attempt < $MAX_RETRIES) {
        usleep(200000); // 0.2 seconds
    }
}

// If all proxies rate limited, use last response
if (!$finalResponse && !empty($allAttempts)) {
    // Try once more with direct connection and fresh session
    $finalResponse = makeRequest($rc, null, "Final");
    $allAttempts[] = [
        'attempt' => count($allAttempts) + 1,
        'proxy' => 'direct-final',
        'httpCode' => $finalResponse['httpCode'],
        'time' => round($finalResponse['time'], 2),
    ];
}

// ============================================
// 📊 BUILD RESPONSE
// ============================================
if (!$finalResponse || $finalResponse['error']) {
    echo json_encode([
        "status" => "error",
        "message" => $finalResponse['error'] ?? "All attempts failed",
        "_proxy" => [
            "attempts" => count($allAttempts),
            "tried" => $allAttempts,
            "pool_size" => count($workingProxies),
            "total_fetched" => count($allProxies),
            "proxy_used" => $finalResponse['proxy'] ?? 'none',
            "success" => false,
            "credit" => "@BRONX_ULTRA • V4"
        ]
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

$data = json_decode($finalResponse['response'], true);

// If response is rate limited but has data structure
if (!$data) {
    $data = [
        "status" => "error",
        "message" => "Invalid response",
        "raw_response" => substr($finalResponse['response'], 0, 200),
    ];
}

// Check if still rate limited
$isLimited = isRateLimited($finalResponse['response'], $finalResponse['httpCode']);

if ($isLimited && isset($data['message'])) {
    $data['status'] = 'rate_limited';
    $data['_note'] = 'All proxies/IPs are rate limited. Try again later.';
}

// Add proxy metadata
$data["_proxy"] = [
    "attempts" => count($allAttempts),
    "tried" => $allAttempts,
    "proxy_used" => $finalResponse['proxy'],
    "pool_size" => count($workingProxies),
    "total_fetched" => count($allProxies),
    "response_time" => round($finalResponse['time'], 2) . "s",
    "rate_limited" => $isLimited,
    "success" => !$isLimited,
    "credit" => "@BRONX_ULTRA • V4 LIMIT BYPASS"
];

echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
