<?php
// ============================================
// 🚀 BRONX 91WHEELS PROXY V5 - FINAL
// Fixed Errors • 5-8 Seconds • Bypass Limit
// ============================================

set_time_limit(25);
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: *");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$rc = trim($_GET['rc'] ?? $_GET['term'] ?? '');

// ============ HOME PAGE ============
if ($rc === '') {
    header("Content-Type: text/html");
    ?>
<!DOCTYPE html>
<html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>🚗 BRONX RC PROXY V5</title>
<style>
*{margin:0;padding:0;box-sizing:border-box}
body{background:#000a14;color:#d0d8f0;font-family:'Segoe UI',Arial,sans-serif;min-height:100vh;display:flex;justify-content:center;align-items:center;padding:20px}
.card{background:rgba(5,15,35,.95);border:1px solid rgba(0,255,136,.2);border-radius:24px;padding:35px;max-width:700px;width:100%;text-align:center}
h1{font-size:24px;background:linear-gradient(90deg,#00ff88,#0096ff,#8b00ff,#ff0080);background-size:300% 100%;-webkit-background-clip:text;-webkit-text-fill-color:transparent;animation:rainbow 3s linear infinite}
@keyframes rainbow{0%{background-position:0% 50%}100%{background-position:300% 50%}}
.subtitle{color:#555;font-size:11px;letter-spacing:2px;margin:5px 0 12px}
.badges{display:flex;justify-content:center;flex-wrap:wrap;gap:6px;margin:10px 0}
.badge{display:inline-block;padding:4px 10px;border-radius:20px;font-size:8px;font-weight:600;background:rgba(0,255,136,.08);color:#00ff88;border:1px solid rgba(0,255,136,.1)}
.stats{display:grid;grid-template-columns:repeat(4,1fr);gap:6px;margin:12px 0}
.stat{background:rgba(0,0,0,.5);border:1px solid rgba(255,255,255,.05);border-radius:10px;padding:12px 6px}
.stat .num{font-size:20px;font-weight:900;color:#00ff88}
.stat .lbl{font-size:7px;color:#666;text-transform:uppercase}
.api-box{background:rgba(0,0,0,.5);border:1px solid rgba(0,150,255,.1);border-radius:10px;padding:14px;margin:10px 0;text-align:left}
.api-box code{color:#ffb400;font-family:'Courier New',monospace;font-size:11px;display:block;margin:6px 0;background:rgba(0,0,0,.3);padding:8px;border-radius:6px;word-break:break-all}
input{width:100%;padding:14px;background:rgba(0,0,0,.6);border:1px solid rgba(0,255,136,.15);border-radius:12px;color:#fff;font-size:15px;outline:none;margin:6px 0}
input:focus{border-color:#00ff88}
button{width:100%;padding:16px;background:linear-gradient(135deg,#00ff88,#0096ff,#8b00ff);background-size:200% 200%;color:#fff;border:none;border-radius:12px;font-weight:700;cursor:pointer;font-size:15px;margin:6px 0}
button:hover{transform:scale(1.02)}
.result{background:rgba(0,0,0,.6);border:1px solid rgba(0,255,136,.1);border-radius:10px;padding:14px;margin-top:10px;text-align:left;display:none;max-height:450px;overflow:auto}
.result.show{display:block}
.info{color:#ffb400;font-size:10px;margin-bottom:6px}
pre{color:#00ff88;font-family:'Courier New',monospace;font-size:10px;white-space:pre-wrap}
footer{color:#333;font-size:9px;margin-top:12px}
</style></head>
<body>
<div class="card">
<h1>🚗 BRONX RC PROXY V5</h1>
<p class="subtitle">⚡ 5-8 SECONDS • AUTO ROTATE • BYPASS LIMIT</p>
<div class="badges">
<span class="badge">🌐 Fresh IP</span><span class="badge">🔄 Auto Rotate</span>
<span class="badge">⚡ 5-8 Sec</span><span class="badge">∞ Unlimited</span>
</div>
<div class="stats">
<div class="stat"><div class="num" id="reqs">0</div><div class="lbl">Requests</div></div>
<div class="stat"><div class="num" id="oks">0</div><div class="lbl">Success</div></div>
<div class="stat"><div class="num" id="prx">0</div><div class="lbl">Proxies</div></div>
<div class="stat"><div class="num">∞</div><div class="lbl">Limit</div></div>
</div>
<div class="api-box"><code>GET /?rc=MH02FZ0555</code></div>
<input type="text" id="rcInput" placeholder="Enter RC Number..." autocomplete="off">
<button onclick="fetchRC()">🔍 FETCH WITH FRESH PROXY</button>
<div class="result" id="result"><div class="info" id="info"></div><pre id="data"></pre></div>
<footer>@BRONX_ULTRA • ✅ Speed Optimized</footer>
</div>
<script>
var req=0,ok=0,startTime;
async function fetchRC(){
var n=document.getElementById('rcInput').value.trim();
if(!n){alert('Enter RC!');return}
var r=document.getElementById('result'),d=document.getElementById('data'),i=document.getElementById('info');
r.classList.add('show');d.style.color='#ffb400';d.textContent='⏳ Finding working proxy...';
startTime=Date.now();
try{
var resp=await fetch('?rc='+encodeURIComponent(n));
var json=await resp.json();
var elapsed=((Date.now()-startTime)/1000).toFixed(1);
d.style.color='#00ff88';d.textContent=JSON.stringify(json,null,2);
req++;if(json.status==='success')ok++;
document.getElementById('reqs').textContent=req;
document.getElementById('oks').textContent=ok;
if(json._proxy){
i.innerHTML='🌐 Proxy: '+json._proxy.proxy_used+' | 📱 '+json._proxy.device+' | ⚡ '+elapsed+'s';
document.getElementById('prx').textContent=json._proxy.pool_size;
}
}catch(e){
d.style.color='#ff0080';d.textContent='Error: '+e.message;
req++;document.getElementById('reqs').textContent=req;
}
}
</script>
</body></html>
    <?php
    exit;
}

// ============================================
// 🔥 GET WORKING PROXIES (Fixed typo)
// ============================================
function getWorkingProxies() {
    $proxies = [];
    
    // Multiple sources for reliability
    $urls = [
        "https://api.proxyscrape.com/v2/?request=displayproxies&protocol=http&timeout=2000&country=all&ssl=all&anonymity=all",
        "https://api.proxyscrape.com/v2/?request=displayproxies&protocol=https&timeout=2000&country=all&ssl=all&anonymity=all",
        "https://raw.githubusercontent.com/TheSpeedX/PROXY-List/master/http.txt",
        "https://raw.githubusercontent.com/ShiftyTR/Proxy-List/master/http.txt",
        "https://www.proxy-list.download/api/v1/get?type=http",
    ];
    
    foreach ($urls as $url) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 3,
            CURLOPT_SSL_VERIFYPEER => false, // FIXED TYPO
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36",
        ]);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($result && $httpCode == 200) {
            $lines = explode("\n", trim($result));
            foreach ($lines as $line) {
                $line = trim($line);
                // Match IP:PORT pattern
                if (preg_match('/\b\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}:\d{2,5}\b/', $line, $matches)) {
                    if (isset($matches[0]) && !empty($matches[0])) {
                        $proxies[] = $matches[0];
                    }
                }
            }
        }
    }
    
    // Remove duplicates
    $proxies = array_values(array_unique($proxies));
    return $proxies;
}

// ============================================
// ⚡ TEST PROXY (Fast)
// ============================================
function testProxy($proxy) {
    $payload = json_encode([
        "regNo" => "MH02FZ0555",
        "sessionid" => "test-" . uniqid()
    ]);
    
    $ch = curl_init("https://api1.91wheels.com/api/v1/third/rc-detail");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_TIMEOUT => 2,
        CURLOPT_CONNECTTIMEOUT => 1,
        CURLOPT_PROXY => $proxy,
        CURLOPT_PROXYTYPE => CURLPROXY_HTTP,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "Accept: application/json",
            "Origin: https://www.91wheels.com",
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36",
        ],
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_NOBODY => true,
    ]);
    
    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    return ($httpCode >= 200 && $httpCode < 500);
}

// ============================================
// 🚀 FIND WORKING PROXY (Parallel)
// ============================================
function findWorkingProxy() {
    $allProxies = getWorkingProxies();
    
    if (empty($allProxies)) {
        return null;
    }
    
    // Shuffle for randomness
    shuffle($allProxies);
    
    // Test proxies in parallel
    $testCount = min(15, count($allProxies));
    $testProxies = array_slice($allProxies, 0, $testCount);
    
    $mh = curl_multi_init();
    $handles = [];
    $payload = json_encode(["regNo" => "MH02FZ0555", "sessionid" => "test-" . uniqid()]);
    $url = "https://api1.91wheels.com/api/v1/third/rc-detail";
    
    foreach ($testProxies as $proxy) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_TIMEOUT => 2,
            CURLOPT_CONNECTTIMEOUT => 1,
            CURLOPT_PROXY => $proxy,
            CURLOPT_PROXYTYPE => CURLPROXY_HTTP,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "Accept: application/json",
                "Origin: https://www.91wheels.com",
                "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36",
            ],
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_NOBODY => true,
        ]);
        curl_multi_add_handle($mh, $ch);
        $handles[] = ['ch' => $ch, 'proxy' => $proxy];
    }
    
    $running = null;
    do {
        curl_multi_exec($mh, $running);
        curl_multi_select($mh);
    } while ($running > 0);
    
    $workingProxies = [];
    foreach ($handles as $h) {
        $httpCode = curl_getinfo($h['ch'], CURLINFO_HTTP_CODE);
        if ($httpCode >= 200 && $httpCode < 500) {
            $workingProxies[] = $h['proxy'];
        }
        curl_multi_remove_handle($mh, $h['ch']);
        curl_close($h['ch']);
    }
    curl_multi_close($mh);
    
    if (empty($workingProxies)) {
        return null;
    }
    
    return [
        'proxy' => $workingProxies[array_rand($workingProxies)],
        'pool' => count($workingProxies),
        'total' => count($allProxies)
    ];
}

// ============================================
// 🔥 MAKE REQUEST WITH PROXY
// ============================================
function makeRequest($rc, $proxy, $device, $userAgent) {
    $sessionId = bin2hex(random_bytes(4)) . '-' . dechex(time()) . '-' . rand(100, 999);
    
    $payload = json_encode([
        "regNo" => $rc,
        "sessionid" => $sessionId
    ]);
    
    $ch = curl_init("https://api1.91wheels.com/api/v1/third/rc-detail");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_TIMEOUT => 8,
        CURLOPT_CONNECTTIMEOUT => 4,
        CURLOPT_PROXY => $proxy,
        CURLOPT_PROXYTYPE => CURLPROXY_HTTP,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "Accept: application/json, text/plain, */*",
            "Accept-Language: en-US,en;q=0.9",
            "Origin: https://www.91wheels.com",
            "Referer: https://www.91wheels.com/",
            "User-Agent: $userAgent",
            "Cache-Control: no-cache",
        ],
        CURLOPT_COOKIE => "session_id=$sessionId",
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_ENCODING => '',
    ]);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
    
    return [
        'response' => $response,
        'httpCode' => $httpCode,
        'error' => $error,
        'sessionId' => $sessionId
    ];
}

// ============================================
// 🚀 MAIN EXECUTION
// ============================================

$startTime = microtime(true);
$maxRetries = 3;
$attempt = 0;
$result = null;

// Devices
$devices = [
    ["Chrome 120 / Win10", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36"],
    ["Safari / iPhone", "Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1"],
    ["Chrome / Android", "Mozilla/5.0 (Linux; Android 14; Pixel 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36"],
    ["Firefox / Win", "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0"],
];

while ($attempt < $maxRetries) {
    $attempt++;
    
    // Find working proxy
    $proxyData = findWorkingProxy();
    
    if (!$proxyData) {
        $result = [
            "status" => "error",
            "message" => "No working proxies found",
            "_proxy" => [
                "proxy_used" => "none",
                "device" => "Unknown",
                "pool_size" => 0,
                "total_fetched" => 0,
                "execution_time_ms" => round((microtime(true) - $startTime) * 1000),
                "attempt" => $attempt,
                "success" => false,
                "credit" => "@BRONX_ULTRA"
            ]
        ];
        break;
    }
    
    $selectedProxy = $proxyData['proxy'];
    $poolSize = $proxyData['pool'];
    $totalFetched = $proxyData['total'];
    
    // Random device
    $device = $devices[array_rand($devices)];
    $deviceName = $device[0];
    $userAgent = $device[1];
    
    // Make request
    $requestResult = makeRequest($rc, $selectedProxy, $deviceName, $userAgent);
    $execTime = round((microtime(true) - $startTime) * 1000);
    
    // Parse response
    $data = json_decode($requestResult['response'], true);
    
    // Check if success
    if ($data && isset($data['status']) && $data['status'] === 'success') {
        $data["_proxy"] = [
            "proxy_used" => $selectedProxy,
            "device" => $deviceName,
            "pool_size" => $poolSize,
            "total_fetched" => $totalFetched,
            "session_id" => substr($requestResult['sessionId'], 0, 8) . "***",
            "execution_time_ms" => $execTime,
            "attempt" => $attempt,
            "ip_rotated" => true,
            "success" => true,
            "note" => "✅ Limit bypassed with fresh proxy!",
            "credit" => "@BRONX_ULTRA"
        ];
        echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        exit;
    }
    
    // If limit error, retry with new proxy
    if (strpos($requestResult['response'], 'daily limit') !== false || 
        strpos($requestResult['response'], 'limit') !== false) {
        continue; // Try next proxy
    }
    
    // Other error
    $result = [
        "status" => "error",
        "message" => $data['message'] ?? "Unknown error",
        "_proxy" => [
            "proxy_used" => $selectedProxy,
            "device" => $deviceName,
            "pool_size" => $poolSize,
            "total_fetched" => $totalFetched,
            "execution_time_ms" => $execTime,
            "attempt" => $attempt,
            "success" => false,
            "credit" => "@BRONX_ULTRA"
        ]
    ];
    break;
}

// If all retries failed
if (!$result) {
    $result = [
        "status" => "error",
        "message" => "All proxies failed. Try again!",
        "_proxy" => [
            "proxy_used" => "none",
            "device" => "Unknown",
            "pool_size" => 0,
            "total_fetched" => 0,
            "execution_time_ms" => round((microtime(true) - $startTime) * 1000),
            "attempt" => $maxRetries,
            "success" => false,
            "credit" => "@BRONX_ULTRA"
        ]
    ];
}

echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
