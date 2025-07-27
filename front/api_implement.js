const API = '../back/';

function cargarRestaurantes() {
  fetch(CONFIG.API_BASE + 'read.php', {
    headers: {
      'X-API-KEY': CONFIG.API_KEY
    }
  })
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
            <button onclick="editarRestaurante(${r.id}, '${r.nombre}', '${r.direccion}', '${r.telefono}')">
            <img src="res/edit_icon.png" alt="Editar" style="width:20px;height:20px;vertical-align:middle;border:none;background:none;" /></button>
            <button onclick="eliminarRestaurante(${r.id})">
            <img src="res/delete_icon.png" alt="Borrar" style="width:20px;height:20px;vertical-align:middle;border:none;background:none;" /></button>
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
    fetch(CONFIG.API_BASE + 'update.php', {
    method: 'POST',
    body: formData,
    headers: {
    'X-API-KEY': CONFIG.API_KEY
    }
  })
    .then(res => res.json())
    .then(() => {
      cargarRestaurantes();
      resetForm();
    });
  } else {
    // Crear
    fetch(CONFIG.API_BASE + 'create.php', {
      method: 'POST',
      body: formData,
      headers: {
        'X-API-KEY': CONFIG.API_KEY
      }
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
  if (!confirm('¿Seguro que quieres eliminar este restaurante?')) return;

  const formData = new FormData();
  formData.append('id', id);

  fetch(CONFIG.API_BASE + 'delete.php', {
  method: 'POST',
  body: formData,
  headers: {
    'X-API-KEY': CONFIG.API_KEY
  }
  })  
  .then(res => res.json())
  .then(() => cargarRestaurantes());
}

cargarRestaurantes();