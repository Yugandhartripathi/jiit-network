var x=document.getElementById('commentForm');
var y=document.getElementsByName('toHide');
x.style.display="none";
for(let i=0;i<y.length;i++){
y[i].style.display="none";
}
function revealHideComments(){
    if(x.style.display=="none"){
        x.style.display="block";
    }
    else{
        x.style.display="none";
    }
    for(let i=0;i<y.length;i++){
        if(y[i].style.display=="none"){
            y[i].style.display="block";
        }
        else{
            y[i].style.display="none";
        }
    }
}