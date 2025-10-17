document.addEventListener("DOMContentLoaded", () => {

    fetch("../../Negocio/tareas/consultarTarea.php")
        .then(response => response.json())
        .then(data => {
            let tareas = data;
            tareas.forEach(tarea => {
                crearTabla(tarea);
            });
        })
        .catch(error => console.error("Error:", error));
});

function crearTabla(tarea) {
    
    const main = document.querySelector("main");

    const tabla = document.createElement("table");
    tabla.border = "1";
    tabla.style.marginBottom = "20px";
    tabla.style.borderCollapse = "collapse";
    tabla.style.width = "100%";

    const filaEncabezado = document.createElement("tr");
    ["Título", "Realizada", "Fecha inicio", "Duración estimada"].forEach(texto => {
        const th = document.createElement("th");
        th.textContent = texto;
        th.style.padding = "8px";
        th.style.backgroundColor = "#f2f2f2";
        filaEncabezado.appendChild(th);
    });
    tabla.appendChild(filaEncabezado);

    const filaDatos = document.createElement("tr");

    const tdTitulo = document.createElement("td");
    tdTitulo.textContent = tarea.titulo || "";
    filaDatos.appendChild(tdTitulo);

    const tdRealizada = document.createElement("td");
    tdRealizada.textContent = tarea.realizada ? "Sí" : "No";
    filaDatos.appendChild(tdRealizada);

    const tdFechaInicio = document.createElement("td");
    tdFechaInicio.textContent = tarea.fecha_inicio || "";
    filaDatos.appendChild(tdFechaInicio);

    const tdDuracion = document.createElement("td");
    tdDuracion.textContent = tarea.duracion_estimada || "";
    filaDatos.appendChild(tdDuracion);

    tabla.appendChild(filaDatos);

    const filaDescTitulo = document.createElement("tr");
    const tdDescTitulo = document.createElement("td");
    tdDescTitulo.textContent = "Descripción:";
    tdDescTitulo.colSpan = 4;
    tdDescTitulo.style.fontWeight = "bold";
    tdDescTitulo.style.backgroundColor = "#f9f9f9";
    tdDescTitulo.style.paddingTop = "8px";
    filaDescTitulo.appendChild(tdDescTitulo);
    tabla.appendChild(filaDescTitulo);

    const filaDescTexto = document.createElement("tr");
    const tdDescTexto = document.createElement("td");
    tdDescTexto.textContent = tarea.descripcion || "";
    tdDescTexto.colSpan = 4;
    tdDescTexto.style.paddingBottom = "8px";
    filaDescTexto.appendChild(tdDescTexto);
    tabla.appendChild(filaDescTexto);

    main.appendChild(tabla);
}
