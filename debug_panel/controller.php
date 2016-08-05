<?php
namespace Concrete\Package\DebugPanel;

use Concrete\Core\Page\Page;
use Concrete\Core\View\View;
use Core;
use Events;
use Package;
use Permissions;

class Controller extends Package
{
    /**
     * @var string Package handle.
     */
    protected $pkgHandle = 'debug_panel';

    /**
     * @var string Required concrete5 version.
     */
    protected $appVersionRequired = '5.7.5';

    /**
     * @var string Package version.
     */
    protected $pkgVersion = '0.1';

    /**
     * @var boolean Remove \Src from package namespace.
     */
    protected $pkgAutoloaderMapCoreExtensions = true;

    /**
     * Returns the translated package description.
     *
     * @return string
     */
    public function getPackageDescription()
    {
        return t('Show debug information of current request');
    }

    /**
     * Returns the installed package version.
     *
     * @return string
     */
    public function getPackageName()
    {
        return t('Debug Panel');
    }

    public function on_start()
    {
        /** @var \Concrete\Core\Application\Service\UserInterface\Menu $menuHelper */
        $menuHelper = Core::make('helper/concrete/ui/menu');
        $menuHelper->addPageHeaderMenuItem('debug_panel', $this->pkgHandle, array(
            'icon' => 'bug',
            'label' => t('Debug'),
            'position' => 'left',
            'href' => '#',
            'linkAttributes' => array(
                'id' => 'debug-panel-launcher',
            ),
        ));

        Events::addListener('on_start', function($event) {
            /** @var View $view */
            $view = $event->getArgument('view');
            $items = $view->getScopeItems();
            if (isset($items['c'])) {
                /** @var Page $c */
                $c = $items['c'];
                $cp = new Permissions($c);
                if ($cp->canViewToolbar() && !$c->isAdminArea()) {
                    ob_start();
                    View::element('debug_panel', array(
                        'c' => $c,
                        'view' => $items['view'],
                        'request' => $items['view']->getRequestInstance(),
                        'controller' => $items['controller']
                    ), 'debug_panel');
                    $contents = ob_get_contents();
                    ob_end_clean();
                    $view->addFooterItem($contents);
                }
            }
        });
    }
}
