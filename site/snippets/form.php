<?php 
    if(!isset($formID)) {
        $id = 'form';
    } else {
        $id = $formID;
    }
?>

<div id="<?= $id ?>" class="form-wrapper">
  <?php if ($contentPage->heading()->isNotEmpty()): ?>
    <h3 class="title-<?= $contentPage->fontSize() ?>"><?= $contentPage->heading() ?></h3>
  <?php endif ?>

  <?php if ($form->success()): ?>
    <div class="form-message success">
        <?= $contentPage->successMessage()->kt() ?>
    </div>
  <?php else: ?>
    <form action="<?= '#'.$id ?>" method="POST">

    <?php foreach($contentPage->formBuilder()->toStructure() as $formField): ?>

        <?php 
        $name = $formField->fieldName()->toString();

        if($formField->fieldRequired()->bool()) {
          $label = $formField->fieldLabel().' *';  
          $required = 'required';
        } else {
          $label = $formField->fieldLabel();  
          $required = '';
        }
        ?>

        <?php switch($formField->fieldType()): 
          case "text-input": ?>
              <div class="form-field mb-3 text-input">
                <label class="form-label" for="<?= $name ?>"><?= $label ?></label>
                <input class="form-control<?php if ($form->error($name)): echo ' error'; endif ?>" name="<?= $name ?>" type="text" value="<?= $form->old($name) ?>" <?= $required ?>>
              </div>
          <?php break; ?>

          <?php case "parameter": 
            $topic = $formField->fieldParam()->or('');
            $param = param('topic'); 

            if($param!=null) {
              $param = str_replace('_', ' ', $param);
              $param = str_replace('%20', ' ', $param);
              $param = str_replace('%22', '~', $param);
              $param = str_replace('%E2%80%9E', '~', $param);
              $param = str_replace('%E2%80%9C', '~', $param);
              $param = str_replace('%E2%80%93', '-', $param);
              $param = str_replace('%C3%BC', 'ü', $param);
              $param = str_replace('%C3%A4', 'ä', $param);
              $topic = $param;
            }
          ?>
            <div class="form-field mb-3 parameter-input">
              <label for="<?= $name ?>"><?= $label ?></label>
              <input name="<?= $name ?>" type="text" readonly class="form-field mb-3-plaintext hidden" value="<?= $topic ?>">
              <span class="topic"><?= $topic ?></span>
            </div>
          <?php break; ?>

          <?php case "mail-input": ?>
            <div class="form-field mb-3 mail-input">
              <label class="form-label" for="<?= $name ?>"><?= $label ?></label>
              <input class="form-control<?php if ($form->error($name)): echo ' error'; endif ?>" name="<?= $name ?>" type="email" value="<?= $form->old($name) ?>" <?= $required ?>>
            </div>
          <?php break; ?>

          <?php case "headline": ?>
            <div class="form-field mb-3-headline">
              <h5><?= $label ?></h5>
            </div>
          <?php break; ?>

          <?php case "text-area": ?>
            <div class="form-field mb-3 textarea">
              <label class="form-label" for="<?= $name ?>"><?= $label ?></label>
              <textarea class="form-control<?php if ($form->error($name)): echo ' error'; endif ?>" name="<?= $name ?>" <?= $required ?>><?= $form->old($name) ?></textarea>
            </div>
          <?php break; ?>

          <?php case "number": ?>
            <div class="form-field mb-3 text-input">
              <label class="form-label" for="<?= $name ?>"><?= $label ?></label>
              <input class="form-control<?php if ($form->error($name)): echo ' error'; endif ?>" name="<?= $name ?>" type="number" value="<?= $form->old($name) ?>" <?= $required ?> min="<?= $formField->fieldNumberMin()->or(0) ?>" max="<?= $formField->fieldNumberMax()->or(999) ?>">
            </div>
          <?php break; ?>

          <?php case "input-date": ?>
            <div class="form-field mb-3 text-input">
              <label class="form-label" for="<?= $name ?>"><?= $label ?></label>
              <input class="form-control<?php if ($form->error($name)): echo ' error'; endif ?>" name="<?= $name ?>" type="date" value="<?= $form->old($name) ?>" <?= $required ?> min="<?= date('Y-m-d') ?>">
            </div>
          <?php break; ?>

          <?php case "input-time": ?>
            <div class="form-field mb-3 text-input">
              <label class="form-label" for="<?= $name ?>"><?= $label ?></label>
              <input class="form-control<?php if ($form->error($name)): echo ' error'; endif ?>" name="<?= $name ?>" type="time" value="<?= $form->old($name) ?>" <?= $required ?> min="<?= $formField->fieldTimeMin()->or('00:00') ?>" max="<?= $formField->fieldTimeMax()->or('23:59') ?>">
            </div>
          <?php break; ?>

          <?php case "checkbox": ?>
            <?php $value = $form->old($name) ?>
            <div class="form-field mb-3 checkbox">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="<?= $name ?>" id="<?= $name ?>" value="true" <?php e($value=='true' || $formField->fieldCheckboxActive()->bool(), ' checked')?> <?= $required ?>>
                <label class="form-check-label" for="<?= $name ?>"><?= $formField->fieldCheckboxText() ?></label>
              </div>
            </div>
          <?php break; ?>

          <?php case "select": ?>
            <?php $value = $form->old($name);                
              if($formField->fieldSelectRadio()->bool()): ?>
                <div class="form-field mb-3 radio">
                  <label class="form-label" for="<?= $name ?>"><?= $label ?></label>

                  <?php foreach($formField->fieldSelectOptions()->toStructure() as $option): ?>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="<?= $name ?>" id="<?= $option->optionName() ?>" value="<?= $option->optionName() ?>"<?php e($value==$option->optionName(), ' checked')?> <?= $required ?>>
                      <label class="form-check-label" for="<?= $option->optionName() ?>"><?= $option->optionText() ?></label>
                    </div>
                  <?php endforeach ?>
                </div>
            <?php else: ?>
              <div class="form-field mb-3 select">
                <label class="form-label"><?= $label ?></label>
                <select class="form-select" name="<?= $name ?>" aria-label="<?= $name ?>" <?= $required ?>>
                    <?php foreach($formField->fieldSelectOptions()->toStructure() as $option): ?>
                      <option value="<?= $option->optionName() ?>"<?php e($value==$option->optionName(), ' selected')?>><?= $option->optionText() ?></option>
                    <?php endforeach ?>
                </select>
              </div>
            <?php endif ?>
          <?php break; ?>
          
          <?php case "acceptTerms": ?>
            <?php $value = $form->old($name) ?>
            <div class="form-field mb-3 checkbox">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="<?= $name ?>" id="<?= $name ?>" value="true" <?php e($value=='true', ' checked')?> <?= $required ?>>
                <label class="form-check-label" for="<?= $name ?>"><?= $formField->fieldTermsText() ?></label>
              </div>
              <?php if($termsLink = $formField->fieldTermsLink()->toPage()): ?>
                <a class="terms-link" href="<?= $termsLink->url() ?>"><?= $formField->fieldTermsLinkLabel()->or($termsLink->title()) ?></a>
              <?php endif ?>
            </div>
          <?php break; ?>

        <?php endswitch; ?>
    <?php endforeach ?>

        <?php echo csrf_field() ?>
        <?php echo honeypot_field() ?>
      
      <div class="form-field mb-3 submit">
        <button type="submit" value="<?= $contentPage->submitText() ?>" class="btn btn-style-primary"><?= $contentPage->submitText() ?></button>
      </div>
    </form>

    <?php snippet('uniform/errors', ['form' => $form]) ?>
  <?php endif; ?>
</div>