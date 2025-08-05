<?php

use app\Presenters\AdminPresenter;
use app\Data\DataProvider;

$adminPresenter = new AdminPresenter();

$adminRoutes = [
  '/admin-9kasu' => [$adminPresenter, 'guardedPage', [
    'path' => 'front-end/admin/pages/home.php',
    'title' => 'Панель администратора - ' . $adminPresenter->companyName,
    'pageName' => 'home',
  ]],
  '/admin-9kasu/update-price' => [$adminPresenter, 'guardedPage', [
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
  '/admin-9kasu/create-product' => [$adminPresenter, 'createProduct', [
    'path' => 'front-end/admin/pages/create-product.php',
    'title' => 'Панель администратора - создать товар',
    'extraAssets' => [
      '<script src="/front-end/admin/assets/js/createProduct.js" defer></script>',
    ],
    'pageName' => 'create-product',
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

if (str_contains($_SERVER['REQUEST_URI'], 'edit-product')) {
  $myF = function(&$adminRoutes) use ($adminPresenter) {
  $dataProvider = new DataProvider();
  $ps = $dataProvider->getProductsForAdmin();

  foreach ($ps as $p) {
    $adminRoutes['/admin-9kasu/edit-product/' . $p['art']] = [$adminPresenter, 'editProduct', [
      'path' => 'front-end/admin/pages/edit-product.php',
      'title' =>  'Редактирование продукта',
      'extraAssets' => [
        '<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>',
        '<script src="/front-end/admin/assets/js/editProduct.js" defer></script>',
      ],
      'pageName' => 'edit-product',
      'product' => $p,
    ]];
  }
};

$myF($adminRoutes);
}

return $adminRoutes;