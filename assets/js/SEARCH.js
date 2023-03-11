
// recherche objets
function load_data(query) {
    $('#search').submit(function (e) {
    e.preventDefault();
    $('.shop').empty();
    let formdata = new FormData(this);
    let query = formdata.get('query');
    $.ajax({
        type: "post",
        url: $(this).attr('action'),
        data: { query: query },
        success: function (data) {
            configCard(data);

        },
        error: function (response) {
            // alert("erreur");

        }
    });
    });
}
// $('.search-text').keyup(function (e) {
//     e.preventDefault();
//     let query = $(this).val();
//     load_data(query);

// });
load_data();
