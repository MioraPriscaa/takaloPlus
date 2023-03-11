window.onload = () => {

    $(".signuplink").click(function (e) {
        // $("login_form").toggle();
        $(".login").css("display", "none");
        $(".register").css("display", "grid");

        //  console.log("cicci")  
    });
    $(".loginlink").click(function (e) {
        
        $(".register").css("display", "none");
        $(".login").css("display", "grid");
        
        //  console.log("cicci")  
    });

}