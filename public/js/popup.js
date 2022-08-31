var vote_popup = document.getElementById("vote-popup");

function votingPopup(){
    if(vote_popup.classList.contains("hidden")){
        vote_popup.classList.remove("hidden");
        vote_popup.classList.add("flex");
    }
    else{
        vote_popup.classList.add("hidden");
    }
}

let voteBtn = document.getElementById("vote-btn");
let vote_success_popup = document.getElementById("vote-success-popup");

voteBtn.onclick = function () {
    if(!vote_popup.classList.contains("hidden")) {
        vote_popup.classList.add("hidden");
        vote_success_popup.classList.remove("hidden");
        vote_success_popup.classList.add("flex");
    }
};

let must_login_popup = document.getElementById("must-login-popup");

let already_voted_popup = document.getElementById("already-login-popup");

let logout_popup = document.getElementById("logout-popup");

function closePopup(){
    if(!vote_popup.classList.contains("hidden")){
        vote_popup.classList.add("hidden");
    }
    else if(!vote_success_popup.classList.contains("hidden")){
        vote_success_popup.classList.add("hidden");
    }
    else if(!must_login_popup.classList.contains("hidden")){
        must_login_popup.classList.add("hidden");
    }
    else if(!already_voted_popup.classList.contains("hidden")){
        already_voted_popup.classList.add("hidden");
    }
    else if(!logout_popup.classList.contains("hidden")){
        logout_popup.classList.add("hidden");
    }
}
