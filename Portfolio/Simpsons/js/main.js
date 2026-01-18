function createCard(item) {
  const card = document.createElement("article");
  card.classList.add("card");

  const favClass = isFavorite(item) ? "fav-active" : "";

  card.innerHTML = `
    <div class="card-image">
      <img src="${item.image}" alt="${item.name}">
    </div>
    <div class="card-body">
      <h3>${item.name}</h3>
      <p class="card-city">${item.city}</p>
      <p class="card-desc">${item.description || ""}</p>
    </div>
    <div class="card-footer">
      <button class="fav-btn ${favClass}" data-id="${item.id}" data-type="${item.type}">
        ${isFavorite(item) ? "💛" : "🤍"}
      </button>
      <a href="detail.html?id=${item.id}&type=${item.type}" class="btn">Ver más</a>
    </div>
  `;

  return card;
}

function renderSection(data, containerId) {
  const container = document.getElementById(containerId);
  if (!container) return;

  container.innerHTML = "";
  data.forEach(item => {
    const card = createCard(item);
    container.appendChild(card);
  });
}

document.addEventListener("DOMContentLoaded", () => {
  renderSection(characters, "characters");
  renderSection(locations, "locations");

  document.addEventListener("click", (e) => {
    if (e.target.classList.contains("fav-btn")) {
      const id = Number(e.target.dataset.id);
      const type = e.target.dataset.type;
      const all = [...characters, ...locations];
      const item = all.find(i => i.id === id && i.type === type);

      toggleFavorite(item);

      const isFav = isFavorite(item);
      e.target.textContent = isFav ? "💛" : "🤍";
      e.target.classList.toggle("fav-active", isFav);
    }
  });
});
