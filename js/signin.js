const signinform = document.querySelector(".Signin form");
signinBtn = signinform.querySelector('#signin');
errorText = signinform.querySelector('.error-text');

signinform.onsubmit = (e)=>{
    e.preventDefault();
};

signinBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "signin.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "Success"){
                    location.href= "./available_cars.php";
                }
                else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(signinform);
    xhr.send(formData);
};
