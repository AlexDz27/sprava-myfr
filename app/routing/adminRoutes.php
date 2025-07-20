<?php

require 'app/Presenters/AdminPresenter.php';
$adminPresenter = new AdminPresenter();

return [
  '/admin-9kasu' => [$adminPresenter, 'home', [
    'title' => 'Панель администратора - ' . $adminPresenter->companyName,
    'pathToPage' => 'front-end/admin/pages/home.php'
  ]],
  '/admin-9kasu/update-price' => [$adminPresenter, 'updatePrice', [
    'title' => 'Панель администратора - обновить прайс',
    'pathToPage' => 'front-end/admin/pages/update-price.php'
  ]],
  '/admin-9kasu/edit-texts' => [$adminPresenter, 'editTexts', [
    'title' => 'Панель администратора - редактировать тексты',
    'pathToPage' => 'front-end/admin/pages/edit-texts.php'
  ]],
  '/admin-9kasu/manage-categories' => [$adminPresenter, 'editTexts', [
    'title' => 'Панель администратора - управлять категориями',
    'pathToPage' => 'front-end/admin/pages/manage-categories.php'
  ]],
];