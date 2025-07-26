<!Doctype HTML>
<html>
<head>
<link rel="icon" href="logo.jpg" />
<link rel="stylesheet" href="back.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Information Systems | School</title>
<link rel="stylesheet" href="everyfont.css" />
</head>
<style>
@viewport {
zoom: 1.0;
width: extend-to-zoom;
}

@-ms-viewport {
width: extend-to-zoom;
zoom: 1.0;
}

.showmap-btn {
font-size: 20px;
background-color: #343434;
color: rgba(255, 255, 255, .5);
border: 1.2px solid rgba(255, 255, 255, .5);
transition: .2s;
}

.showmap {
position: absolute;
top: 100px;
}

.showpics {
position: absolute;
top: 1000px;
}

.showmap-btn:hover {
border: 1.2px solid yellow;
color: white;
background-color: #565656;
cursor: pointer;
}

.mapsection {
opacity: 0;
}
</style>
<body bgcolor="#121212" />
<button id="back-btn" onclick="location='index.php'">Back</button>
<br>
<br>
<br>
<br>
<section class="mapsection">
<iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.049563748262!2d120.3533624138783!3d16.010935188916974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339142c588dfe795%3A0x4f70c1da21cced1d!2sCALASIAO%20COMPREHENSIVE%20NATIONAL%20HIGH%20SCHOOL!5e0!3m2!1sen!2sph!4v1582002147831!5m2!1sen!2sph" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</section>
<button class="showmap-btn showmap">Map</button>
<br>
<br>
<button class="showmap-btn showpics">Pictures</button>
</body>
<script>

document.querySelector(".showpics").addEventListener("click", function() {
window.location = "pictures.php";
})
map = document.querySelector("#map");
mapsec = document.querySelector(".mapsection");
showmap = document.querySelector(".showmap");
widthtouse = 0;
heighttouse = 0;
setwah = 0;
showthemap = 0;

animatemap();

function animatemap() {
requestAnimationFrame(animatemap);
map.style.position = "absolute";
map.style.top = heighttouse / 8 + "px";
map.style.left = widthtouse / 3.2 + "px";
map.style.right = widthtouse / 3.2 + "px";
map.style.width = heighttouse / 1.2 + "px";
map.style.height = heighttouse / 1.2 + "px";
setwandh(setwah);

function setwandh(val) {
if (val == 1) {
widthtouse = innerWidth;
heighttouse = innerHeight;
}
}

everything = document.querySelectorAll("*");

if (showthemap == 0) {
everything.forEach(element => {
element.style.opacity = "1";
})
mapsec.style.opacity = "0";
map.style.opacity = "0";
setwah = 0;
showmap.textContent = "Show Map";
} else if (showthemap == 1) {
everything.forEach(element => {
element.style.opacity = ".8";
})
mapsec.style.opacity = "1";
map.style.opacity = "1";
setwah = 1;
showmap.textContent = "Hide Map";
} else {
showthemap = 0;
}
}

showmap.addEventListener("click", function() {
showthemap++
})

</script>
</html>