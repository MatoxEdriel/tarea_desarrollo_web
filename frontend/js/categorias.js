const API_URL = "https://mvc-php-web-latest.onrender.com/categorias.php";

// Listar categorías
async function cargarCategorias() {
  const res = await fetch(API_URL);
  const data = await res.json();

  const tbody = document.querySelector("#tablaCategorias");
  if (!tbody) return;

  tbody.innerHTML = "";
  data.forEach((cat) => {
    tbody.innerHTML += `
      <tr>
        <td>${cat.id_categoria}</td>
        <td>${cat.nombre}</td>
        <td>${cat.descripcion}</td>
        <td>
          <a class="btn btn-sm btn-primary" href="editar.html?id=${cat.id_categoria}">Editar</a>
          <button class="btn btn-sm btn-danger" onclick="eliminarCategoria(${cat.id_categoria})">Eliminar</button>
        </td>
      </tr>
    `;
  });
}

// Eliminar
async function eliminarCategoria(id) {
  if (!confirm("¿Está seguro de eliminar esta categoría?")) return;
  const res = await fetch(`${API_URL}?id_categoria=${id}`, {
    method: "DELETE",
  });
  const data = await res.json();
  if (data.success) cargarCategorias();
}

// Manejar creación de nueva categoría
function handleNuevoCategoria() {
  const form = document.querySelector("#formNuevoCategoria");
  if (!form) return;

  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    const formData = new FormData(form);
    const res = await fetch(API_URL, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        nombre: formData.get("nombre"),
        descripcion: formData.get("descripcion"),
      }),
    });
    const data = await res.json();
    if (data.success) window.location.href = "index.html";
  });
}

// Manejar edición de categoría
function handleEditarCategoria() {
  const form = document.querySelector("#formEditarCategoria");
  if (!form) return;

  const params = new URLSearchParams(window.location.search);
  const id = params.get("id");
  if (!id) return;

  // Traer datos actuales
  fetch(`${API_URL}?b=${id}`)
    .then((res) => res.json())
    .then((data) => {
      const cat = data[0];
      form.id_categoria.value = cat.id_categoria;
      form.nombre.value = cat.nombre;
      form.descripcion.value = cat.descripcion;
    });

  // Guardar cambios
  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    const formData = new FormData(form);
    const res = await fetch(API_URL, {
      method: "PUT",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        id_categoria: formData.get("id_categoria"),
        nombre: formData.get("nombre"),
        descripcion: formData.get("descripcion"),
      }),
    });
    const data = await res.json();
    if (data.success) window.location.href = "index.html";
  });
}
