<?php
// ============================================
// 🚗 BRONX 91WHEELS PROXY V7 (ULTRA FAST)
// 21 Sources • 100% Proxy Usage • Auto-Retry
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

// ============ HOME PAGE (V7) ============
if ($rc === '') {
    header("Content-Type: text/html");
    ?>
<!DOCTYPE html>
<html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>🚗 BRONX RC PROXY V7</title>
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
<h1>🚗 BRONX RC PROXY V7</h1>
<p class="subtitle">⚡ ULTRA FAST • 21 SOURCES • 100% PROXY</p>
<div class="badges">
<span class="badge">🌐 21 Sources</span><span class="badge">⚡ Parallel</span>
<span class="badge">♾️ Unlimited</span><span class="badge">🔥 100% Proxy</span>
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
<footer>@BRONX_ULTRA • V7</footer>
</div>
<script>
var req=0,ok=0;
async function fetchRC(){
var n=document.getElementById('rcInput').value.trim();
if(!n){alert('Enter RC!');return}
var r=document.getElementById('result'),d=document.getElementById('data'),i=document.getElementById('info');
r.classList.add('show');d.style.color='#ffb400';d.textContent='⏳ Fetching with proxy...';
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
// 🔥 FETCH PROXIES FROM 21 SOURCES (PARALLEL)
// ============================================
function fetchLiveProxies() {
    $proxies = [];
    
    $urls = [
        // ===== APIs =====
        "https://api.proxyscrape.com/v2/?request=displayproxies&protocol=http&timeout=10000&country=all&ssl=all&anonymity=all",
        "https://api.proxyscrape.com/v4/free-proxy-list/get?request=displayproxies&protocol=http&timeout=10000",
        "https://api.proxyscrape.com/?request=displayproxies&proxytype=http",
        "https://www.proxy-list.download/api/v1/get?type=http",
        "http://pubproxy.com/api/proxy?limit=50000&format=txt&http=true",
        
        // ===== JSON APIs =====
        "https://api.proxifly.dev/proxy?protocol=http&limit=50",
        "https://api.getproxylist.com/proxy?protocol=http",
        
        // ===== GitHub Raw =====
        "https://raw.githubusercontent.com/TheSpeedX/SOCKS-List/master/http.txt",
        "https://raw.githubusercontent.com/ShiftyTR/Proxy-List/master/http.txt",
        "https://raw.githubusercontent.com/opsxcq/proxy-list/master/list.txt",
        "https://raw.githubusercontent.com/almighty-uncle/Proxy-List/main/HTTP.txt",
        "https://raw.githubusercontent.com/hookzof/socks5_list/master/proxy.txt",
        
        // ===== HTML Pages (will parse IP:Port) =====
        "https://free-proxy-list.net/",
        "https://www.sslproxies.org/",
        "https://www.us-proxy.org/",
        "https://www.socks-proxy.net/",
        "https://www.proxy-list.org/download.php?list=proxy",
        "https://spys.one/en/free-proxy-list/",
    ];
    
    // Parallel fetch using curl_multi
    $mh = curl_multi_init();
    $handles = [];
    $timeout = 3; // 3 seconds per source
    
    foreach ($urls as $index => $url) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => $timeout,
            CURLOPT_CONNECTTIMEOUT => 2,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36",
        ]);
        curl_multi_add_handle($mh, $ch);
        $handles[$index] = ['ch' => $ch, 'url' => $url];
    }
    
    $running = null;
    do {
        curl_multi_exec($mh, $running);
        curl_multi_select($mh);
    } while ($running > 0);
    
    foreach ($handles as $item) {
        $ch = $item['ch'];
        $response = curl_multi_getcontent($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($httpCode === 200 && $response) {
            // Check if HTML
            if (stripos($response, '<html') !== false || stripos($response, '<body') !== false) {
                preg_match_all('/\b(?:\d{1,3}\.){3}\d{1,3}:\d+\b/', $response, $matches);
                if (!empty($matches[0])) {
                    foreach ($matches[0] as $ip) {
                        $proxies[] = trim($ip);
                    }
                }
            } else {
                // Try JSON
                $json = json_decode($response, true);
                if ($json) {
                    if (isset($json['proxy'])) {
                        $proxies[] = $json['proxy'];
                    } elseif (isset($json['data']) && is_array($json['data'])) {
                        foreach ($json['data'] as $item) {
                            if (isset($item['ip']) && isset($item['port'])) {
                                $proxies[] = $item['ip'] . ':' . $item['port'];
                            }
                        }
                    } elseif (isset($json['proxies']) && is_array($json['proxies'])) {
                        foreach ($json['proxies'] as $p) {
                            if (is_string($p)) $proxies[] = $p;
                        }
                    }
                } else {
                    // Plain text lines
                    $lines = explode("\n", trim($response));
                    foreach ($lines as $line) {
                        $line = trim($line);
                        if (!empty($line) && strpos($line, ':') !== false) {
                            $proxies[] = $line;
                        }
                    }
                }
            }
        }
        curl_multi_remove_handle($mh, $ch);
        curl_close($ch);
    }
    curl_multi_close($mh);
    
    // Validate and deduplicate
    $proxies = array_unique($proxies);
    $filtered = [];
    foreach ($proxies as $p) {
        if (preg_match('/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}:\d+$/', $p)) {
            $filtered[] = $p;
        }
    }
    return array_values($filtered);
}

// ============================================
// 🔥 PARALLEL PROXY TESTING (FAST)
// ============================================
function testProxiesParallel($proxies, $maxToTest = 30, $timeout = 4) {
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
    foreach ($handles as $item) {
        $ch = $item['ch'];
        $response = curl_multi_getcontent($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($httpCode === 200 && $response && strlen($response) > 50) {
            $data = json_decode($response, true);
            if ($data !== null) {
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
// 🔥 CACHED PROXY POOL
// ============================================
function getWorkingProxies() {
    $cacheFile = __DIR__ . '/working_proxies.cache';
    $cacheTTL = 45; // seconds – balance between freshness and speed
    
    if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheTTL)) {
        $cached = @json_decode(file_get_contents($cacheFile), true);
        if (is_array($cached) && count($cached) >= 2) {
            return $cached;
        }
    }
    
    $allProxies = fetchLiveProxies();
    if (empty($allProxies)) {
        return [];
    }
    
    $working = testProxiesParallel($allProxies, 30, 4);
    if (count($working) > 0) {
        file_put_contents($cacheFile, json_encode($working));
    }
    return $working;
}

// ============================================
// 🔥 MAIN LOGIC – 100% PROXY, AUTO-RETRY
// ============================================

$workingProxies = getWorkingProxies();
$maxRetries = 3;
$attempt = 0;
$response = null;
$usedProxy = false;
$selectedProxy = null;
$lastError = '';

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
    
    // Always use a proxy if available
    if (count($workingProxies) > 0) {
        $selectedProxy = $workingProxies[array_rand($workingProxies)];
        $usedProxy = true;
    } else {
        // No proxy found – fallback to direct (rare)
        $selectedProxy = null;
        $usedProxy = false;
    }
    
    $device = $devices[array_rand($devices)];
    $deviceName = $device[0];
    $userAgent = $device[1];
    
    $sessionId = bin2hex(random_bytes(4)) . '-' . dechex(time() + $attempt);
    $payload = json_encode(["regNo" => $rc, "sessionid" => $sessionId]);
    $url = "https://api1.91wheels.com/api/v1/third/rc-detail";
    
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_TIMEOUT => 8, // faster
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
    curl_close($ch);
    
    // If proxy failed and we have other proxies, retry without removing from pool (let another request pick different)
    if ($error || $httpCode !== 200) {
        $lastError = $error ?: "HTTP $httpCode";
        // Remove this proxy from pool to avoid using it again immediately
        if ($selectedProxy && ($key = array_search($selectedProxy, $workingProxies)) !== false) {
            unset($workingProxies[$key]);
            $workingProxies = array_values($workingProxies);
        }
        continue;
    }
    
    $data = json_decode($response, true);
    if (!$data) {
        $lastError = "Invalid JSON";
        continue;
    }
    
    // Check limit
    if (isset($data['message']) && stripos($data['message'], 'limit') !== false) {
        $lastError = "Limit hit, retrying...";
        if ($selectedProxy && ($key = array_search($selectedProxy, $workingProxies)) !== false) {
            unset($workingProxies[$key]);
            $workingProxies = array_values($workingProxies);
        }
        continue;
    }
    
    // Success!
    $data["_proxy"] = [
        "proxy_used" => $usedProxy ? $selectedProxy : "direct (no proxy available)",
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

// All retries failed
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
