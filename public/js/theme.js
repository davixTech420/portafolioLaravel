const temaOscuro = () => {
    document.querySelector("body").setAttribute("data-bs-theme","dark");
    document.querySelector("body").setAttribute("class","bg-dark");
    document.querySelector("#dl-icon").setAttribute("class", "bi bi-brightness-high text-white");
    document.querySelector("#sec-welcome").setAttribute("class", "bg-dark py-5");
    document.querySelector("#menu").setAttribute("class","navbar navbar-expand-lg navbar-light py-3 bg-gray-900");
    document.querySelector("#footer").setAttribute("class","bg-dark py-4 mt-auto");
    
    document.querySelector('#btn-projects').setAttribute("class","btn btn-ounline-light btn-dark btn-lg px-5 py-3 fs-6 fw-bolder");
    

}

const temaClaro = () => {
    document.querySelector("body").setAttribute("data-bs-theme","light");
    document.querySelector("#dl-icon").setAttribute("class", "bi bi-moon-fill text-black");
    document.querySelector("body").setAttribute("class","bg-light");
    document.querySelector("#sec-welcome").setAttribute("class", "bg-light py-5");
    document.querySelector("#menu").setAttribute("class","navbar navbar-expand-lg navbar-light bg-white py-3 bg-light");
    document.querySelector("#footer").setAttribute("class","bg-white py-4 mt-auto");

    document.querySelector('#btn-projects').setAttribute("class","btn btn-outline-white btn-lg px-5 py-3 fs-6 fw-bolder");

}


const cambiarTema = () => {
    document.querySelector("body").getAttribute("data-bs-theme") === "light" ? temaOscuro() : temaClaro();
}