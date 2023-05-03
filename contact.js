

const form = document.querySelector("form"),
spanTxt = form.querySelector(".send span");

form.onsubmit = (button)=>{
    button.preventDefault();
    spanTxt.style.display="block";
    spanTxt.style.color="#000070";

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "message.php", true);

    xhr.onload= () => {
        if (xhr.readyState ==4 && xhr.status == 200) {
            let response = xhr.response;
            if(response.indexOf("Email and message field is required!") != -1 || response.indexOf("Enter a valid email address!") || response.indexOf("Sorry, failed to send your message!")){
                spanTxt.style.color = "red";
            }
            else{
                form.reset();
                setTimeout(()=>{
                    spanTxt.style.display="none";
                }, 3000)
            }
            spanTxt.innerText = response;
        }

    

}
let formData = new FormData(form);
xhr.send(formData);
}