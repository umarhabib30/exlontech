const themeController = () => {
  const html = document.documentElement;
  const themeControllerButton = document.querySelector(".theme-controller");

  if (!html || !themeControllerButton) {
    return;
  }

  const applyTheme = (theme) => {
    const nextTheme = theme === "light" ? "light" : "dark";

    if (nextTheme === "light") {
      html.classList.remove("dark");
    } else {
      html.classList.add("dark");
    }

    localStorage.setItem("theme", nextTheme);
  };

  const savedTheme = localStorage.getItem("theme");
  applyTheme(savedTheme === "light" ? "light" : "dark");

  themeControllerButton.addEventListener("click", function () {
    const nextTheme = html.classList.contains("dark") ? "light" : "dark";
    applyTheme(nextTheme);
  });
};
