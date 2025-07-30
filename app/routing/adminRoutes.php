<?php

require 'app/Presenters/AdminPresenter.php';
$adminPresenter = new AdminPresenter();

return [
  '/admin-9kasu' => [$adminPresenter, 'page', [
    'title' => 'Панель администратора - ' . $adminPresenter->companyName,
    'pathToPage' => 'front-end/admin/pages/home.php'
  ]],
  '/admin-9kasu/update-price' => [$adminPresenter, 'page', [
    'title' => 'Панель администратора - обновить прайс',
    'pathToPage' => 'front-end/admin/pages/update-price.php'
  ]],
  '/admin-9kasu/manage-products' => [$adminPresenter, 'manageProducts', [
    'title' => 'Панель администратора - управлять товарами',
    'pathToPage' => 'front-end/admin/pages/manage-products.php'
  ]],
  '/admin-9kasu/manage-categories' => [$adminPresenter, 'manageCategories', [
    'title' => 'Панель администратора - управлять категориями',
    'pathToPage' => 'front-end/admin/pages/manage-categories.php'
  ]],
  '/admin-9kasu/edit-texts' => [$adminPresenter, 'editTexts', [
    'title' => 'Панель администратора - редактировать тексты',
    'pathToPage' => 'front-end/admin/pages/edit-texts.php'
  ]],
];