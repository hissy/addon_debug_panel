<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
<div id="ccm-panel-debug"
     class="ccm-panel ccm-panel-left ccm-panel-transition-slide">
    <div class="ccm-panel-content-wrapper ccm-ui">
        <div class="ccm-panel-content ccm-panel-content-visible">
            <h4><?php echo t('Current Page'); ?></h4>
            <table class="table table-condensed">
                <tbody>
                    <tr>
                        <th colspan="2" class="text-center"><?php echo t('Basic'); ?></th>
                    </tr>
                    <tr>
                        <th><?php echo t('ID'); ?></th>
                        <td><?php echo $c->getCollectionID(); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo t('Path'); ?></th>
                        <td><?php echo $c->getCollectionPath(); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo t('Is Single Page?'); ?></th>
                        <td><?php echo ($c->isGeneratedCollection()) ? t('Yes') : t('No'); ?></td>
                    </tr>
                    <?php if ($c->isGeneratedCollection()) { ?>
                        <tr>
                            <th><?php echo t('File Name'); ?></th>
                            <td><?php echo $c->getCollectionFilename(); ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <th><?php echo t('Is Active?'); ?></th>
                        <td><?php echo ($c->isActive()) ? t('Yes') : t('No'); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo t('Is Draft Page?'); ?></th>
                        <td><?php echo ($c->isPageDraft()) ? t('Yes') : t('No'); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo t('Is Master Page?'); ?></th>
                        <td><?php echo ($c->isMasterCollection()) ? t('Yes') : t('No'); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo t('Master Page ID'); ?></th>
                        <td><?php echo $c->getMasterCollectionID(); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo t('Display Order'); ?></th>
                        <td><?php echo $c->getCollectionDisplayOrder(); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo t('Parent Page ID'); ?></th>
                        <td><?php echo $c->getCollectionParentID(); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo t('Number of Children'); ?></th>
                        <td><?php echo $c->getNumChildren(); ?></td>
                    </tr>
                    <tr>
                        <th colspan="2" class="text-center"><?php echo t('Page Type'); ?></th>
                    </tr>
                    <tr>
                        <th><?php echo t('Name'); ?></th>
                        <td><?php echo $c->getPageTypeName(); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo t('ID'); ?></th>
                        <td><?php echo $c->getPageTypeID(); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo t('Handle'); ?></th>
                        <td><?php echo $c->getPageTypeHandle(); ?></td>
                    </tr>
                    <?php if (is_object($c->getPageTemplateObject())) { ?>
                    <tr>
                        <th colspan="2" class="text-center"><?php echo t('Page Template'); ?></th>
                    </tr>
                    <tr>
                        <th><?php echo t('Name'); ?></th>
                        <td><?php echo $c->getPageTemplateObject()->getPageTemplateDisplayName(); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo t('ID'); ?></th>
                        <td><?php echo $c->getPageTemplateID(); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo t('Handle'); ?></th>
                        <td><?php echo $c->getPageTemplateObject()->getPageTemplateHandle(); ?></td>
                    </tr>
                    <?php } ?>
                    <?php if (is_object($c->getCollectionThemeObject())) { ?>
                    <tr>
                        <th colspan="2" class="text-center"><?php echo t('Page Theme'); ?></th>
                    </tr>
                    <tr>
                        <th><?php echo t('Name'); ?></th>
                        <td><?php echo $c->getCollectionThemeObject()->getThemeDisplayName(); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo t('ID'); ?></th>
                        <td><?php echo $c->getCollectionThemeObject()->getThemeID(); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo t('Handle'); ?></th>
                        <td><?php echo $c->getCollectionThemeObject()->getThemeHandle(); ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="2" class="text-center"><?php echo t('Permission Inheritance'); ?></th>
                    </tr>
                    <tr>
                        <th><?php echo t('Type'); ?></th>
                        <td><?php echo $c->getCollectionInheritance(); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo t('Inherit from'); ?></th>
                        <td><?php echo $c->getPermissionsCollectionID(); ?></td>
                    </tr>
                </tbody>
            </table>
            <?php $sessionAttributes = Session::all(); ?>
            <?php if (is_array($sessionAttributes)) { ?>
            <h4><?php echo t('Session'); ?></h4>
            <table class="table table-condensed">
                <tbody>
                    <?php foreach ($sessionAttributes as $key => $value) { ?>
                    <tr>
                        <th class="break"><?php echo h($key); ?></th>
                        <td><?php print_r($value); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } ?>
            <h4><?php echo t('Controller'); ?></h4>
            <table class="table table-condenced">
                <tbody>
                    <tr>
                        <th><?php echo t('Class'); ?></th>
                        <td><?php echo get_class($controller); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo t('Action'); ?></th>
                        <td><?php echo $controller->getAction(); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo t('Parameter'); ?></th>
                        <td><?php print_r($controller->getParameters()); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>