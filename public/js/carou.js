let slider = tns ({
    container : ".my-slider",
    "slideby" : 4,
    "speed" : 400,
    "nav" : false,
    controlsContainer : "#controls",
    prevButton : ".previous",
    nextButton : ".next",
    responsive : {
        1600: {
            items : 4,
            gutter: 20
        },
        1080 : {
            items : 3,
            gutter: 20
        },
        776 : {
            items : 2
        }
    }
})