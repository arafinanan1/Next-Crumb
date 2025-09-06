// Theme toggle with persistence
(function() {
  function applyTheme(theme) {
    var body = document.body;
    if (!body) return;
    if (theme === 'light') {
      body.classList.add('theme-light');
    } else {
      body.classList.remove('theme-light');
    }
    var btn = document.getElementById('theme-toggle');
    if (btn) {
      var isLight = body.classList.contains('theme-light');
      btn.textContent = isLight ? 'Dark' : 'Light';
      btn.setAttribute('aria-pressed', isLight ? 'true' : 'false');
    }
  }

  function currentPref() {
    var stored = localStorage.getItem('theme');
    if (stored === 'light' || stored === 'dark') return stored;
    var prefersLight = window.matchMedia && window.matchMedia('(prefers-color-scheme: light)').matches;
    return prefersLight ? 'light' : 'dark';
  }

  function toggleTheme() {
    var now = document.body.classList.contains('theme-light') ? 'light' : 'dark';
    var next = now === 'light' ? 'dark' : 'light';
    localStorage.setItem('theme', next);
    applyTheme(next);
  }

  document.addEventListener('DOMContentLoaded', function() {
    applyTheme(currentPref());
    var btn = document.getElementById('theme-toggle');
    if (btn) btn.addEventListener('click', function(e){ e.preventDefault(); toggleTheme(); });
  });
})();
