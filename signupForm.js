var s="studentFields";
var t="teacherFields";
var h="hubFields";
var arr1=document.getElementsByClassName(s);
var arr2=document.getElementsByClassName(t);
var arr3=document.getElementsByClassName(h);
for(let i=0;i<arr2.length;i++){
    arr2[i].classList.add('hideBlocks');
}
for(let i=0;i<arr3.length;i++){
    arr3[i].classList.add('hideBlocks');
}

function formType(){
    var x=document.getElementById('dropdownForm');
    console.log(x.value);
    if(x.value==s){
        for(let i=0;i<arr1.length;i++){
            if(arr1[i].classList.contains('hideBlocks')==true)
                arr1[i].classList.remove('hideBlocks');
        }
        for(let i=0;i<arr2.length;i++){
            if(arr2[i].classList.contains('hideBlocks')==false)
                arr2[i].classList.add('hideBlocks');
        }
        for(let i=0;i<arr3.length;i++){
            if(arr3[i].classList.contains('hideBlocks')==false)
                arr3[i].classList.add('hideBlocks');
        }
    }
    else if(x.value==t){
        for(let i=0;i<arr2.length;i++){
            if(arr2[i].classList.contains('hideBlocks')==true)
                arr2[i].classList.remove('hideBlocks');
        }
        for(let i=0;i<arr1.length;i++){
            if(arr1[i].classList.contains('hideBlocks')==false)
                arr1[i].classList.add('hideBlocks');
        }
        for(let i=0;i<arr3.length;i++){
            if(arr3[i].classList.contains('hideBlocks')==false)
                arr3[i].classList.add('hideBlocks');
        }
    }
    else{
        for(let i=0;i<arr3.length;i++){
            if(arr3[i].classList.contains('hideBlocks')==true)
                arr3[i].classList.remove('hideBlocks');
        }
        for(let i=0;i<arr2.length;i++){
            if(arr2[i].classList.contains('hideBlocks')==false)
                arr2[i].classList.add('hideBlocks');
        }
        for(let i=0;i<arr1.length;i++){
            if(arr1[i].classList.contains('hideBlocks')==false)
                arr1[i].classList.add('hideBlocks');
        }
    }
}