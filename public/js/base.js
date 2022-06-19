// Langues 
let lang = document.querySelector(".language")
let btnLang = document.querySelector(".btnLang")
let langueSelect = document.querySelector(".languageSelect")


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

 function showLang() {
  btnLang.style.visibility = "hidden"
  langueSelect.style.display = "flex"
}
lang.addEventListener('touchstart', showLang)

// Return top 
const goBackBtn = document.querySelector("#goTop")
goBackBtn.addEventListener('click', (e) => {
    goTop()
}) 
function goTop() {
    window.scrollTo({top: 0, behavior: 'smooth'});
    goBackBtn.style.animation = "popOff 1s ease-in forwards"
}
window.onscroll = function() {
    checkScroll()
};
function checkScroll() {
  if (document.body.scrollTop > 350 || document.documentElement.scrollTop > 350) {
    goBackBtn.style.display = "inline-grid"
    goBackBtn.style.animation = "popOn 1s ease-in forwards"
  } else if (document.body.scrollTop < 350 || document.documentElement.scrollTop < 350) {
    goBackBtn.style.animation = "popOff 1s ease-in forwards"
  }
}