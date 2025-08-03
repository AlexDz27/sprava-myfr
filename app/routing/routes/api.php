<?php

use app\Presenters\AdminPresenter;

$adminPresenter = new AdminPresenter();

return [
  '/admin-9kasu/api/update-price' => [$adminPresenter, 'updatePriceApi', []],
  '/admin-9kasu/api/edit-product' => [$adminPresenter, 'editProductApi', []],
  '/admin-9kasu/api/create-product' => [$adminPresenter, 'createProductApi', []],
  '/admin-9kasu/api/manage-categories' => [$adminPresenter, 'manageCategoriesApi', []],
  '/admin-9kasu/api/edit-texts' => [$adminPresenter, 'editTextsApi', []],
];