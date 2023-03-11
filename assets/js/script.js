window.onload = () => {
    let menu = document.querySelector('.header .list-menu');
    document.querySelector('.header .info').onclick = () => {
        menu.classList.toggle('active');
        console.log("dfv");
    }
}
