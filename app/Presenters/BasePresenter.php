<?php

namespace app\Presenters;

class BasePresenter {
  public $companyName = 'SPRAVA';

  public function page($vars = [], ...$pageArgs) {
    $pageArgs['extraAssets'] = $pageArgs['extraAssets'] ?? [];

    extract($pageArgs + $vars);
    require $path;
  }
}