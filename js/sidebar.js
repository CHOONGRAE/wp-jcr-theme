import { toggle_sidebar } from "./sidebar/toggle.js";
import { expand_category } from "./sidebar/expand_category.js";

window.addEventListener("load", () => {
  toggle_sidebar();
  expand_category();
});
