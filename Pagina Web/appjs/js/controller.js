document.getElementById("formulario").addEventListener("submit", function(evento) {
    // Recuperamos el valor de los elementos
    const nombre = document.getElementById("nombre").value.trim();
    const apellido = document.getElementById("apellido").value.trim();
    const edad = document.getElementById("edad").value;
    const email = document.getElementById("email").value.trim();
    const usuario = document.getElementById("usuario").value.trim();
    const contrasena = document.getElementById("contrasena").value.trim();
    
    // Aquí se hacen las validaciones
    
    // Si pasa las validaciones
    // Creamos una nueva persona
    const persona = new Persona(nombre, apellido, edad, email, usuario, contrasena);
    
    // Agregamos la persona a la tabla
    agregarPersonaATabla(persona);
    
    // Simulamos el envío al servidor
    envioOk(evento); 
    
    // Limpiamos el campo de contraseña
    document.getElementById("contrasena").value = "";
});

function envioOk(evento) {
    evento.preventDefault();
    const formulario = document.getElementById("formulario");
    formulario.nombre.value = "";
    formulario.apellido.value = "";
    formulario.email.value = "";
    formulario.edad.value = "";
    formulario.usuario.value = "";
}

//funcion para agregar persona
function agregarPersonaATabla(persona) {
    const tablaPersonas = document.getElementById("tablaPersonas");
    const fila = document.createElement("tr");
    fila.innerHTML = `
    <td>${persona.nombre}</td> 
    <td>${persona.apellido}</td> 
    <td>${persona.edad}</td>
    <td>${persona.email}</td>
    <td>${persona.usuario}</td>
    <td>${persona.contraseña}</td>
    `;
    tablaPersonas.appendChild(fila);
}
