

let fileInput = document.getElementById("image");
let imageContainer = document.getElementById("images");


function displayImage() {
    imageContainer.innerHTML = "";
    let x = 0;
    for(i of fileInput.files){
         x++;
        let reader = new FileReader();
        let figure = document.createElement("figure");
        let figCap = document.createElement("figcaption");
        figCap.innerText = x;
        figure.appendChild(figCap);
        reader.onload=()=>{
            let img = document.createElement("img");
            img.setAttribute("src",reader.result);
            figure.insertBefore(img,figCap);
        }
        imageContainer.appendChild(figure);
        reader.readAsDataURL(i);
    }





}