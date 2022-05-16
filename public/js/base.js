// Langues 
let lang = document.querySelector(".language")
let btnLang = document.querySelector(".btnLang")
let langueSelect = document.querySelector(".languageSelect")

console.log("yo");
console.log(lang);
console.log(langueSelect);

console.log(window.scrollY);


lang.addEventListener('mouseenter', e => {
    btnLang.style.visibility = "hidden"
    langueSelect.style.display = "flex"
    console.log("in");
 })
 lang.addEventListener('mouseleave', e => {
    btnLang.style.visibility = "inherit"
    langueSelect.style.display = "none"     
    console.log("out");
 })


// menu scroll 
const menu = document.querySelector(".menuMain")
function checkScroll() {
   if (window.scrollY > 99) {
      // menu.style.position = "fixed"
   } else {
      // menu.style.position = "inherit"
   }
}
// checkScroll();
window.addEventListener('scroll', (event) => {
   checkScroll();
});