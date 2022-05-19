// const carou = document.querySelector(".ayraCarroussel")
const carouRight = document.querySelector(".carouRight")
const carouLeft = document.querySelector(".carouLeft")

const carou1 = document.querySelector(".carou1")
const carou2 = document.querySelector(".carou2")
const carou3 = document.querySelector(".carou3")

const imgCarou = document.querySelectorAll(".imgCarou")

// Insert first img 
let sizeCarou = imgCarou.length
let counter = 0
console.log(sizeCarou);

const lunchCarou = () => {
    // let counter = 0
    carou1.insertAdjacentHTML('afterbegin', imgCarou[counter].innerHTML)
    counter++
    carou2.insertAdjacentHTML('afterbegin', imgCarou[counter].innerHTML)
    counter++
    carou3.insertAdjacentHTML('afterbegin', imgCarou[counter].innerHTML)
}
lunchCarou()


carouLeft.addEventListener("click", (e) => {
    console.log("counter from left   -->" + counter);
    counter--
    if (counter >= 0){
        console.log("counter from left   -->" + counter);
         carou1.insertAdjacentHTML('afterbegin', imgCarou[counter].innerHTML)
    } else { 
        console.log("counter from left   -->" + counter);

        counter = sizeCarou
        carou1.insertAdjacentHTML('afterbegin', imgCarou[counter].innerHTML)
    }
    counter--
    if (counter >= 0){
        console.log("counter from left   -->" + counter);
        carou2.insertAdjacentHTML('afterbegin', imgCarou[counter].innerHTML)
    } else { 
        console.log("counter from left   -->" + counter);

       counter = sizeCarou
       carou2.insertAdjacentHTML('afterbegin', imgCarou[counter].innerHTML)
    }
    counter-- 
    if (counter >= 0){
        console.log("counter from left   -->" + counter);
        carou3.insertAdjacentHTML('afterbegin', imgCarou[counter].innerHTML)
    } else { 
        console.log("counter from left   -->" + counter);

       counter = sizeCarou
       carou3.insertAdjacentHTML('afterbegin', imgCarou[counter].innerHTML)
    }
})

carouRight.addEventListener("click", (e) => {
    console.log("counter from left   -->" + counter);
    counter++
    if (counter <= sizeCarou){
        console.log("counter from left   -->" + counter);

         carou1.insertAdjacentHTML('afterbegin', imgCarou[counter].innerHTML)
    } else { 
        console.log("counter from left   -->" + counter);
        carou1.insertAdjacentHTML('afterbegin', imgCarou[0].innerHTML)
    }
    counter++
    if (counter <= sizeCarou){
        console.log("counter from left   -->" + counter);

        carou2.insertAdjacentHTML('afterbegin', imgCarou[counter].innerHTML)
    } else { 
        console.log("counter from left   -->" + counter);
       carou2.insertAdjacentHTML('afterbegin', imgCarou[0].innerHTML)
    }
    counter++ 
    if (counter <= sizeCarou){
        console.log("counter from left   -->" + counter);
        carou3.insertAdjacentHTML('afterbegin', imgCarou[counter].innerHTML)
    } else { 
        console.log("counter from left   -->" + counter);
       carou3.insertAdjacentHTML('afterbegin', imgCarou[0].innerHTML)
    }
})






carouRight.addEventListener("click", (e) => {
    console.log("counter from right   -->" + counter);
    counter++
    carou1.insertAdjacentHTML('afterbegin', imgCarou[counter].innerHTML)
    counter++
    carou2.insertAdjacentHTML('afterbegin', imgCarou[counter].innerHTML)
    counter++
    carou3.insertAdjacentHTML('afterbegin', imgCarou[counter].innerHTML)
})
        

// function checkCounter(){
//     if (counter >= 0){
//         carou1.insertAdjacentHTML('afterbegin', imgCarou[counter].innerHTML)
//     } else { 
//             counter = sizeCarou
//             carou1.insertAdjacentHTML('afterbegin', imgCarou[counter].innerHTML)
//     }
// }
// console.log(imgCarou);
// console.log("img carou html 2    " + imgCarou[2].innerHTML);
// console.log("img carou html 4    " + imgCarou[4].innerHTML);
// console.log("img carouLengt  " + imgCarou.length);
// carou1.insertAdjacentHTML('afterbegin', imgCarou[2].innerHTML)
// Push data in html
const carou = document.querySelector(".caroussel")
// console.log(carou);






// imgCarou.forEach(e => {
//     console.log(e.innerHTML);
//     let books = []
//     let book = e.innerHTML
//     books.push(book)  
//     console.log(books);
// });






// console.log("HERE");
// console.log(imgArray[2]);
// imgArray.forEach(e => {
//     i = 0
//     carou.insertAdjacentHTML('afterbegin', imgArray[i])
//     i++
//     console.log(e);
//     console.log(imgArray[i]);
//     console.log(i);
// });










// let i = 1
// let imageBox = ["Cuteevil_logo_web.png", "homelarge.png", "eyes.png"]

// function homeCarou() {
//     carouRight.addEventListener('click', (el) => { 
//         carouClickRight()
//     })
//     carouLeft.addEventListener('click', (el) => { 
//         carouClickLeft()
//       })
// }
// homeCarou()

// function carouClickLeft() {
//     carouContent.innerHTML = `
//     <img class="imageBanner" src="/img/logos/${imageBox[i]}"></img>
//     `
//     i--;
//     if(i === -1) {
//     i = (imageBox.length - 1)
//     }
// }

// function carouClickRight() {
//     carouContent.innerHTML = `
//     <img class="imageBanner" src="/img/logos/${imageBox[i]}"></img>
//     `
//     i++;
//     if(i === imageBox.length) {
//     i = 0
//     }
// }

// setInterval(function(){ 
//     carouClickRight() 
// }, 5000);


