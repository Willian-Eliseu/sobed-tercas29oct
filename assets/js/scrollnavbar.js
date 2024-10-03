let myButton = document.getElementById('btn-toTop');
myButton.style.zIndex = 100;

window.onscroll = function(){
    scrollFunction();
}

function scrollFunction(){
    if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
        myButton.style.display = "block";
    }else{
        myButton.style.display = "none";
    }
}

myButton.addEventListener('click', backToTop);

function backToTop(){
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}