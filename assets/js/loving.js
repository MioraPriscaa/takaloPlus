function aimer() {
    let hearts = document.querySelectorAll('.heart');
    hearts.forEach(heart => {
        heart.addEventListener('click', () => {
            let id = heart.dataset.idobjet;
            if (heart.classList.contains('far')) {
                heart.classList.replace('far', 'fas');
                heart.classList.add('love');
                like(id);
                // heart.parentElement.classList.add('love');
            }
            else {
                heart.classList.replace('fas', 'far');
                heart.classList.remove('love');
                dislike(id);
                // heart.parentElement.classList.remove('love');
            }
            return false;
        });
    });

    function like(idObjet) {
        $.ajax({
            type: "post",
            url: "http://localhost/CodeIgniterProjects/TAKALOTEMP/Home/like",
            data: { idObjet: idObjet },
        });
    }

    function dislike(idObjet) {
        $.ajax({
            type: "post",
            url: "http://localhost/CodeIgniterProjects/TAKALOTEMP/Home/dislike",
            data: { idObjet: idObjet },
        });
    }
}


aimer();



