const nota = document.querySelector(".nota");
const estrelas = document.querySelectorAll(".estrelaReview");

nota.addEventListener("input",()=> {
    estrelas.forEach((estrela,i)=> {
        if(i >= parseInt(nota.value)) {
            if(estrela.classList.contains("ifill")) {
                estrela.classList.remove("ifill");
            }
        }else {
            if(!estrela.classList.contains("ifill")) {
                estrela.classList.add("ifill");
            }
        }
    });
});