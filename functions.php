<?php

//메인 메뉴
register_nav_menus(["header" => __("Header Menu")]);

//관리 표시줄 숨김
add_action("after_setup_theme", "remove_admin_bar");
function remove_admin_bar()
{
  show_admin_bar(false);
  // if (!current_user_can("administrator") && !is_admin()) {
  //   show_admin_bar(false);
  // }
}

//이미지 업로드 처리
include "functions/proc_img.php";
