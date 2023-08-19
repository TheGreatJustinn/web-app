<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
session_start();
//echo "Remote addr: " . $_SERVER['REMOTE_ADDR']. "<br/>";
//echo "X forward: " . $_SERVER['HTTP_X_FORWARDED_FOR'] . "<br/>";
//echo "Client IP: " . $_SERVER['HTTP_CLIENT_IP']. "<br/>";

function getIp() { //gets ip of client
	$ip = $_SERVER['REMOTE_ADDR'];
	
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
 return $ip;
}
$ip = getIp(); //stores ip in variable
//if statement to set ip since we are developing locally
if($ip === "::1" or $ip === "10.103.14.159" or $ip === "192.168.1.156" or $ip === "192.168.1.157") {
	$ip = "71.120.14.186"; //home
	//$ip = "52.128.15.255"; //Cali
	//$ip = "57.97.127.255"; //VA
	//$ip = "64.137.45.255"; //New York
	//$ip = "198.46.227.140"; //Texas
	//echo "IP Address is: ". $ip;
}else {
//echo "ip address is: " .$ip;
}
$ipapi = "http://ip-api.com/json/{$ip}?fields=2106110";
//echo "$ipapi";

$_SESSION['ipapi'] = $ipapi;
?>

<script> //script for alert message if form has been fully submitted properly

function data() {
var test = sessionStorage.getItem("Test");
//alert(test);
if (test === "t") {
	alert("Thank you for your entry! Hope to see you soon!");
} else if (test === "f") {
	alert("There was an error on insert, please call us at 301-765-4500. Thank you!");
} else {
	
}
//clear storage
sessionStorage.clear();
}
 
function showHint(str) {
	if (str.length == 0) {
		document.getElementById("txtHint").innerHTML = "";
		return;
	} else {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("txtHint").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "city.php?q=" + str, true);
		xmlhttp.send();
	}
}

</script>
    
<script>
var ipapi = <?php echo json_encode($_SESSION['ipapi']) ?>;
let lat, lon;
fetch(ipapi)
	.then(response => response.json())
	.then(data => {
		const ip_address = data.query;
        const city = data.city;
        const state = data.region;
        const zip_code = data.zip;
        const continent_code = data.continentCode;
        const isp = data.isp;
		lat = parseFloat(data.lat);
		lon = parseFloat(data.lon);
		
		
		//console.log('Latitude:', lat); //  Check lat
		//console.log('Longitude:', lon); // Check  lon
		
		initMap(); //call google map api
		
		
		$.ajax({
			type: 'POST',
			url: '../ipsaver.php',
			data: {
				ip_address: ip_address,
            	city: city,
            	state: state,
            	zip_code: zip_code,
            	continent_code: continent_code,
            	isp: isp
          	},
		  	success: function(response) {
			  	console.log('Data saved successfully:', response);
		  	},
		  	error: function(error) {
			  	console.log('Error saving data:', error);
		  	}
		}); 
	})
	.catch(error => {
        console.error('Error fetching data:', error);
    });

// Google Maps API
((g) => {
    var h, a, k, p = "The Google Maps JavaScript API",
        c = "google",
        l = "importLibrary",
        q = "__ib__",
        m = document,
        b = window;
    b = b[c] || (b[c] = {});
    var d = b.maps || (b.maps = {}),
        r = new Set,
        e = new URLSearchParams,
        u = () => h || (h = new Promise(async (f, n) => {
            await (a = m.createElement("script"));
            e.set("libraries", [...r] + "");
            for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
            e.set("callback", c + ".maps." + q);
            a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
            d[q] = f;
            a.onerror = () => h = n(Error(p + " could not load."));
            a.nonce = m.querySelector("script[nonce]")?.nonce || "";
            m.head.append(a);
        }));
    d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n));
})({
    key: "AIzaSyBkDiQbQmqmeqIUUqNzIuVNUwc_Dg20y08",
    v: "weekly",
    // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
    // Add other bootstrap parameters as needed, using camel case.
});

let map;

async function initMap() {
// 	//check if lat and lon are finite numbers
// 	if(!Number.isFinite(lat) || !Number.isFinite(lon)) {
// 		console.error('Invalid latitude or longitude:', lat, lon);
//     return;
//   }
 
 
  // The location of IP. change number with "lat" and "lon" for ip location
  const position = { lat: 38.9801, lng: -76.7425 };
  //console.log('Position:', position);

  // Request needed libraries.
  //@ts-ignore
  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

  // The map, centered at IP address
  map = new Map(document.getElementById("map"), {
    zoom: 10,
    center: position,
    mapId: "DEMO_MAP_ID",
  });

  // The marker, positioned at IP address
  const marker = new AdvancedMarkerElement({
    map: map,
    position: position,
    title: "Location of IP",
  });
}
</script>

<?php session_destroy(); session_unset(); ?>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
    <div class="w3-container">
      <h3 class="w3-padding-64"><b>On Demand<br>Service</b></h3>
    </div>
    <div class="w3-bar-block">
      <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
      <a href="#showcase" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Showcase</a> 
      <a href="#services" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Services</a> 
      <a href="#About" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">About</a>  
      <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Contact</a>
      <a href="https://www.google.com/maps/place/On+demand+Service/@38.9942939,-76.738281,15z/data=!4m18!1m9!3m8!1s0x89b7e94a15e91681:0x9441faaa1d0744cd!2sOn+demand+Service!8m2!3d38.9942939!4d-76.738281!9m1!1b1!16s%2Fg%2F1ptxkxmtj!3m7!1s0x89b7e94a15e91681:0x9441faaa1d0744cd!8m2!3d38.9942939!4d-76.738281!9m1!1b1!16s%2Fg%2F1ptxkxmtj?entry=ttu"
       onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Reviews</a>
    </div>
  </nav>
  
  <!-- Top menu on small screens -->
  <header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
    <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
    <span>On Demand Service</span>
  </header>
  
  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
  
<!-- Body -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

    <!-- Header -->
    <div class="w3-container" style="margin-top:80px" id="showcase">
      <h1 class="w3-jumbo"><b>On Demand Service</b></h1>
      <h1 class="w3-xxxlarge w3-text-red"><b>Showcase.</b></h1>
      <hr style="width:50px;border:5px solid red" class="w3-round">
    </div>
    

  <script>
    // Script to open and close sidebar
    function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
      document.getElementById("myOverlay").style.display = "block";
    }
     
    function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
      document.getElementById("myOverlay").style.display = "none";
    }
    
    // Modal Image Gallery
    function onClick(element) {
      document.getElementById("img01").src = element.src;
      document.getElementById("modal01").style.display = "block";
      var captionText = document.getElementById("caption");
      captionText.innerHTML = element.alt;
    }
    
    </script>