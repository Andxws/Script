class Persona {
    constructor(nombre, apellido, edad, email, usuario, contrasena) {
        this.nombre = nombre;
        this.apellido = apellido;
        this.edad = edad;
        this.email = email;
        this.usuario = usuario;
        this.contrasena = contrasena;
    }

    toString() {
        return `<tr>
                    <td>${this.nombre}</td>
                    <td>${this.apellido}</td>
                    <td>${this.edad}</td>
                    <td>${this.email}</td>
                    <td>${this.usuario}</td>
                    <td>********</td>
                    <td><button class="editar">Editar</button></td>
                    <td><button class="eliminar">Eliminar</button></td>
                </tr>`;
    }
}
