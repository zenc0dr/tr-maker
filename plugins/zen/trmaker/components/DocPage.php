<?php

namespace Zen\TrMaker\Components;

use Lovata\Toolbox\Classes\Component\ElementPage;
use Zen\TrMaker\Models\Page;


class DocPage extends ElementPage
{
   protected $bNeedSmartURLCheck = true;
   protected $obElement;


   public function componentDetails()
   {
      return [
         'name'        => 'Страница Страницы',
         'description' => 'выводит данные страницы проекта'
      ];
   }


   protected function getElementObject($sElementSlug)
   {

      if (empty($sElementSlug)) {
         return null;
      }

      $obElement = Page::where([['active',1],['id',$sElementSlug]])
         ->first();

      return $obElement;
   }


   protected function makeItem($iElementID, $obElement)
   {
      return $obElement;
   }
}
