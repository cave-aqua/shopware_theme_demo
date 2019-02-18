<?php

namespace Shopware\Themes\config_theme;

use Doctrine\Common\Collections\ArrayCollection;
use Shopware\Components\Form;
use Shopware\Components\Theme\ConfigSet;

class Theme extends \Shopware\Components\Theme
{
    protected $extend = 'Responsive';
    protected $name = 'config_theme';
    protected $description = '';
    protected $author = '';
    protected $license = '';
    protected $inheritanceConfig = false;

    //voor plugins
    protected $javascript = [
        'src/js/jquery.cart-animation.js',
        'src/js/jquery.scroll-nav.js'
    ];
    public function createConfig(Form\Container\TabContainer $container)
    {
        //$tab = $this->createTab('first_tab', 'My_first_tab', []);/* Maakt een tab aam */
        //$fieldset = $this->createFieldSet('first_fieldset', 'My_fieldset', []);/* Creërt eem tekstveld */
        //$txtfield = $this->createTextField('first_fieldset', 'My first textfield', 'Default value' ,[]);/* creërt een input */

        //$fieldset->addElement($txtfield);/* voegt de input aan de textfield */
        //$tab->addElement($fieldset);/* voegt de textfield aan de tab */
        //$container->addTab($tab);/* voegt de tab aan de container */

        $tabpanel = $this->createTabPanel('main_tab_panel');

        $tabpanel->addTab($this->createColorTab());
        $tabpanel->addTab($this->createSettingTab());
        $tab = $this->createTab('main_tab', 'Workshop Tab');

        
        $tab->addElement($tabpanel);
        $container->addElement($tab);
    }
    /* Gives the created tab back to createConfig */
    private function createColorTab()
    {
        $tab = $this->createTab('color_tab', 'Colors');
        $fieldset = $this->createFieldSet('color_fieldset', 'Colors', []);
        $bgc = $this->createColorPickerField('backgroundColor', 'background color', '#ff0000');
        $primc = $this->createColorPickerField('brand-primary', 'primary color', '#ffCCCC');

        $fieldset->addElement($bgc);
        $fieldset->addElement($primc);
        $tab->addElement($fieldset);
      return $tab;

    }
    private function createSettingTab()
    {
        $sloganField = $this->createTextField(
            'themeSlogan', 
            'Slogans', 
            '', 
            ['attributes' => ['lessCompatible' => false,
            'anchor' => '100%'
            ]]);
        
        
        $scrollNavField = $this->createCheckboxField(
            'scrollNav',
            'Scroll navigation',
            true
        );

        $scrollnavpos = $this->createNumberField(
            'scrollNavDisplayPosition',
            'Display position',
            300
        );



        $settingsFieldset = $this->createFieldSet('settings_fieldset', 'Setting options');
        
        $settingsFieldset->addElement($sloganField);
        $settingsFieldset->addElement($scrollNavField);
        $settingsFieldset->addElement($scrollnavpos);

        $tab = $this->createTab('settings_tab', 'Settings');

        $tab->addElement($settingsFieldset);
        return $tab;
    }
    public function createConfigSets(ArrayCollection $collection){
        /* $greenSet = new ConfigSet();
        $greenSet->setName('Green set');
        $greenSet->setDescription('Everything is green');
        $greenSet->setValues([
           'backgroundColor' => '#4db649',
           'brand-primary' => '#38f50a'
        ]);  maakt een configset aan*/ 

        //configset d.m.v. een method
        /* $greenSet = $this->createConfigSet('Groene set', 'Everthing is groen', '#4db649', '#38f50a');
        $blueSet = $this->createConfigSet('Blauwe set', 'Everthing is blauw', '#0080ff', '#0080c0');
        $collection->add($greenSet);      
        $collection->add($blueSet); */ 

        $sets = [
            'green' => [
                'name' => 'Green set',
                'desc' => 'Everthing is groen',
                'values' => [
                    'backgroundColor' => '#4db649',
                    'brand-primary' => '#38f50a'
                ]
            ],
            'blue' => [
                'name' => 'Blauwe set',
                'desc' => 'Everthing is blauw',
                'values' => [
                    'backgroundColor' => '#0080ff',
                    'brand-primary' => '#0080c0'
                ]
            ],
        ];

        foreach ($sets as $set) {
            $set = $this->createConfigSet($set);
            $collection->add($set); 
        }
    }
    private function createConfigSet($s){
        $set = new ConfigSet();
        $set->setName($s['name']);
        $set->setDescription($s['desc']);
        $set->setValues($s['values']);
        return $set;
    }
   
}