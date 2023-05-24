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

//편집기 css 적용
add_action("after_setup_theme", "set_css_editor");

function set_css_editor()
{
  add_theme_support("editor-styles");
  add_editor_style(get_theme_file_uri("/styles/editor.css"));
}

//이미지 업로드 처리
include_once "functions/proc_img.php";

// 파일 첨부
include_once "functions/enqueue_assets.php";
