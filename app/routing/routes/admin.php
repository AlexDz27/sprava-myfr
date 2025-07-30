<?php

require 'app/Presenters/AdminPresenter.php';
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
  ]],
  '/admin-9kasu/manage-products' => [$adminPresenter, 'manageProducts', [
    'path' => 'front-end/admin/pages/manage-products.php',
    'title' => 'Панель администратора - управлять товарами',
  ]],
  '/admin-9kasu/manage-categories' => [$adminPresenter, 'manageCategories', [
    'path' => 'front-end/admin/pages/manage-categories.php',
    'title' => 'Панель администратора - управлять категориями',
  ]],
  '/admin-9kasu/edit-texts' => [$adminPresenter, 'editTexts', [
    'path' => 'front-end/admin/pages/edit-texts.php',
    'title' => 'Панель администратора - редактировать тексты',
  ]],
];