<?php
// ============================================
// 🚗 BRONX 91WHEELS PROXY V6 (UNLIMITED)
// Auto-Retry on Limit • Multi-Session • Multi-Device
// ============================================

set_time_limit(30);
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: *");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$rc = trim($_GET['rc'] ?? $_GET['term'] ?? '');

// ============ HOME PAGE (same as before, but with V6) ============
if ($rc === '') {
    header("Content-Type: text/html");
    ?>
<!DOCTYPE html>
<html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>🚗 BRONX RC PROXY V6</title>
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
<h1>🚗 BRONX RC PROXY V6</h1>
<p class="subtitle">♾️ UNLIMITED • AUTO-RETRY • MULTI-SESSION</p>
<div class="badges">
<span class="badge">🌐 Live Proxies</span><span class="badge">🔄 Auto-Retry</span>
<span class="badge">✅ Unlimited</span><span class="badge">♾️ No Limit</span>
</div>
<div class="stats">
<div class="stat"><div class="num" id="reqs">0</div><div class="lbl">Requests</div></div>
<div class="stat"><div class="num" id="oks">0</div><div class="lbl">Success</div></div>
<div class="stat"><div class="num" id="prx">0</div><div class="lbl">Proxies</div></div>
<div class="stat"><div class="num">∞</div><div class="lbl">Limit</div></div>
</div>
<div class="api-box"><code>GET /?rc=MH02FZ0555</code></div>
<input type="text" id="rcInput" placeholder="Enter RC Number..." autocomplete="off">
<button onclick="fetchRC()">🔍 FETCH UNLIMITED</button>
<div class="result" id="result"><div class="info" id="info"></div><pre id="data"></pre></div>
<footer>@BRONX_ULTRA • V6</footer>
</div>
<script>
var req=0,ok=0;
async function fetchRC(){
var n=document.getElementById('rcInput').value.trim();
if(!n){alert('Enter RC!');return}
var r=document.getElementById('result'),d=document.getElementById('data'),i=document.getElementById('info');
r.classList.add('show');d.style.color='#ffb400';d.textContent='⏳ Fetching & retrying if limit...';
try{
var resp=await fetch('?rc='+encodeURIComponent(n));
var json=await resp.json();
d.style.color='#00ff88';d.textContent=JSON.stringify(json,null,2);
req++;if(json.status==='success')ok++;
document.getElementById('reqs').textContent=req;
document.getElementById('oks').textContent=ok;
if(json._proxy){
i.innerHTML='🌐 Proxy: '+json._proxy.proxy_used+' | 📱 '+json._proxy.device+' | Retries: '+json._proxy.retries;
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
// 🔥 FETCH LIVE WORKING PROXIES (Cached)
// ============================================
function getWorkingProxies() {
    $cacheFile = __DIR__ . '/working_proxies.cache';
    $cacheTTL = 45; // seconds – refresh often to get fresh IPs

    // Check cache – only if we have at least 3 proxies
    if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheTTL)) {
        $cached = @json_decode(file_get_contents($cacheFile), true);
        if (is_array($cached) && count($cached) >= 3) {
            return $cached;
        }
    }

    // Fetch fresh proxies
    $allProxies = fetchLiveProxies();
    if (empty($allProxies)) {
        // Fallback: try direct if no proxies
        return [];
    }

    // Test in parallel (max 15 proxies, 4 sec timeout)
    $working = testProxiesParallel($allProxies, 15, 4);

    // Cache if we got at least 1 (but we prefer 3)
    if (count($working) > 0) {
        file_put_contents($cacheFile, json_encode($working));
    }

    return $working;
}

function fetchLiveProxies() {
    $proxies = [];
    
    // Source 1: ProxyScrape (HTTP)
    $url = "https://api.proxyscrape.com/v2/?request=displayproxies&protocol=http&timeout=3000&country=all&ssl=all&anonymity=all";
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
    
    // Source 2: ProxyList.download
    if (count($proxies) < 15) {
        $url2 = "https://www.proxy-list.download/api/v1/get?type=http";
        $ch = curl_init($url2);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 3,
            CURLOPT_SSL_VERIFYPEER => false,
        ]);
        $result2 = curl_exec($ch);
        curl_close($ch);
        if ($result2) {
            $lines = explode("\n", trim($result2));
            foreach ($lines as $line) {
                $line = trim($line);
                if (!empty($line) && strpos($line, ':') !== false) {
                    $proxies[] = $line;
                }
            }
        }
    }

    // Source 3: FreeProxyList (backup)
    if (count($proxies) < 15) {
        $url3 = "https://free-proxy-list.net/";
        $ch = curl_init($url3);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 3,
            CURLOPT_SSL_VERIFYPEER => false,
        ]);
        $result3 = curl_exec($ch);
        curl_close($ch);
        if ($result3) {
            preg_match_all('/\b(?:\d{1,3}\.){3}\d{1,3}:\d+\b/', $result3, $matches);
            if (!empty($matches[0])) {
                foreach ($matches[0] as $ip) {
                    $proxies[] = $ip;
                }
            }
        }
    }

    $proxies = array_unique($proxies);
    return array_values($proxies);
}

// ============================================
// 🔥 PARALLEL PROXY TESTING
// ============================================
function testProxiesParallel($proxies, $maxToTest = 15, $timeout = 4) {
    if (empty($proxies)) return [];
    
    $proxies = array_slice($proxies, 0, $maxToTest);
    $mh = curl_multi_init();
    $handles = [];
    
    foreach ($proxies as $index => $proxy) {
        $ch = curl_init();
        $payload = json_encode(["regNo" => "MH02FZ0555", "sessionid" => "test-" . uniqid()]);
        curl_setopt_array($ch, [
            CURLOPT_URL => "https://api1.91wheels.com/api/v1/third/rc-detail",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_TIMEOUT => $timeout,
            CURLOPT_CONNECTTIMEOUT => 2,
            CURLOPT_PROXY => $proxy,
            CURLOPT_PROXYTYPE => CURLPROXY_HTTP,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36"
            ],
            CURLOPT_SSL_VERIFYPEER => false,
        ]);
        curl_multi_add_handle($mh, $ch);
        $handles[$index] = ['ch' => $ch, 'proxy' => $proxy];
    }
    
    $running = null;
    do {
        curl_multi_exec($mh, $running);
        curl_multi_select($mh);
    } while ($running > 0);
    
    $working = [];
    foreach ($handles as $index => $item) {
        $ch = $item['ch'];
        $response = curl_multi_getcontent($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($httpCode === 200 && strlen($response) > 100) {
            $data = json_decode($response, true);
            // Check if response is valid (not limit message)
            if ($data && !isset($data['message']) && isset($data['status'])) {
                $working[] = $item['proxy'];
            }
        }
        curl_multi_remove_handle($mh, $ch);
        curl_close($ch);
    }
    curl_multi_close($mh);
    return $working;
}

// ============================================
// 🔥 MAIN LOGIC WITH RETRY
// ============================================

$workingProxies = getWorkingProxies();
$maxRetries = 3;
$attempt = 0;
$response = null;
$usedProxy = false;
$selectedProxy = null;
$lastError = '';

// List of devices
$devices = [
    ["Chrome 120 / Win10", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36"],
    ["Safari / iPhone", "Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1"],
    ["Chrome / Android", "Mozilla/5.0 (Linux; Android 14; Pixel 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36"],
    ["Firefox / Win", "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0"],
    ["Chrome / Mac", "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36"],
    ["Edge / Win", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0"],
    ["Safari / Mac", "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Safari/605.1.15"],
];

while ($attempt < $maxRetries) {
    $attempt++;
    
    // Pick a random proxy from pool
    if (count($workingProxies) > 0) {
        $selectedProxy = $workingProxies[array_rand($workingProxies)];
        $usedProxy = true;
    } else {
        $selectedProxy = null;
        $usedProxy = false;
    }
    
    // Random device
    $device = $devices[array_rand($devices)];
    $deviceName = $device[0];
    $userAgent = $device[1];
    
    // Fresh session ID
    $sessionId = bin2hex(random_bytes(4)) . '-' . dechex(time() + $attempt);
    $payload = json_encode(["regNo" => $rc, "sessionid" => $sessionId]);
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
    curl_close($ch);
    
    // If proxy failed, try direct (fallback)
    if (($error || $httpCode !== 200) && $selectedProxy) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "Accept: application/json, text/plain, */*",
                "Origin: https://www.91wheels.com",
                "Referer: https://www.91wheels.com/",
                "User-Agent: $userAgent",
            ],
            CURLOPT_SSL_VERIFYPEER => false,
        ]);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);
        $usedProxy = false;
        $selectedProxy = null;
    }
    
    if ($error) {
        $lastError = $error;
        continue; // retry with next proxy
    }
    
    $data = json_decode($response, true);
    if (!$data) {
        $lastError = "Invalid JSON response (HTTP $httpCode)";
        continue;
    }
    
    // Check if we hit the limit
    if (isset($data['message']) && stripos($data['message'], 'limit') !== false) {
        // Limit hit – retry with another proxy
        $lastError = "Limit hit, retrying...";
        // Optionally, remove this proxy from pool temporarily
        if ($selectedProxy && ($key = array_search($selectedProxy, $workingProxies)) !== false) {
            // Remove it so we don't use it again immediately
            unset($workingProxies[$key]);
            $workingProxies = array_values($workingProxies);
        }
        continue; // retry
    }
    
    // Successful response (no limit)
    $data["_proxy"] = [
        "proxy_used" => $usedProxy ? $selectedProxy : "direct",
        "device" => $deviceName,
        "pool_size" => count($workingProxies),
        "cached" => file_exists(__DIR__ . '/working_proxies.cache') ? 'yes' : 'no',
        "session_id" => substr($sessionId, 0, 8) . "***",
        "retries" => $attempt,
        "success" => true,
        "credit" => "@BRONX_ULTRA"
    ];
    $data["status"] = "success";
    
    echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

// If all retries failed
echo json_encode([
    "status" => "error",
    "message" => "All retries failed. Last error: $lastError",
    "_proxy" => [
        "proxy_used" => "none",
        "device" => "none",
        "pool_size" => count($workingProxies),
        "retries" => $maxRetries,
        "success" => false,
        "credit" => "@BRONX_ULTRA"
    ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
