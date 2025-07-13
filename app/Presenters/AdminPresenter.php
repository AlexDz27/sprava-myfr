<?php

// NOTE: not requiring BasePresenter here, bc otherwise there will be Error stating that BasePresenter is already defined due to it being required is SitePresenter as well,
// and SitePresenter is used in routing (it's bad, I know)

class AdminPresenter extends BasePresenter {
  public function home($pathToPage, $title = 'Панель администратора') {
    require $pathToPage;
  }
}