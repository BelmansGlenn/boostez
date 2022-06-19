const btnTb = document.querySelector(".btnTb")
const imgTb = document.querySelector(".imgTb")

btnTb.addEventListener("click", function() {
    imgTb.scrollIntoView({behavior: "smooth", block: "start"});
})



let number = 3 

number++ 

console.log(number);