<?php

namespace Zen\TrMaker\Components;

use Lovata\Toolbox\Classes\Component\ElementPage;
use Zen\TrMaker\Models\Project;


class DocProject extends ElementPage
{
   protected $bNeedSmartURLCheck = true;
   protected $obElement;


   public function componentDetails()
   {
      return [
         'name'        => 'Страница проектов',
         'description' => 'выводит данные проектов'
      ];
   }


   protected function getElementObject($sElementSlug)
   {
      if (empty($sElementSlug)) {
         return null;
      }

      $obElement = Project::where([['active',1],['id',$sElementSlug]])
         ->first();

      return $obElement;
   }


   protected function makeItem($iElementID, $obElement)
   {
      return $obElement;
   }
}
