var elements = document.querySelectorAll("button, .pagination a");

elements.forEach(function(element) {
    var excludedClasses = ["btn btn-danger", "pagination", "page-item"];
    
    var shouldExclude = excludedClasses.some(function(className) {
        return element.classList.contains(className);
    }) || element.closest('.pagination') !== null;

    if (!shouldExclude) {
        element.addEventListener("click", whatever);
    } else {
        console.log("Excluded button or link: ", element.className || element.href);
    }
});

function whatever(event) {
    event.preventDefault();
    swal("Se incarca pagina...");
}

swal("Bine ai venit pe pagina!");





