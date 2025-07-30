<?php

use app\Presenters\AdminPresenter;

$adminPresenter = new AdminPresenter();

return [
  '/admin-9kasu/api/update-price' => [$adminPresenter, 'updatePriceApi', []],
  '/admin-9kasu/api/edit-texts' => [$adminPresenter, 'editTextsApi', []],
  '/admin-9kasu/api/manage-categories' => [$adminPresenter, 'manageCategoriesApi', []],
];