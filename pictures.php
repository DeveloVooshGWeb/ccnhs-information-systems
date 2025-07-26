<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="back.css" />
<link rel="stylesheet" href="everyfont.css" />
<link rel="icon" href="logo.jpg" />
<title>Information Systems | School Pictures</title>
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

#mousesection, #mousesection2 {
height: 450px;
width: 100%;
position: absolute;
display: block;
overflow: hidden;
left: 0%;
}

#mousesection2 {
background-color: #343434;
}

* {
color: white;
margin: 0px;
}

slider {
position: absolute;
width: 100%;
height: 100%;
background-color: transparent;
background-size: cover;
background-position: center;
overflow: hidden;
display: block;
}

img {
position: absolute;
width: 725px;
height: 450px;
overflow: hidden;
display: block;
animation-play-state: running;
left: 200%;
}

body {
background-color: #121212;
}

@keyframes slide {
from {
left: 110%;
}
to {
left: -110%;
}
}

html {
cursor: context-menu;
}

#mousesection {
cursor: crosshair;
}
</style>
<body>
<div id="mousesection2">
</div>
<slider>
<?php
$directory = "Pics/";
$i = 0;
if (is_dir($directory)) {
$pics = opendir($directory);
if ($pics) {
while($picfiles = readdir($pics)) {
if ($picfiles != "." && $picfiles != "..") {
$i++;
echo "<img src='". $directory ."". $picfiles ."' class='". $i ." jpg'/>";
}
}
}
}
?>
</slider>
<div id="mousesection">
</div>
<button id="back-btn" onclick="location='school.php'">Back</button>
</body>
<script>
mousesec = document.querySelector("#mousesection");
mousesec2 = document.querySelector("#mousesection2");
iteration = <?php echo $i ?>;
output = "";
for (i = iteration; i > 0; i--) {
output += document.querySelector("img:nth-child(" + i + ")").outerHTML;
}
document.querySelector("slider").innerHTML = output;
allImg = document.querySelectorAll("img");

update();

function update() {
requestAnimationFrame(update);
allImg.forEach(image => {
image.style.top = innerHeight / 2 - 450 / 2 + "px";
})
mousesec.style.position = "absolute";
mousesec.style.top = innerHeight / 2 - 450 / 2 + "px";
mousesec2.style.position = "absolute";
mousesec2.style.top = innerHeight / 2 - 450 / 2 + "px";
}

mousesec.addEventListener("mouseover", function() {
allImg.forEach(img => {
img.style.animationPlayState = "paused";
})
})

mousesec.addEventListener("mouseout", function() {
allImg.forEach(img => {
img.style.animationPlayState = "running";
img.style.animation = "";
})

setTimeout(() => {
lesgo = "";
delay = 0;
for (i = iteration; i > 0; i--) {
document.querySelector("img:nth-child(" + i + ")").style.animation = "";
document.querySelector("img:nth-child(" + i + ")").style.animation = "slide " + duration + "s linear"
document.querySelector("img:nth-child(" + i + ")").style.animationDelay = delay + "s";
document.querySelector("img:nth-child(" + i + ")").style.animationPlayState = "running";
delay = delay + duration / 4.05;
lesgo = setInterval(() => {
for (i = iteration; i > 0; i--) {
document.querySelector("img:nth-child(" + i + ")").style.animation = "";
}
setTimeout(() => {
delay = 0;
for (i = iteration; i > 0; i--) {
document.querySelector("img:nth-child(" + i + ")").style.animation = "";
document.querySelector("img:nth-child(" + i + ")").style.animation = "slide " + duration + "s linear"
document.querySelector("img:nth-child(" + i + ")").style.animationDelay = delay + "s";
document.querySelector("img:nth-child(" + i + ")").style.animationPlayState = "running";
delay = delay + duration / 4.05;
}
}, 100)
}, (Math.round(finaldelay)) * 1000)
}
},  500)
})

delay = 0;
duration = 6;
finaldelay = (duration / 4.05) * iteration;

for (i = iteration; i > 0; i--) {
document.querySelector("img:nth-child(" + i + ")").style.animation = "slide " + duration + "s linear"
document.querySelector("img:nth-child(" + i + ")").style.animationDelay = delay + "s";
delay = delay + duration / 4.05;
}

lesgo = setInterval(() => {
for (i = iteration; i > 0; i--) {
document.querySelector("img:nth-child(" + i + ")").style.animation = "";
}
setTimeout(() => {
delay = 0;
for (i = iteration; i > 0; i--) {
document.querySelector("img:nth-child(" + i + ")").style.animation = "";
document.querySelector("img:nth-child(" + i + ")").style.animation = "slide " + duration + "s linear"
document.querySelector("img:nth-child(" + i + ")").style.animationDelay = delay + "s";
document.querySelector("img:nth-child(" + i + ")").style.animationPlayState = "running";
delay = delay + duration / 4.05;
}
}, 100)
}, (Math.round(finaldelay)) * 1000)
</script>
</html>