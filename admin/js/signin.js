const form = document.querySelector(".signinpopup form");
signinBtn = form.querySelector('#signin-btn');
errorText = form.querySelector('.error-text');

form.onsubmit = (e)=>{
    e.preventDefault();
};

signinBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "signin.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "ok"){
                    alert("Successfully added.");
                }
                else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
};