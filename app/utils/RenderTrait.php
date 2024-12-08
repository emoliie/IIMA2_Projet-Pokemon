<?php

trait Render{
  public function renderView(string $view, array $data = [], string $layout = 'layout')
  {
    // Extraction des données en tant que variables
    // Va créer une variable par élément du tableau
    extract($data);
    // Chemin d'accès à la vue
    $viewPath = __DIR__ .'/../views/'. $view .'.php';
    // echo $viewPath;
    
    if (file_exists($viewPath)) {
      // Mise en tampon de ce qui va suivre
      ob_start();
      // On appelle la vue
      require_once $viewPath;
      // On stock dans $content ce qui a été mis en tampon et on le vide
      $content = ob_get_clean();
      // On appelle le layout qui recevra $content et les autres variables de $data
      require_once __DIR__ .'/../views/'. $layout .'.php';
    }
    else {
      die('<p>404</p>');
    }
  }
}