// js for toggle menu
var menuItems = document.getElementById("menuItems");
menuItems.style.maxHeight = "0px";

function menutoggle() {
  if (menuItems.style.maxHeight == "0px") {
    menuItems.style.maxHeight = "100vh";
  } else {
    menuItems.style.maxHeight = "0px";
  }
}

// remove movie from grid
function removeElement(element) {
  const card = element.closest(".card");
  card.remove();
}

// js for search suggestions
document.addEventListener("DOMContentLoaded", () => {
  const searchInput = document.getElementById("searchInput");
  const suggestionsContainer = document.getElementById("suggestions");

  searchInput.addEventListener("input", async () => {
    const query = searchInput.value.trim();
    if (query.length > 0) {
      const response = await fetch(
        `https://api.tvmaze.com/search/shows?q=${query}`
      );
      const data = await response.json();
      displaySuggestions(data);
    } else {
      suggestionsContainer.innerHTML = "";
    }
  });

  // function to display suggestions
  function displaySuggestions(suggestions) {
    suggestionsContainer.innerHTML = "";
    suggestions.forEach((suggestion) => {
      const item = document.createElement("div");
      item.className = "suggestion-item";
      item.textContent = suggestion.show.name;

      item.addEventListener("click", () => {
        searchInput.value = suggestion.show.name;
        suggestionsContainer.innerHTML = "";
        addMovieToGrid(suggestion.show);
      });

      suggestionsContainer.appendChild(item);
    });
  }
});

// function to add movie to the bottom grid
function addMovieToGrid(movie) {
  const bottomGrid = document.querySelector(".bottom");
  const card = document.createElement("div");
  card.className = "card";

  card.innerHTML = `
      <div class="card-img">
        <img src="${
          movie.image.medium
        }">
        <div class="close">
          <img src="assets/close.png">
        </div>
      </div>
      <div class="card-text">
        <h3>${movie.name}</h3>
        <p>${movie.summary || "No summary available."}</p>
      </div>
  `;

  // Add event listener to the close button
  card.querySelector(".close img").addEventListener("click", () => {
    bottomGrid.removeChild(card);
  });

  bottomGrid.insertBefore(card, bottomGrid.firstChild);
}
