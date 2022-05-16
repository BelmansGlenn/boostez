const btnTb = document.querySelector(".btnTb")
const imgTb = document.querySelector(".imgTb")

btnTb.addEventListener("click", function() {
    imgTb.scrollIntoView({behavior: "smooth", block: "start"});
})