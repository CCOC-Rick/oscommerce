<?php
/*
  osCommerce Online Merchant $osCommerce-SIG$
  Copyright (c) 2010 osCommerce (http://www.oscommerce.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License v2 (1991)
  as published by the Free Software Foundation.
*/

  use osCommerce\OM\Core\ObjectInfo;
  use osCommerce\OM\Core\Site\Admin\Application\TaxClasses\TaxClasses;
  use osCommerce\OM\Core\OSCOM;

  $OSCOM_ObjectInfo = new ObjectInfo(TaxClasses::getEntry($_GET['rID']));
?>

<h1><?php echo $OSCOM_Template->getIcon(32) . osc_link_object(OSCOM::getLink(), $OSCOM_Template->getPageTitle()); ?></h1>

<?php
  if ( $OSCOM_MessageStack->exists() ) {
    echo $OSCOM_MessageStack->get();
  }
?>

<div class="infoBox">
  <h3><?php echo osc_icon('trash.png') . ' ' . $OSCOM_ObjectInfo->get('tax_class_title') . ': ' . $OSCOM_ObjectInfo->getProtected('geo_zone_name'); ?></h3>

  <form name="rDelete" class="dataForm" action="<?php echo OSCOM::getLink(null, null, 'id=' . $_GET['id'] . '&rID=' . $OSCOM_ObjectInfo->getInt('tax_rates_id') . '&action=EntryDelete'); ?>" method="post">

  <p><?php echo OSCOM::getDef('introduction_delete_tax_rate'); ?></p>

  <p><?php echo '<b>' . $OSCOM_ObjectInfo->getProtected('tax_class_title') . ': ' . $OSCOM_ObjectInfo->getProtected('geo_zone_name') . '</b>'; ?></p>

  <p><?php echo osc_draw_hidden_field('subaction', 'confirm') . osc_draw_button(array('priority' => 'primary', 'icon' => 'trash', 'title' => OSCOM::getDef('button_delete'))) . ' ' . osc_draw_button(array('href' => OSCOM::getLink(null, null, 'id=' . $_GET['id']), 'priority' => 'secondary', 'icon' => 'close', 'title' => OSCOM::getDef('button_cancel'))); ?></p>

  </form>
</div>
