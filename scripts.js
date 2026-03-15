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

