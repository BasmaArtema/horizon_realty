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

// ==============================
// MOBILE MENU TOGGLE
// ==============================
document.addEventListener("DOMContentLoaded", () => {
  const toggleButton = document.querySelector('.mobile-menu-toggle');
  const nav = document.querySelector('nav');

  if (!toggleButton || !nav) return;

  toggleButton.addEventListener('click', () => {
    nav.classList.toggle('open');
  });

  // Close on escape
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && nav.classList.contains('open')) {
      nav.classList.remove('open');
    }
  });

  // Handle dropdown on mobile (click instead of hover)
  const dropdowns = document.querySelectorAll('.dropdown');
  dropdowns.forEach(dropdown => {
    const link = dropdown.querySelector('a');
    const content = dropdown.querySelector('.dropdown-content');
    if (link && content) {
      link.addEventListener('click', (e) => {
        if (window.innerWidth <= 768) {
          e.preventDefault();
          content.classList.toggle('open');
        }
      });
    }
  });
});

// ==============================
// FEATURED LISTINGS FILTER
// ==============================
document.addEventListener("DOMContentLoaded", () => {
  const tabButtons = document.querySelectorAll('.tab-button');
  const productCards = document.querySelectorAll('.product-card');

  if (tabButtons.length === 0 || productCards.length === 0) return;

  tabButtons.forEach(button => {
    button.addEventListener('click', () => {
      // Remove active class from all buttons
      tabButtons.forEach(btn => btn.classList.remove('active'));
      // Add active to clicked button
      button.classList.add('active');

      const category = button.getAttribute('data-category');

      productCards.forEach(card => {
        const cardCategories = card.getAttribute('data-categories').split(',');
        if (category === 'all' || cardCategories.includes(category)) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
});

