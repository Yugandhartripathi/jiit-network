var x=document.getElementById('profilePicLink');
var y=document.getElementById('submitPic');
var w=document.getElementById('bioContHide');
var z=document.getElementById('submitBioHide');
x.style.display="none";
y.style.display="none";
w.style.display="none";
z.style.display="none";
function imgUpdateReveal(){
    if(x.style.display=="none"){
        x.style.display="block";
    }
    else{
        x.style.display="none";
    }
    if(y.style.display=="none"){
        y.style.display="block";
    }
    else{
        y.style.display="none";
    }
}
function bioUpdateReveal(){
    if(w.style.display=="none"){
        w.style.display="block";
    }
    else{
        w.style.display="none";
    }
    if(z.style.display=="none"){
        z.style.display="block";
    }
    else{
        z.style.display="none";
    }
}