<?php

namespace Drupal\config_form\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ConfigForm extends ConfigFormBase {
    public function getFormId() {
        return "config_form_settings";
    }

    public function getEditableConfigNames() {
        return "config_form.settings";
    }

    public function buildForm(array $form, FormStateInterface $form_state) {
        var_dump("azerty");
        $form['host'] = [
            '#type'=> 'textfield',
            '#title' => 'Adresse du host',
            '#required' => TRUE,
            #'#default_value' => '',
        ];
        $form['port'] = [
            '#type'=> 'textfield',
            '#title' => 'Port',
            '#required' => TRUE,
            '#default_value' => '',
        ];
        $form['login'] = [
            '#type'=> 'textfield',
            '#title' => 'Login du compte',
            '#required' => TRUE,
            '#default_value' => '',
        ];
        $form['password'] = [
            '#type'=> 'password',
            '#title' => 'Mot de passe du compte',
            '#required' => TRUE,
            '#default_value' => '',
        ];

        // Activer ou désactiver les logs api
        $form['enable_logs'] = [
            '#type'=> 'checkbox',
            '#title' => 'Logs API',
            '#options' => array(
                'key1' => 'Activer',
                'key2' => 'Désactiver'),
            '#default_value' => 'key1',
        ];

        // 
        $form['select'] = [
            '#type'=> 'select',
            '#title' => 'Select test',
            '#options' => [
                '1' => 'Un',
                '2' => 'Deux',
                '3' => 'Trois',
            ],
        ];

        // uploader un fichier
        // $form['file'] = [
        //     '#type'=> 'managed_file',
        // ];
        parent::buildForm($form, $form_state);
    }

    public function submitForm(array $form, FormStateInterface $form_state) {
        \Drupal::messenger()->addMessage("Envoi réussi avec succès");
        var_dump($form_state->get('select'));
        die;
        // enregister les champs dans la config
    }
}