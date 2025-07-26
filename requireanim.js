allrequired = document.querySelectorAll("required");
setInterval(() => {
allrequired.forEach(element => {
element.textContent = "*";
});
}, 1000)

setInterval(() => {
allrequired.forEach(element => {
element.textContent = "Required Field";
});
}, 2000);

allinputs = document.querySelectorAll("input");
check();

function check() {
requestAnimationFrame(check);
allinputs.forEach(element => {
if (element.value != "") {
eval(`document.querySelector("#${element.name}").textContent = ""`);
}
});
}