<?php
// ============================================
// 🚀 BRONX 91WHEELS PROXY V3 - IP ROTATION
// Bypass Daily Limit • Fresh IP Every Request
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
<title>🚗 BRONX RC PROXY V3 - IP ROTATION</title>
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
.warning{color:#ff6b6b;font-size:11px;background:rgba(255,0,0,.1);padding:8px;border-radius:8px;margin:6px 0}
</style></head>
<body>
<div class="card">
<h1>🚗 BRONX RC PROXY V3</h1>
<p class="subtitle">🔄 IP ROTATION • BYPASS LIMITS</p>
<div class="badges">
<span class="badge">🌐 Fresh IP</span><span class="badge">🔄 Rotation</span>
<span class="badge">✅ Unlimited</span><span class="badge">⚡ Fast</span>
</div>
<div class="stats">
<div class="stat"><div class="num" id="reqs">0</div><div class="lbl">Requests</div></div>
<div class="stat"><div class="num" id="oks">0</div><div class="lbl">Success</div></div>
<div class="stat"><div class="num" id="prx">0</div><div class="lbl">Proxies</div></div>
<div class="stat"><div class="num">∞</div><div class="lbl">Limit</div></div>
</div>
<div class="api-box"><code>GET /?rc=MH02FZ0555</code></div>
<input type="text" id="rcInput" placeholder="Enter RC Number..." autocomplete="off">
<button onclick="fetchRC()">🔍 FETCH WITH FRESH IP</button>
<div class="result" id="result"><div class="info" id="info"></div><pre id="data"></pre></div>
<footer>@BRONX_ULTRA • 🔄 IP Rotation Active</footer>
</div>
<script>
var req=0,ok=0,startTime;
async function fetchRC(){
var n=document.getElementById('rcInput').value.trim();
if(!n){alert('Enter RC!');return}
var r=document.getElementById('result'),d=document.getElementById('data'),i=document.getElementById('info');
r.classList.add('show');d.style.color='#ffb400';d.textContent='⏳ Finding fresh proxy with new IP...';
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
i.innerHTML='🌐 New IP: '+json._proxy.proxy_used+' | 📱 '+json._proxy.device+' | ⚡ '+elapsed+'s | 🔄 Rotation #'+req;
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
// 🔥 MULTI-SOURCE PROXY FETCH
// ============================================
function fetchProxiesFromSources() {
    $allProxies = [];
    $sources = [
        // Source 1: ProxyScrape (HTTP)
        "https://api.proxyscrape.com/v2/?request=displayproxies&protocol=http&timeout=1000&country=all&ssl=all&anonymity=all",
        
        // Source 2: ProxyScrape (HTTPS)
        "https://api.proxyscrape.com/v2/?request=displayproxies&protocol=https&timeout=1000&country=all&ssl=all&anonymity=all",
        
        // Source 3: Proxyscrape Socks5
        "https://api.proxyscrape.com/v2/?request=displayproxies&protocol=socks5&timeout=1000&country=all&ssl=all&anonymity=all",
        
        // Source 4: OpenProxyList
        "https://api.openproxy.space/list/http",
        
        // Source 5: FreeProxyList
        "https://free-proxy-list.net/",
    ];
    
    foreach ($sources as $url) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 3,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36",
        ]);
        $result = curl_exec($ch);
        curl_close($ch);
        
        if ($result) {
            // Try to parse JSON
            $data = json_decode($result, true);
            if ($data) {
                // Handle different API formats
                if (isset($data['data']) && is_array($data['data'])) {
                    foreach ($data['data'] as $item) {
                        if (isset($item['ip']) && isset($item['port'])) {
                            $allProxies[] = $item['ip'] . ':' . $item['port'];
                        }
                    }
                } elseif (isset($data['proxies']) && is_array($data['proxies'])) {
                    foreach ($data['proxies'] as $proxy) {
                        $allProxies[] = $proxy;
                    }
                }
            } else {
                // Parse text format
                $lines = explode("\n", trim($result));
                foreach ($lines as $line) {
                    $line = trim($line);
                    // Look for IP:PORT pattern
                    if (preg_match('/\b\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}:\d{2,5}\b/', $line, $matches)) {
                        $allProxies[] = $matches[0];
                    }
                }
            }
        }
    }
    
    // Also fetch from cache if available
    $cacheFile = '/tmp/proxy_pool.json';
    if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < 60)) {
        $cached = json_decode(file_get_contents($cacheFile), true);
        if ($cached && is_array($cached)) {
            $allProxies = array_merge($allProxies, $cached);
        }
    }
    
    // Deduplicate
    $allProxies = array_unique($allProxies);
    $allProxies = array_values($allProxies);
    
    // Save cache
    if (count($allProxies) > 0) {
        file_put_contents($cacheFile, json_encode($allProxies));
    }
    
    return $allProxies;
}

// ============================================
// ⚡ FAST PROXY VALIDATION (Parallel)
// ============================================
function validateProxies($proxies, $limit = 10) {
    $working = [];
    $testRC = "MH02FZ0555";
    $url = "https://api1.91wheels.com/api/v1/third/rc-detail";
    $payload = json_encode(["regNo" => $testRC, "sessionid" => "test-" . uniqid()]);
    
    $mh = curl_multi_init();
    $handles = [];
    
    $testCount = min($limit, count($proxies));
    for ($i = 0; $i < $testCount; $i++) {
        $proxy = $proxies[$i];
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_TIMEOUT => 3,
            CURLOPT_CONNECTTIMEOUT => 2,
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
    
    foreach ($handles as $h) {
        $httpCode = curl_getinfo($h['ch'], CURLINFO_HTTP_CODE);
        if ($httpCode >= 200 && $httpCode < 500) {
            $working[] = $h['proxy'];
            if (count($working) >= 3) break; // Need 3 working proxies
        }
        curl_multi_remove_handle($mh, $h['ch']);
        curl_close($h['ch']);
    }
    curl_multi_close($mh);
    
    return $working;
}

// ============================================
// 🔥 GET PROXY WITH ROTATION (Fresh IP)
// ============================================
function getFreshProxy() {
    // Track used proxies to avoid repeats
    $usedFile = '/tmp/used_proxies.json';
    $usedProxies = [];
    if (file_exists($usedFile)) {
        $usedProxies = json_decode(file_get_contents($usedFile), true) ?: [];
    }
    
    // Get all proxies
    $allProxies = fetchProxiesFromSources();
    
    // Filter out used proxies
    $availableProxies = array_diff($allProxies, $usedProxies);
    
    // If no available proxies, reset used list
    if (count($availableProxies) < 5) {
        $usedProxies = [];
        $availableProxies = $allProxies;
    }
    
    // Validate working proxies
    $workingProxies = validateProxies($availableProxies, 15);
    
    if (count($workingProxies) > 0) {
        // Pick random working proxy
        $selected = $workingProxies[array_rand($workingProxies)];
        
        // Mark as used
        $usedProxies[] = $selected;
        if (count($usedProxies) > 100) {
            $usedProxies = array_slice($usedProxies, -50);
        }
        file_put_contents($usedFile, json_encode($usedProxies));
        
        return [
            'proxy' => $selected,
            'pool_size' => count($workingProxies),
            'total_fetched' => count($allProxies)
        ];
    }
    
    return null;
}

// ============================================
// 🚀 MAIN EXECUTION
// ============================================

$startTime = microtime(true);
$proxyInfo = getFreshProxy();

$selectedProxy = null;
$usedProxy = false;
$poolSize = 0;
$totalFetched = 0;

if ($proxyInfo) {
    $selectedProxy = $proxyInfo['proxy'];
    $poolSize = $proxyInfo['pool_size'];
    $totalFetched = $proxyInfo['total_fetched'];
    $usedProxy = true;
}

// ============ DEVICE ROTATION ============
$devices = [
    ["Chrome 120 / Win10", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36"],
    ["Safari / iPhone", "Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1"],
    ["Chrome / Android", "Mozilla/5.0 (Linux; Android 14; Pixel 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36"],
    ["Firefox / Win", "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0"],
    ["Edge / Win11", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0"],
];

$device = $devices[array_rand($devices)];
$deviceName = $device[0];
$userAgent = $device[1];

// ============ SESSION ============
$sessionId = bin2hex(random_bytes(4)) . '-' . dechex(time()) . '-' . rand(100, 999);

// ============ MAKE REQUEST ============
$payload = json_encode([
    "regNo" => $rc,
    "sessionid" => $sessionId
]);

$url = "https://api1.91wheels.com/api/v1/third/rc-detail";

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $payload,
    CURLOPT_TIMEOUT => 10,
    CURLOPT_CONNECTTIMEOUT => 5,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "Accept: application/json, text/plain, */*",
        "Accept-Language: en-US,en;q=0.9",
        "Accept-Encoding: gzip, deflate, br",
        "Origin: https://www.91wheels.com",
        "Referer: https://www.91wheels.com/",
        "User-Agent: $userAgent",
        "Cache-Control: no-cache",
        "Pragma: no-cache",
    ],
    CURLOPT_COOKIE => "session_id=$sessionId",
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_ENCODING => '',
]);

if ($selectedProxy) {
    curl_setopt($ch, CURLOPT_PROXY, $selectedProxy);
    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
}

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
$execTime = round((microtime(true) - $startTime) * 1000);
curl_close($ch);

// ============ IF LIMIT ERROR, ROTATE IP AND RETRY ============
if (strpos($response, 'daily limit') !== false || strpos($response, 'limit') !== false) {
    // Try with another proxy
    $proxyInfo2 = getFreshProxy();
    if ($proxyInfo2) {
        $selectedProxy = $proxyInfo2['proxy'];
        $poolSize = $proxyInfo2['pool_size'];
        $totalFetched = $proxyInfo2['total_fetched'];
        
        $ch2 = curl_init($url);
        curl_setopt_array($ch2, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "Accept: application/json, text/plain, */*",
                "Origin: https://www.91wheels.com",
                "Referer: https://www.91wheels.com/",
                "User-Agent: $userAgent",
                "Cache-Control: no-cache",
            ],
            CURLOPT_PROXY => $selectedProxy,
            CURLOPT_PROXYTYPE => CURLPROXY_HTTP,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_ENCODING => '',
        ]);
        $response = curl_exec($ch2);
        $httpCode = curl_getinfo($ch2, CURLINFO_HTTP_CODE);
        curl_close($ch2);
    }
}

// ============ RESPONSE ============
$data = json_decode($response, true);

if (!$data) {
    // Try to parse HTML error
    if (strpos($response, 'limit') !== false) {
        echo json_encode([
            "status" => "error",
            "message" => "Rate limit hit. Rotating IP...",
            "response" => substr($response, 0, 500),
            "_proxy" => [
                "proxy_used" => $selectedProxy ?? "none",
                "device" => $deviceName,
                "pool_size" => $poolSize,
                "total_fetched" => $totalFetched,
                "execution_time_ms" => $execTime,
                "ip_rotated" => true,
                "success" => false,
                "credit" => "@BRONX_ULTRA"
            ]
        ]);
        exit;
    }
    
    echo json_encode([
        "status" => "error",
        "message" => "Invalid response (HTTP $httpCode)",
        "_proxy" => [
            "proxy_used" => $selectedProxy ?? "direct",
            "device" => $deviceName,
            "pool_size" => $poolSize,
            "total_fetched" => $totalFetched,
            "execution_time_ms" => $execTime,
            "success" => false,
            "credit" => "@BRONX_ULTRA"
        ]
    ]);
    exit;
}

// Success
$data["_proxy"] = [
    "proxy_used" => $selectedProxy ?? "direct (no proxy)",
    "device" => $deviceName,
    "pool_size" => $poolSize,
    "total_fetched" => $totalFetched,
    "session_id" => substr($sessionId, 0, 8) . "***",
    "execution_time_ms" => $execTime,
    "ip_rotated" => $usedProxy,
    "success" => true,
    "note" => $usedProxy ? "✅ Fresh IP used to bypass limit!" : "⚠️ Direct connection (may hit limit)",
    "credit" => "@BRONX_ULTRA"
];

echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
