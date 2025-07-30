<?php

use app\Presenters\AdminPresenter;

$adminPresenter = new AdminPresenter();

return [
  '/admin-9kasu' => [$adminPresenter, 'page', [
    'path' => 'front-end/admin/pages/home.php',
    'title' => 'Панель администратора - ' . $adminPresenter->companyName,
    'pageName' => 'home',
  ]],
  '/admin-9kasu/update-price' => [$adminPresenter, 'page', [
    'path' => 'front-end/admin/pages/update-price.php',
    'title' => 'Панель администратора - обновить прайс',
    'extraAssets' => [
      '<script src="/front-end/admin/assets/js/updatePrice.js" defer></script>',
    ],
  ]],
  '/admin-9kasu/manage-products' => [$adminPresenter, 'manageProducts', [
    'path' => 'front-end/admin/pages/manage-products.php',
    'title' => 'Панель администратора - управлять товарами',
    'extraAssets' => [
      '<script src="/front-end/admin/assets/js/manageProducts.js" defer></script>',
    ],
  ]],
  '/admin-9kasu/manage-categories' => [$adminPresenter, 'manageCategories', [
    'path' => 'front-end/admin/pages/manage-categories.php',
    'title' => 'Панель администратора - управлять категориями',
    'extraAssets' => [
      '<script src="/front-end/admin/assets/js/manageCategories.js" defer></script>',
    ],
  ]],
  '/admin-9kasu/edit-texts' => [$adminPresenter, 'editTexts', [
    'path' => 'front-end/admin/pages/edit-texts.php',
    'title' => 'Панель администратора - редактировать тексты',
    'extraAssets' => [
      '<script src="/front-end/admin/assets/js/editTexts.js" defer></script>',
    ],
  ]],
];