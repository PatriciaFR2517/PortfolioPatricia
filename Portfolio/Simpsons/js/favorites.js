function getFavorites() {
  return JSON.parse(localStorage.getItem("favorites")) || [];
}

function saveFavorites(favs) {
  localStorage.setItem("favorites", JSON.stringify(favs));
}

function toggleFavorite(item) {
  const favs = getFavorites();
  const exists = favs.find(f => f.id === item.id && f.type === item.type);

  let updated;
  if (exists) {
    updated = favs.filter(f => !(f.id === item.id && f.type === item.type));
  } else {
    updated = [...favs, item];
  }

  saveFavorites(updated);
}

function isFavorite(item) {
  const favs = getFavorites();
  return !!favs.find(f => f.id === item.id && f.type === item.type);
}

function renderFavoritesDropdown() {
  const dropdown = document.getElementById("fav-dropdown");
  if (!dropdown) return;

  const favs = getFavorites();
  dropdown.innerHTML = "";

  if (favs.length === 0) {
    dropdown.innerHTML = "<p class='dropdown-empty'>No hay favoritos</p>";
    return;
  }

  favs.forEach(f => {
    const row = document.createElement("div");
    row.classList.add("dropdown-row");

    const link = document.createElement("a");
    link.href = `detail.html?id=${f.id}&type=${f.type}`;
    link.classList.add("dropdown-item");
    link.textContent = f.name;

    const removeBtn = document.createElement("button");
    removeBtn.textContent = "✕";
    removeBtn.classList.add("dropdown-remove");
    removeBtn.addEventListener("click", (e) => {
      e.preventDefault();
      const updated = getFavorites().filter(
        fav => !(fav.id === f.id && fav.type === f.type)
      );
      saveFavorites(updated);
      renderFavoritesDropdown();
    });

    row.appendChild(link);
    row.appendChild(removeBtn);
    dropdown.appendChild(row);
  });
}

document.addEventListener("DOMContentLoaded", () => {
  const favBtn = document.getElementById("fav-btn");
  const dropdown = document.getElementById("fav-dropdown");

  if (favBtn && dropdown) {
    favBtn.addEventListener("click", () => {
      dropdown.classList.toggle("hidden");
      renderFavoritesDropdown();
    });
  }
});
