<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo( 'name' ); ?></title>
    <?php wp_head() ?>
</head>

<body <?php body_class(); ?>>

<header >

  <h2><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h2>
  <h3><?php bloginfo( 'description' ); ?></h3>


<?php
  // Select our menu
  $menu = my_menu_builder('main-menu');
  //echo '<pre>'; print_r($menu); echo '</pre>';
  foreach ($menu as $item) :
    //Set class names if the menu item is active
    $menu_item_active_class = get_the_ID() == $item['ID'] ? 'button' : 'text-gray-300 hover:bg-gray-700 hover:text-white';
    $sub_menu_item_active_class = get_the_ID() == $item['ID'] ? 'bg-gray-100 text-gray-900' : 'text-gray-700';

    //Menu item has children
    if (isset($item['children'])) : ?>
          <a href='<?= $item['url'] ?>'><?= $item['title']; ?></a>
          <?php foreach ($item['children'] as $child) : ?>
            <a  href='<?= $child['url'] ?>'><?= $child['title'] ?></a>
          <?php endforeach; ?>
    <?php else: ?>
      <a  href='<?= $item['url'] ?>'><?= $item['title']; ?></a>
    <?php endif; ?>
  <?php endforeach;?>

</header>

