// Small JavaScript enhancement: update the footer year and focus the search field when requested.
document.addEventListener("DOMContentLoaded", function () {
  const year = document.getElementById("year");
  if (year) year.textContent = new Date().getFullYear();

  const searchInput = document.getElementById("searchInput");
  if (searchInput && window.location.hash === "#search") {
    searchInput.focus();
  }
});
