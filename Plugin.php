<?php namespace MartiniMultimedia\Contact;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public $require = ['RainLab.Translate'];

    public function registerComponents()
    {
    	return [
                'MartiniMultimedia\Contact\Components\ContactForm' => 'contactform',
                'MartiniMultimedia\Contact\Components\NewsletterForm' => 'newsletterform'
    	];
    }
    public function registerPageSnippets()
    {
        return [
            'MartiniMultimedia\Contact\Components\ContactForm' => 'contactform',
            'MartiniMultimedia\Contact\Components\NewsletterForm' => 'newsletterform'
        ];        
    }   

    /**
     * Registers any back-end settings.
     *
     * @return array
     */
    public function registerSettings()
    {
        return [
            'config' => [
                'label'       => 'martinimultimedia.contact::lang.plugin.name',
                'description' => 'martinimultimedia.contact::lang.plugin.manage_settings',
                'category'    => 'system::lang.system.categories.cms',
                'icon'        => 'icon-envelope',
                'class'       => 'MartiniMultimedia\Contact\Models\Settings',
                'order'       => 500,
                'keywords'    => 'search',
                'permissions' => ['martinimultimedia.contact.manage_settings']
            ],
        ];
    }
}
