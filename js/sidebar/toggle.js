const sidebar = document.querySelector("#Sidebar");
const body = document.querySelector("body");
const openbtn = document.querySelector("#Nav .btn-open-sidebar");
const items = document.querySelector(".sidebar-items");

const openHandler = () => {
  sidebar.style.top = window.scrollY + "px";
  sidebar.style.display = "block";

  setTimeout(() => {
    body.style.overflowY = "hidden";
    sidebar.style.overflowY = "scroll";
    openbtn.style.opacity = 0;
    sidebar.className = "open";
  }, 0);
};

const closeHandler = () => {
  openbtn.style.opacity = 1;
  sidebar.removeAttribute("class");
  sidebar.style.overflowY = "hidden";
  body.removeAttribute("style");
  setTimeout(() => {
    sidebar.scrollTop = 0;
    sidebar.removeAttribute("style");
  }, 200);
};

export const toggle_sidebar = () => {
  openbtn.addEventListener("click", openHandler);
  sidebar.addEventListener("click", closeHandler);
  items.addEventListener("click", (e) => e.stopPropagation());
};
