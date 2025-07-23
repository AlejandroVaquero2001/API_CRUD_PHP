const API = '../crud_functions/';

function cargarRestaurantes() {
  fetch(API + 'read.php')
    .then(res => res.json())
    .then(data => {
      const tabla = document.getElementById('tabla');
      tabla.innerHTML = '';
      data.forEach(r => {
        tabla.innerHTML += `
          <tr>
            <td>${r.id}</td>
            <td>${r.nombre}</td>
            <td>${r.direccion}</td>
            <td>${r.telefono}</td>
            <td>
              <button onclick="editarRestaurante(${r.id}, '${r.nombre}', '${r.direccion}', '${r.telefono}')">Editar</button>
              <button onclick="eliminarRestaurante(${r.id})">Eliminar</button>
            </td>
          </tr>`;
      });
    });
}

function crearRestaurante() {
  const id = document.getElementById('id').value;
  const nombre = document.getElementById('nombre').value;
  const direccion = document.getElementById('direccion').value;
  const telefono = document.getElementById('telefono').value;

  const formData = new FormData();
  formData.append('nombre', nombre);
  formData.append('direccion', direccion);
  formData.append('telefono', telefono);

  if (id) {
    // Actualizar
    formData.append('id', id);
    fetch(API + 'update.php', {
      method: 'POST',
      body: formData
    })
    .then(res => res.json())
    .then(() => {
      cargarRestaurantes();
      resetForm();
    });
  } else {
    // Crear
    fetch(API + 'create.php', {
      method: 'POST',
      body: formData
    })
    .then(res => res.json())
    .then(() => {
      cargarRestaurantes();
      resetForm();
    });
  }
}

function editarRestaurante(id, nombre, direccion, telefono) {
  document.getElementById('id').value = id;
  document.getElementById('nombre').value = nombre;
  document.getElementById('direccion').value = direccion;
  document.getElementById('telefono').value = telefono;

  document.getElementById('submitBtn').textContent = 'Actualizar';
  document.getElementById('cancelBtn').style.display = 'inline';
}

function cancelarEdicion() {
  resetForm();
}

function resetForm() {
  document.getElementById('id').value = '';
  document.getElementById('nombre').value = '';
  document.getElementById('direccion').value = '';
  document.getElementById('telefono').value = '';
  document.getElementById('submitBtn').textContent = 'Agregar';
  document.getElementById('cancelBtn').style.display = 'none';
}

function eliminarRestaurante(id) {
  if (!confirm('¿Seguro que querés eliminar este restaurante?')) return;

  const formData = new FormData();
  formData.append('id', id);

  fetch(API + 'delete.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(() => cargarRestaurantes());
}

cargarRestaurantes();