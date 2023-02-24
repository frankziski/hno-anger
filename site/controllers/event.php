<?php

use Uniform\Form;

return function ($kirby, $page)
{
    $pageForm = null;

    if($page->allowRegistration()->bool()) {
        $pageForm = $page->parent();
        
        $formFields = array();
        $nameMailfield = 'email';

        foreach ($pageForm->formBuilder()->toStructure() as $formfield) {

            if($formfield->fieldRequired()->bool()) {
                $formFieldData['required'] = true;
            }else {
                $formFieldData['required'] = false;
            }

            if($formfield->fieldType() == 'mail-input') {
                $formFieldData['validation'] = 'email';
                $nameMailfield = $formfield->fieldName();
            }else {
                $formFieldData['validation'] = null;
            }

            if($formfield->fieldError()->isNotEmpty()) {
                $formFieldData['message'] = $formfield->fieldError();
            } else {
                $formFieldData['message'] = 'Bitte füllen Sie das Feld '.$formfield->fieldLabel().' aus.';
            }

            $formFields[$formfield->fieldName()->value()] = $formFieldData;
        }
        
        $formConfig = [];
        foreach($formFields as $key => $config) {
            $formConfig[$key] = [];
            $rules   = [];
            $message = null;
            
            if(array_key_exists('required', $config) && !!$config['required']) {
                $rules[] = 'required';
            }
            if(array_key_exists('validation', $config) && !!$config['validation']) {
                $rules[] = $config['validation'];
            }
            if(array_key_exists('message', $config) && !!$config['message']) {
                $message = $config['message'];
            }
        
            if(count($rules) > 0) {
                $formConfig[$key]['rules'] = $rules;
            }
            if(!!$message) {
                $formConfig[$key]['message'] = $message;
            }    
        }
        
        $form = new Form($formConfig);

        if ($kirby->request()->is('POST')) {

            // send separate Mails to every address in the List
            foreach($pageForm->mailTo()->toStructure() as $mailto) {
                $form->emailAction([
                    'to' => $mailto->mailToAddress()->toString(),
                    'from' => $pageForm->mailFrom()->toString(),
                    'replyTo' => $form->data($nameMailfield->toString()),
                    'subject' => $pageForm->mailSubject()->toString(),
                    'template' => 'contactform'
                ]);
            }

            // send a copy to the user if option is true in the backend
            if($pageForm->mailToSender()->bool()) {
                $form->emailAction([
                    'to' => $form->data($nameMailfield->toString()),
                    'from' => $pageForm->mailFrom()->toString(),
                    'subject' => $pageForm->mailToSenderSubject()->toString(),
                    'data' => [
                        'customBody' => $pageForm->mailtoSenderText()
                    ],
                    'template' => 'contactform-user'
                ]);
            }
        }
        return compact('form');
    }
};