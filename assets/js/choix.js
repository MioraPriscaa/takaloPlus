window.onload = () => {
    // achat
    const modes = document.querySelectorAll('.modes .mode');
    const btnAchat = document.querySelector('.acheter');
    modes.forEach(mode => {
        mode.addEventListener('click', () => {
            checkMode();
        });
    });

    function checkMode() {
        modes.forEach(mode => {
            if (mode.checked) {
                btnAchat.removeAttribute('disabled');
                btnAchat.classList.add("enable");
                return;
            }
        });
    }

    // Echange
    const mesobjets = document.querySelectorAll('.mesobjets .mesobjet');
    const btnEchange = document.querySelector('.echanger');
    mesobjets.forEach(mesobjet => {
        mesobjet.addEventListener('click', () => {
            checkMesObjets();
        });
    });

    function checkMesObjets() {
        let enable = false;
        mesobjets.forEach(mesobjet => {

            if (mesobjet.checked) {

                enable = true;
            }
        });
        if (enable) {
            btnEchange.removeAttribute('disabled');
            btnEchange.classList.add("enable");
        }
        else {
            console.log("tsisy");
            btnEchange.setAttribute('disabled', 'true');
            btnEchange.classList.remove("enable");
        }

    }

};