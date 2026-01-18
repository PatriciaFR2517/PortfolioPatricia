

function getQueryParams() {
  const params = new URLSearchParams(window.location.search);
  return {
    id: Number(params.get("id")),
    type: params.get("type")
  };
}

document.addEventListener("DOMContentLoaded", () => {
  const { id, type } = getQueryParams();
  const all = [...characters, ...locations];
  const item = all.find(i => i.id === id && i.type === type);

  const container = document.getElementById("detail");
  if (!item || !container) {
    container.innerHTML = "<p>No se ha encontrado el elemento.</p>";
    return;
  }

  container.innerHTML = `
    <div class="detail-card">
      <div class="detail-image">
        <img src="${item.image}" alt="${item.name}">
      </div>
      <div class="detail-body">
        <h2 id="detail-name">${item.name}</h2>
        <p><strong>Ciudad:</strong> ${item.city}</p>
        ${item.job ? `<p><strong>Profesión:</strong> ${item.job}</p>` : ""}
        ${item.description ? `<p>${item.description}</p>` : ""}

        <div class="edit-block">
          <label for="edit-name">Editar nombre:</label>
          <input id="edit-name" type="text" placeholder="Nuevo nombre">
          <button id="save-name" class="btn">Guardar</button>
        </div>

        <a href="index.html" class="btn btn-secondary">Volver</a>
      </div>
    </div>
  `;

  const saveBtn = document.getElementById("save-name");
  const input = document.getElementById("edit-name");
  const nameEl = document.getElementById("detail-name");

  saveBtn.addEventListener("click", () => {
    const newName = input.value.trim();
    if (newName !== "") {
      nameEl.textContent = newName;
    }
  });
});
