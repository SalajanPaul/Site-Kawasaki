var elements = document.querySelectorAll("button");
elements.forEach(function(element) {

    var excludedClasses = ["btn-outline-danger", "allow-button"]

    var shouldExclude = excludedClasses.some(function(className) {
        return element.classList.contains(className);
    });

    if (!shouldExclude) {
        element.addEventListener("click", whatever);
    }
});

function whatever() {
    swal("Se incarca pagina..");
}

swal("Bine ai venit pe pagina!");