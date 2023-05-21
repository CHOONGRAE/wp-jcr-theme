const handler = (e) => {
  const target = e.target.closest(".have-sub-cat");
  const name = target.dataset.name;
  const className = target.className;

  console.log(target, name, className);

  if (!className.includes("open")) {
    e.preventDefault();
    target.className = className + " open";
    const children = document.querySelectorAll(
      `#Sidebar .have-sub-cat[data-name="${name}"] > ul > li > a`
    );

    setTimeout(() => {
      children.forEach((n) => {
        n.style.height = "47px";
      });
    }, 0);
  }
};

const sidebar = document.querySelector("#Sidebar");
const categories = document.querySelector("#Sidebar .categories");
const targets = document.querySelectorAll("#Sidebar .have-sub-cat > a");

export const expand_category = () => {
  sidebar.style.display = "block";
  categories.style.width = categories.clientWidth + 10 + "px";
  sidebar.removeAttribute("style");

  targets.forEach(
    (n) =>
      (n.parentNode.className = n.parentNode.className.replace(" open", ""))
  );

  targets.forEach((n) => {
    n.addEventListener("click", handler);
  });
};
