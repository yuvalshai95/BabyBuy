

let fileInput = document.getElementById("image");
let imageContainer = document.getElementById("images");


function displayImage() {
    imageContainer.innerHTML = "";

    for(i of fileInput.files){
        let reader = new FileReader();
        let figure = document.createElement("figure");
        figure.appendChild(figCap);
        reader.onload=()=>{
            let img = document.createElement("img");
            img.setAttribute("src",reader.result);
        }
        imageContainer.appendChild(figure);
        reader.readAsDataURL(i);
    }





}