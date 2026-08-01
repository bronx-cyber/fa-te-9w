<?php
// ============================================
// 🚗 BRONX 91WHEELS PROXY V3 - FLASH EDITION
// Ultra-Fast Parallel Proxy Routing • <5s Response
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

// Home page
if ($rc === '') {
    header("Content-Type: text/html");
    ?>
<!DOCTYPE html>
<html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>🚗 BRONX RC PROXY V3 - FLASH</title>
<style>
*{margin:0;padding:0;box-sizing:border-box}
body{background:#000a14;color:#d0d8f0;font-family:'Segoe UI',Arial,sans-serif;min-height:100vh;display:flex;justify-content:center;align-items:center;padding:20px}
.card{background:rgba(5,15,35,.95);border:1px solid rgba(0,255,136,.2);border-radius:24px;padding:35px;max-width:700px;width:100%;text-align:center}
h1{font-size:24px;background:linear-gradient(90deg,#00ff88,#0096ff);-webkit-background-clip:text;-webkit-text-fill-color:transparent;animation:pulse 2s infinite}
@keyframes pulse{0%,100%{opacity:1}50%{opacity:0.7}}
.subtitle{color:#00ff88;font-size:11px;letter-spacing:2px;margin:5px 0 12px}
.badges{display:flex;justify-content:center;flex-wrap:wrap;gap:8px;margin:15px 0}
.badge{display:inline-block;padding:5px 12px;border-radius:20px;font-size:9px;font-weight:700;background:rgba(0,255,136,.1);color:#00ff88;border:1px solid rgba(0,255,136,.2)}
.stats{display:grid;grid-template-columns:repeat(4,1fr);gap:8px;margin:15px 0}
.stat{background:rgba(0,0,0,.5);border:1px solid rgba(255,255,255,.08);border-radius:12px;padding:14px 6px}
.stat .num{font-size:22px;font-weight:900;color:#00ff88}
.stat .lbl{font-size:8px;color:#888;text-transform:uppercase;margin-top:4px}
.api-box{background:rgba(0,0,0,.4);border:1px solid rgba(0,150,255,.2);border-radius:12px;padding:16px;margin:12px 0;text-align:left}
.api-box code{color:#ffb400;font-family:'Courier New',monospace;font-size:12px;display:block;margin:6px 0;background:rgba(0,0,0,.3);padding:10px;border-radius:8px;word-break:break-all}
input{width:100%;padding:15px;background:rgba(0,0,0,.6);border:2px solid rgba(0,255,136,.2);border-radius:12px;color:#fff;font-size:16px;outline:none;margin:8px 0;transition:all 0.3s}
input:focus{border-color:#00ff88;box-shadow:0 0 20px rgba(0,255,136,.1)}
button{width:100%;padding:16px;background:linear-gradient(135deg,#00ff88,#0096ff);color:#000;border:none;border-radius:12px;font-weight:800;cursor:pointer;font-size:15px;margin:8px 0;transition:all 0.3s;text-transform:uppercase;letter-spacing:1px}
button:hover{transform:scale(1.02);box-shadow:0 10px 30px rgba(0,255,136,.2)}
.result{background:rgba(0,0,0,.6);border:1px solid rgba(0,255,136,.15);border-radius:12px;padding:16px;margin-top:12px;text-align:left;display:none;max-height:500px;overflow:auto}
.result.show{display:block}
.info{color:#ffb400;font-size:11px;margin-bottom:8px}
pre{color:#00ff88;font-family:'Courier New',monospace;font-size:11px;white-space:pre-wrap;line-height:1.4}
.blink{animation:blink 1s infinite}
@keyframes blink{0%,100%{opacity:1}50%{opacity:0.5}}
footer{color:#444;font-size:9px;margin-top:15px}
</style></head>
<body>
<div class="card">
<h1>⚡ BRONX RC PROXY V3</h1>
<p class="subtitle">FLASH EDITION • 2-5s RESPONSE • UNLIMITED</p>
<div class="badges">
<span class="badge">⚡ Ultra Fast</span><span class="badge">🌐 Multi-Proxy</span>
<span class="badge">🔄 Parallel Test</span><span class="badge">∞ No Limit</span>
</div>
<div class="stats">
<div class="stat"><div class="num" id="reqs">0</div><div class="lbl">Requests</div></div>
<div class="stat"><div class="num" id="oks">0</div><div class="lbl">Success</div></div>
<div class="stat"><div class="num" id="prx">0</div><div class="lbl">Proxies</div></div>
<div class="stat"><div class="num" id="speed">0s</div><div class="lbl">Speed</div></div>
</div>
<div class="api-box"><code>GET /?rc=MH02FZ0555</code></div>
<input type="text" id="rcInput" placeholder="Enter RC Number (e.g., MH02FZ0555)..." autocomplete="off">
<button onclick="fetchRC()">⚡ FLASH FETCH WITH PROXY</button>
<div class="result" id="result"><div class="info" id="info"></div><pre id="data"></pre></div>
<footer>@BRONX_ULTRA • V3 FLASH</footer>
</div>
<script>
var req=0,ok=0;
async function fetchRC(){
var n=document.getElementById('rcInput').value.trim();
if(!n){alert('Enter RC Number!');return}
var r=document.getElementById('result'),d=document.getElementById('data'),i=document.getElementById('info');
r.classList.add('show');d.style.color='#ffb400';d.textContent='⚡ Scanning proxies & fetching...';
d.classList.add('blink');
var start=Date.now();
try{
var resp=await fetch('?rc='+encodeURIComponent(n));
var json=await resp.json();
var elapsed=((Date.now()-start)/1000).toFixed(1);
d.classList.remove('blink');d.style.color='#00ff88';d.textContent=JSON.stringify(json,null,2);
req++;if(json.status==='success')ok++;
document.getElementById('reqs').textContent=req;
document.getElementById('oks').textContent=ok;
document.getElementById('speed').textContent=elapsed+'s';
if(json._proxy){
i.innerHTML='🌐 Proxy: '+json._proxy.proxy_used+' | 📱 '+json._proxy.device+' | ⚡ '+elapsed+'s';
document.getElementById('prx').textContent=json._proxy.pool_size;
}
}catch(e){
d.classList.remove('blink');d.style.color='#ff0080';d.textContent='Error: '+e.message;
req++;document.getElementById('reqs').textContent=req;
}
}
</script>
</body></html>
    <?php
    exit;
}

// ============================================
// ⚡ ULTRA-FAST PARALLEL PROXY FETCH
// ============================================
function fetchProxiesFast() {
    $proxySources = [
        'https://api.proxyscrape.com/v2/?request=displayproxies&protocol=http&timeout=1000&country=all&ssl=all&anonymity=all',
        'https://www.proxy-list.download/api/v1/get?type=http',
        'https://raw.githubusercontent.com/TheSpeedX/PROXY-List/master/http.txt',
        'https://raw.githubusercontent.com/ShiftyTR/Proxy-List/master/http.txt',
        'https://raw.githubusercontent.com/monosans/proxy-list/main/proxies/http.txt'
    ];
    
    // Parallel fetch with multi_curl
    $mh = curl_multi_init();
    $handles = [];
    
    foreach ($proxySources as $url) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 3,
            CURLOPT_CONNECTTIMEOUT => 2,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_FOLLOWLOCATION => true,
        ]);
        curl_multi_add_handle($mh, $ch);
        $handles[] = $ch;
    }
    
    // Execute all requests in parallel
    do {
        curl_multi_exec($mh, $running);
        curl_multi_select($mh);
    } while ($running > 0);
    
    $allProxies = [];
    
    foreach ($handles as $ch) {
        $result = curl_multi_getcontent($ch);
        if ($result) {
            $lines = explode("\n", trim($result));
            foreach ($lines as $line) {
                $line = trim($line);
                if (!empty($line) && preg_match('/\d+\.\d+\.\d+\.\d+:\d+/', $line)) {
                    $allProxies[] = $line;
                }
            }
        }
        curl_multi_remove_handle($mh, $ch);
        curl_close($ch);
    }
    
    curl_multi_close($mh);
    
    return array_values(array_unique($allProxies));
}

// ============================================
// ⚡ PARALLEL PROXY TESTING (FASTEST METHOD)
// ============================================
function testProxiesParallel($proxies, $maxTest = 20) {
    $proxies = array_slice($proxies, 0, $maxTest);
    $working = [];
    
    // Test in batches of 5 for speed
    $batches = array_chunk($proxies, 5);
    
    foreach ($batches as $batch) {
        $mh = curl_multi_init();
        $handles = [];
        $proxyMap = [];
        
        foreach ($batch as $proxy) {
            $ch = curl_init("https://api1.91wheels.com/api/v1/third/rc-detail");
            
            $payload = json_encode([
                "regNo" => "MH02FZ0555",
                "sessionid" => "test-" . uniqid()
            ]);
            
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
                    "User-Agent: Mozilla/5.0",
                ],
                CURLOPT_SSL_VERIFYPEER => false,
            ]);
            
            curl_multi_add_handle($mh, $ch);
            $handles[$proxy] = $ch;
        }
        
        // Execute batch
        do {
            curl_multi_exec($mh, $running);
            curl_multi_select($mh, 0.1); // Very short wait
        } while ($running > 0);
        
        // Check results
        foreach ($handles as $proxy => $ch) {
            $response = curl_multi_getcontent($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            
            if ($httpCode === 200 && $response && strlen($response) > 100) {
                $data = json_decode($response, true);
                if ($data && !isset($data['message'])) {
                    $working[] = $proxy;
                }
            }
            
            curl_multi_remove_handle($mh, $ch);
            curl_close($ch);
        }
        
        curl_multi_close($mh);
        
        // Stop if we have enough working proxies
        if (count($working) >= 5) break;
    }
    
    return $working;
}

// ============================================
// ⚡ CACHED PROXY LIST (Avoid re-fetching)
// ============================================
$cacheFile = sys_get_temp_dir() . '/bronx_proxies_v3.json';
$cacheTTL = 60; // 1 minute cache

$allProxies = [];
$workingProxies = [];

if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTTL) {
    $cached = json_decode(file_get_contents($cacheFile), true);
    if ($cached && isset($cached['working']) && count($cached['working']) > 0) {
        $workingProxies = $cached['working'];
        $allProxies = $cached['all'] ?? $workingProxies;
    }
}

// Fetch fresh if no cache
if (empty($workingProxies)) {
    $allProxies = fetchProxiesFast();
    
    if (!empty($allProxies)) {
        $workingProxies = testProxiesParallel($allProxies, 20);
        
        // Cache results
        if (!empty($workingProxies)) {
            file_put_contents($cacheFile, json_encode([
                'working' => $workingProxies,
                'all' => $allProxies,
                'time' => time()
            ]));
        }
    }
}

// ============================================
// ⚡ SMART PROXY SELECTION
// ============================================
$selectedProxy = null;
$usedProxy = false;

if (count($workingProxies) > 0) {
    // Pick random working proxy
    $selectedProxy = $workingProxies[array_rand($workingProxies)];
    $usedProxy = true;
} elseif (count($allProxies) > 0) {
    // Fallback: pick any proxy
    $selectedProxy = $allProxies[array_rand($allProxies)];
    $usedProxy = true;
}

// ============================================
// ⚡ OPTIMIZED DEVICE LIST
// ============================================
$devices = [
    ["Chrome 120 / Win10", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36"],
    ["Chrome / Android 14", "Mozilla/5.0 (Linux; Android 14; Pixel 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36"],
];

$device = $devices[array_rand($devices)];
$deviceName = $device[0];
$userAgent = $device[1];

// ============================================
// ⚡ MAIN REQUEST WITH QUICK TIMEOUT
// ============================================
$sessionId = substr(bin2hex(random_bytes(3)), 0, 8);

$payload = json_encode([
    "regNo" => $rc,
    "sessionid" => $sessionId . '-' . dechex(time())
]);

$url = "https://api1.91wheels.com/api/v1/third/rc-detail";

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $payload,
    CURLOPT_TIMEOUT => 8,        // Quick timeout
    CURLOPT_CONNECTTIMEOUT => 4,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "Accept: application/json, text/plain, */*",
        "Origin: https://www.91wheels.com",
        "Referer: https://www.91wheels.com/",
        "User-Agent: $userAgent",
        "Cache-Control: no-cache",
    ],
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_FRESH_CONNECT => true,
    CURLOPT_FORBID_REUSE => true,
]);

// Add proxy if available
if ($selectedProxy) {
    curl_setopt($ch, CURLOPT_PROXY, $selectedProxy);
    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
    curl_setopt($ch, CURLOPT_TIMEOUT, 6);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
}

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
$totalTime = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

// ============================================
// ⚡ QUICK RETRY WITHOUT PROXY IF FAILED
// ============================================
if (($error || $httpCode !== 200 || !$response) && $selectedProxy) {
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_TIMEOUT => 6,
        CURLOPT_CONNECTTIMEOUT => 3,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "Accept: application/json",
            "Origin: https://www.91wheels.com",
            "Referer: https://www.91wheels.com/",
            "User-Agent: $userAgent",
        ],
        CURLOPT_SSL_VERIFYPEER => false,
    ]);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    $totalTime = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
    curl_close($ch);
    
    $usedProxy = false;
    $selectedProxy = null;
}

// ============================================
// ⚡ RESPONSE
// ============================================
if ($error || !$response) {
    echo json_encode([
        "status" => "error",
        "message" => $error ?: "No response",
        "response_time" => round($totalTime, 2) . "s",
        "_proxy" => [
            "proxy_used" => $usedProxy ? $selectedProxy : "direct",
            "device" => $deviceName,
            "pool_size" => count($workingProxies),
            "total_fetched" => count($allProxies),
            "success" => false,
            "credit" => "@BRONX_ULTRA"
        ]
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

$data = json_decode($response, true);

if (!$data) {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid response (HTTP $httpCode)",
        "response_time" => round($totalTime, 2) . "s",
        "_proxy" => [
            "proxy_used" => $usedProxy ? $selectedProxy : "direct",
            "device" => $deviceName,
            "pool_size" => count($workingProxies),
            "total_fetched" => count($allProxies),
            "success" => false,
            "credit" => "@BRONX_ULTRA"
        ]
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

// Success with metadata
$data["_proxy"] = [
    "proxy_used" => $usedProxy ? $selectedProxy : "direct",
    "device" => $deviceName,
    "pool_size" => count($workingProxies),
    "total_fetched" => count($allProxies),
    "response_time" => round($totalTime, 2) . "s",
    "success" => true,
    "credit" => "@BRONX_ULTRA • V3 FLASH"
];

echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
