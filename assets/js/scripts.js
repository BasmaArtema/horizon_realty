/**
 * Horizon Realty - Main site scripts
 * Handles shared front-end behavior across the site:
 * - automatic seasonal theme selection
 * - logged-in user theme preference switching
 * - responsive/mobile navigation
 * - featured listing tab filtering
 */

// ==============================
// SEASONAL THEME SWITCH / USER THEME PREFERENCE
// ==============================
const THEME_CLASSES = ["spring-theme", "christmas-theme", "classic-theme"];

function getSeasonalTheme() {
  const month = new Date().getMonth() + 1; // 1 = Jan, 12 = Dec
  let theme = "classic-theme"; // default

  if (month >= 3 && month <= 5) { // March - May
    theme = "spring-theme";
  } else if (month === 12) { // December
    theme = "christmas-theme";
  }

  return theme;
}

function applyTheme(theme) {
  const body = document.body;
  if (!body) return;

  body.classList.remove(...THEME_CLASSES);
  body.classList.add(theme);
}

function getLoggedInUserThemeKey() {
  const logoutLink = document.querySelector('.top-auth-link[href="logout.php"]');
  const profileLink = document.querySelector('.top-auth-link[href="profile.php"]');

  if (!logoutLink || !profileLink) {
    return null;
  }

  const username = profileLink.textContent.replace(/\s+/g, " ").trim().toLowerCase();
  return `horizon-realty-theme:${username || "logged-in-user"}`;
}

function buildThemeSwitcher(preferenceKey, initialPreference) {
  const authInner = document.querySelector(".top-auth-inner");
  const logoutLink = document.querySelector('.top-auth-link[href="logout.php"]');

  if (!authInner || !logoutLink || document.querySelector(".theme-switcher")) {
    return;
  }

  const wrapper = document.createElement("div");
  wrapper.className = "theme-switcher";

  const label = document.createElement("label");
  label.className = "theme-switcher-label";
  label.setAttribute("for", "themeSwitcher");
  label.innerHTML = '<i class="fas fa-palette"></i><span>Theme</span>';

  const select = document.createElement("select");
  select.className = "theme-switcher-select";
  select.id = "themeSwitcher";
  select.setAttribute("aria-label", "Choose site theme");

  [
    { value: "auto", label: "Auto" },
    { value: "spring-theme", label: "Spring" },
    { value: "christmas-theme", label: "Christmas" },
    { value: "classic-theme", label: "Classic" }
  ].forEach(optionData => {
    const option = document.createElement("option");
    option.value = optionData.value;
    option.textContent = optionData.label;
    select.appendChild(option);
  });

  select.value = initialPreference;

  select.addEventListener("change", () => {
    const selectedPreference = select.value;
    localStorage.setItem(preferenceKey, selectedPreference);

    if (selectedPreference === "auto") {
      applyTheme(getSeasonalTheme());
      return;
    }

    applyTheme(selectedPreference);
  });

  wrapper.append(label, select);
  authInner.insertBefore(wrapper, authInner.firstChild);
}

document.addEventListener("DOMContentLoaded", () => {
  const preferenceKey = getLoggedInUserThemeKey();
  const storedPreference = preferenceKey ? localStorage.getItem(preferenceKey) || "auto" : "auto";
  const activeTheme = storedPreference === "auto" ? getSeasonalTheme() : storedPreference;

  applyTheme(activeTheme);

  if (preferenceKey) {
    buildThemeSwitcher(preferenceKey, storedPreference);
  }
});

// ==============================
// MOBILE MENU TOGGLE
// ==============================
document.addEventListener("DOMContentLoaded", () => {
  const toggleButton = document.querySelector('.mobile-menu-toggle');
  const nav = document.querySelector('nav');

  // Some utility/admin pages may not include the shared menu toggle.
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

  // Only the featured page uses these controls, so skip the logic elsewhere.
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
        // The "all" tab shows everything. Other tabs filter by card category tags.
        if (category === 'all' || cardCategories.includes(category)) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
});

