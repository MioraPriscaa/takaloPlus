const body = document.querySelector('.home'),
    objets = document.querySelector('.objets'),
    sidebar = body.querySelector('nav'),
    toggle = body.querySelector(".toggle"),
    searchBtn = body.querySelector(".search-box"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");


toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    // let priceInput = sidebar.querySelector(".price-input");
    // let slider = sidebar.querySelector(".slider");
    // let rangeinput = sidebar.querySelector(".range-input");
    // priceInput.classList.toggle("open");
    // slider.classList.toggle("open");
    // rangeinput.classList.toggle("open");
})

searchBtn.addEventListener("click", () => {
    sidebar.classList.remove("close");

})

modeSwitch.addEventListener("click", () => {

    body.classList.toggle("dark");

    if (body.classList.contains("dark")) {
        modeText.innerText = "Light mode";
    } else {
        modeText.innerText = "Dark mode";

    }
});