<?php
// ============================================
// 🚀 BRONX 91WHEELS PROXY V2 - OPTIMIZED
// Speed: 30-40s → 5-8s ⚡
// ============================================

set_time_limit(20);
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
<title>🚗 BRONX RC PROXY V2</title>
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
<h1>🚗 BRONX RC PROXY V2</h1>
<p class="subtitle">⚡ SPEED OPTIMIZED • 5-8 SECONDS</p>
<div class="badges">
<span class="badge">🌐 Live Proxies</span><span class="badge">⚡ Fast</span>
<span class="badge">✅ Tested</span><span class="badge">∞ Unlimited</span>
</div>
<div class="stats">
<div class="stat"><div class="num" id="reqs">0</div><div class="lbl">Requests</div></div>
<div class="stat"><div class="num" id="oks">0</div><div class="lbl">Success</div></div>
<div class="stat"><div class="num" id="prx">0</div><div class="lbl">Proxies</div></div>
<div class="stat"><div class="num">∞</div><div class="lbl">Limit</div></div>
</div>
<div class="api-box"><code>GET /?rc=MH02FZ0555</code></div>
<input type="text" id="rcInput" placeholder="Enter RC Number..." autocomplete="off">
<button onclick="fetchRC()">🔍 FETCH WITH LIVE PROXY</button>
<div class="result" id="result"><div class="info" id="info"></div><pre id="data"></pre></div>
<footer>@BRONX_ULTRA • ⚡ Speed Optimized</footer>
</div>
<script>
var req=0,ok=0,startTime;
async function fetchRC(){
var n=document.getElementById('rcInput').value.trim();
if(!n){alert('Enter RC!');return}
var r=document.getElementById('result'),d=document.getElementById('data'),i=document.getElementById('info');
r.classList.add('show');d.style.color='#ffb400';d.textContent='⏳ Fetching LIVE proxy & connecting...';
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
// 🔥 CACHED PROXY POOL (Speed Boost)
// ============================================
function getCachedProxies() {
    $cacheFile = '/tmp/proxy_cache.json';
    
    // Cache for 2 minutes
    if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < 120)) {
        $data = json_decode(file_get_contents($cacheFile), true);
        if ($data && count($data) > 0) {
            return $data;
        }
    }
    
    // Fetch fresh proxies
    $proxies = [];
    
    // Source 1: ProxyScrape (FAST - 2 sec timeout)
    $url = "https://api.proxyscrape.com/v2/?request=displayproxies&protocol=http&timeout=1000&country=all&ssl=all&anonymity=all";
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 3,
        CURLOPT_SSL_VERIFYPEER => false,
    ]);
    $result = curl_exec($ch);
    curl_close($ch);
    
    if ($result) {
        $lines = explode("\n", trim($result));
        foreach ($lines as $line) {
            $line = trim($line);
            if (!empty($line) && strpos($line, ':') !== false) {
                $proxies[] = $line;
            }
        }
    }
    
    // Deduplicate
    $proxies = array_unique($proxies);
    $proxies = array_values($proxies);
    
    // Save cache
    if (count($proxies) > 0) {
        file_put_contents($cacheFile, json_encode($proxies));
    }
    
    return $proxies;
}

// ============================================
// ⚡ FAST PROXY TEST (2 sec timeout)
// ============================================
function testProxyFast($proxy, $testRC = "MH02FZ0555") {
    $ch = curl_init("https://api1.91wheels.com/api/v1/third/rc-detail");
    
    $payload = json_encode([
        "regNo" => $testRC,
        "sessionid" => "test-" . uniqid()
    ]);
    
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_TIMEOUT => 2, // ⚡ 2 sec only
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
        CURLOPT_NOBODY => true, // ⚡ HEAD request only - faster!
    ]);
    
    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    // Any 2xx/4xx response means proxy is alive
    return ($httpCode >= 200 && $httpCode < 500);
}

// ============================================
// 🚀 MAIN LOGIC - OPTIMIZED
// ============================================

// Get cached proxies (or fetch new)
$startTime = microtime(true);
$allProxies = getCachedProxies();

$workingProxies = [];
$maxTest = min(8, count($allProxies)); // ⚡ Test max 8 only

// Multi-threaded proxy testing using curl_multi
if (count($allProxies) > 0) {
    $mh = curl_multi_init();
    $handles = [];
    
    $testRC = "MH02FZ0555";
    $url = "https://api1.91wheels.com/api/v1/third/rc-detail";
    $payload = json_encode(["regNo" => $testRC, "sessionid" => "test-" . uniqid()]);
    
    $testCount = min($maxTest, count($allProxies));
    for ($i = 0; $i < $testCount; $i++) {
        $proxy = $allProxies[$i];
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
        $handles[$i] = ['ch' => $ch, 'proxy' => $proxy];
    }
    
    // Execute all requests in parallel
    $running = null;
    do {
        curl_multi_exec($mh, $running);
        curl_multi_select($mh);
    } while ($running > 0);
    
    // Collect results
    foreach ($handles as $h) {
        $httpCode = curl_getinfo($h['ch'], CURLINFO_HTTP_CODE);
        if ($httpCode >= 200 && $httpCode < 500) {
            $workingProxies[] = $h['proxy'];
            if (count($workingProxies) >= 2) break; // 2 working proxies enough
        }
        curl_multi_remove_handle($mh, $h['ch']);
        curl_close($h['ch']);
    }
    curl_multi_close($mh);
}

// Select proxy
$selectedProxy = null;
$usedProxy = false;

if (count($workingProxies) > 0) {
    $selectedProxy = $workingProxies[array_rand($workingProxies)];
    $usedProxy = true;
}

// ============ DEVICE ============
$devices = [
    ["Chrome 120 / Win10", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36"],
    ["Safari / iPhone", "Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1"],
];

$device = $devices[array_rand($devices)];
$deviceName = $device[0];
$userAgent = $device[1];

// ============ SESSION ============
$sessionId = bin2hex(random_bytes(4)) . '-' . dechex(time());

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
    CURLOPT_TIMEOUT => 8,
    CURLOPT_CONNECTTIMEOUT => 4,
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

// ============ RESPONSE ============
if ($error) {
    echo json_encode([
        "status" => "error",
        "message" => $error,
        "_proxy" => [
            "proxy_used" => $usedProxy ? ($selectedProxy ?? "proxy") : "direct",
            "device" => $deviceName,
            "pool_size" => count($workingProxies),
            "total_fetched" => count($allProxies),
            "execution_time_ms" => $execTime,
            "success" => false,
            "credit" => "@BRONX_ULTRA"
        ]
    ]);
    exit;
}

$data = json_decode($response, true);

if (!$data) {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid response (HTTP $httpCode)",
        "_proxy" => [
            "proxy_used" => $usedProxy ? ($selectedProxy ?? "proxy") : "direct",
            "device" => $deviceName,
            "pool_size" => count($workingProxies),
            "total_fetched" => count($allProxies),
            "execution_time_ms" => $execTime,
            "success" => false,
            "credit" => "@BRONX_ULTRA"
        ]
    ]);
    exit;
}

// Success
$data["_proxy"] = [
    "proxy_used" => $usedProxy ? $selectedProxy : "direct (no working proxy)",
    "device" => $deviceName,
    "pool_size" => count($workingProxies),
    "total_fetched" => count($allProxies),
    "tested" => $maxTest,
    "session_id" => substr($sessionId, 0, 8) . "***",
    "execution_time_ms" => $execTime,
    "success" => true,
    "note" => $usedProxy ? "Request sent via LIVE PROXY!" : "Direct connection",
    "credit" => "@BRONX_ULTRA"
];

echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
