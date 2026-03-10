/**
 * Horizon Realty - Main site scripts
 * Handles seasonal theme (Spring, Christmas, Classic) and Featured listing tabs.
 */
// scripts.js

// ==============================
// SEASONAL THEME SWITCH BASED ON MONTH
// ==============================
document.addEventListener("DOMContentLoaded", () => {
  const body = document.body;

  const month = new Date().getMonth() + 1; // 1 = Jan, 12 = Dec
  let theme = "classic-theme"; // default

  if (month >= 3 && month <= 5) { // March - May
    theme = "spring-theme";
  } else if (month === 12) { // December
    theme = "christmas-theme";
  }

  // Remove all theme classes
  body.classList.remove("spring-theme", "christmas-theme", "classic-theme");

  // Apply the correct theme based on the month
  body.classList.add(theme);

  console.log("Applied seasonal theme:", theme);
});

// Featured listing category tabs (featured.html): filter cards by category
document.addEventListener('DOMContentLoaded', function () {
    const tabButtons = document.querySelectorAll('.tab-button');

    tabButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Remove active class from all buttons
            tabButtons.forEach(btn => btn.classList.remove('active'));

            // Add active class to clicked button
            this.classList.add('active');

            const category = this.getAttribute('data-category');
            const productCards = document.querySelectorAll('.product-card');

            productCards.forEach(card => {
                if (category === 'all' || card.getAttribute('data-categories').includes(category)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});

