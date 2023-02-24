<?php


/*

Add the right background class

*/
function commaToDot($num) {
  $num = str_replace(",", ".", $num);
  return $num;
}

function backgroundClass($element) {

  $class = '';

  if($element->bgEnabled()->toBool() === true) {
    if($element->bgType() == 'color' && $element->color() != '') {
      $class = ' bg-color-' . $element->color()->value() . ' ' . $element->backgroundSize()->or('full-width');
    } elseif($element->bgType() == 'image' && $element->backgroundImage()->isNotEmpty()) {
      $class = ' bg-cover bg-img-pos-hor-' . $element->positionHorizontal()->value() . ' bg-img-pos-vert-' . $element->positionVertical()->value(). ' ' . $element->backgroundSize()->or('full-width');
    }
  }

  return $class;
}

function backgroundImage($element) {

  $style = '';

  if($element->bgEnabled()->toBool() === true) {
    if($element->bgType() == 'image') {
      if($media = $element->backgroundImage()->toFile()) {
        $style = 'background-image:url('.$media->url().');';
      }
    }
  }

  return $style;
}

function fontColor($color) {
  if($color) {
    if($color!='' && $color!='normal') {
      return ' color-'.$color;
    }
  }
}

function backgroundSVG($svg) {
  if ($svg && $svg->code()->isNotEmpty()){
   return '<div class="bg-svg bg-svg-pos-hor-'.$svg->positionHorizontal().' bg-svg-pos-vert-'.$svg->positionVertical().'">'.$svg->code().'</div>';
 }
}

// sets an anchor tag with the given parameters
function setlink($element, $classNames, $module, $completeTag = true) {  
  if($element) {
    $url = '#';
    $options = '';
    $class = '';
    $title = '';

    if($element->style()->isNotEmpty()) {
      if($element->style() == 'text') {
        $class = ' class="textlink"';
      } else {
        $class = ' class="btn btn-style-'.$element->style().'"';
      }
    } 
    
    if($classNames!='') {
      $class = ' class="'.$classNames.'"';
    }
      
    if($element->link()->value() === 'page' && $element->linkPage()->isNotEmpty() && $element->linkPage()->toPage()) {
      $url = $element->linkPage()->toPage()->url();
  
      if($element->linkParam()->isNotEmpty()) {
        $url = $url . '/p:' . $element->linkParam();
      }
  
      if($element->linkAnchor()->isNotEmpty()) {
        $url = $url . '#' . $element->linkAnchor();
      }

      $title = $element->linkPage()->toPage()->title();
    } elseif ($element->link()->value() === 'url' && $element->linkUrl()->isNotEmpty()) {
      $url = $element->linkUrl();

      if($element->linkTarget()->bool()) {
        $options = ' target="blank"';
      }

      $title = $url;
    } elseif ($element->link()->value() === 'mail' && $element->linkMail()->isNotEmpty()) {
      $url = 'mailto:' . $element->linkMail();

      $title = $element->linkMail();

    } elseif ($element->link()->value() === 'phone' && $element->linkPhone()->isNotEmpty()) {
      $url = 'tel:' . $element->linkPhone();

      $title = $element->linkPhone();

    } elseif ($element->link()->value() === 'modal' && $element->linkModal()->isNotEmpty()) {
      $url = '';
      
      $modalName = 'modal-'.$module->id();

      $options = 'data-bs-toggle="modal" data-bs-target="#'.$modalName.'"';

      $title = $element->linkModalTitle();

      echo snippet('modal', ['modalName' => $modalName, 'modalTitle' => $element->linkModalTitle(), 'modalContent' => $element->linkModal()]);;
    } elseif ($element->link()->value() === 'file' && $file = $element->linkFile()->toFile()) {
      $url = $file->url();

      $options = ' target="blank"';

      $title = $file->name();
    }

    if($element->linkTitle()->isNotEmpty()) {
      $title = $element->linkTitle();
    }

    if($completeTag == true) {
      return '<a href="'.$url.'"'.$options.$class.'>'.$title.'</a>';
    } else {
      return '<a href="'.$url.'"'.$options.$class.'>';
    }
  } 
}

/*

Return date format

*/
function dateFormat($site) {
  if ($site->dateFormat()->isNotEmpty()) {
    return $site->dateFormat();
  } else {
    return 'M d, Y';
  }
}


/*

Return number of posts per page

*/
function postsPerPage($site) {
  if ($site->postsPerPage()->isNotEmpty()) {
    return $site->postsPerPage()->toInt();
  } else {
    return 10;
  }
}


/*

Return number of posts per page

*/
function numberOfPosts($blockPosts) {
  if ($blockPosts->numberOfPosts()->isNotEmpty()) {
    return $blockPosts->numberOfPosts()->toInt();
  } else {
    return 10;
  }
} 

?>
