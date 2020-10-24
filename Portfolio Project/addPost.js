document.getElementById("postForm").addEventListener("click",validateForm);

function validateForm(event){
    let title=document.getElementById("inputTitle").value;
    let maintext=document.getElementById("inputMainText").value;
    
    if (title==""||maintext==""){
        
        let title=document.getElementById("inputTitle");
        let maintext=document.getElementById("inputMainText");

        title.style.backgroundColor="hotpink";
        maintext.style.backgroundColor="hotpink";

        event.preventDefault();
    }
    

}


function clearFunction(){

    let confirmation=window.confirm("Are you sure you would like to clear?");

    if(confirmation==true){
        document.getElementById("inputTitle").value="";
        
        document.getElementById("inputMainText").value="";

        let title=document.getElementById("inputTitle");
        let maintext=document.getElementById("inputMainText");

        title.style.backgroundColor="white";
        maintext.style.backgroundColor="white";
        
    }
}





