<?php
/*
 * @version $Id: HEADER 1 2010-03-03 21:49 Tsmr $
 * -------------------------------------------------------------------------
 * GLPI - Gestionnaire Libre de Parc Informatique
 * Copyright (C) 2003-2010 by the INDEPNET Development Team.
 *
 * http://indepnet.net/ http://glpi-project.org
 * -------------------------------------------------------------------------
 *
 * LICENSE
 *
 * This file is part of GLPI.
 *
 * GLPI is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * GLPI is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with GLPI; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 * --------------------------------------------------------------------------
 * // ----------------------------------------------------------------------
 * // Original Author of file: CAILLAUD Xavier
 * // Purpose of file: plugin webapplications v1.6.0 - GLPI 0.78
 * // ----------------------------------------------------------------------
 */

include '../../../inc/includes.php';

if (! isset($_POST['id'])) {
   exit();
}

if (! isset($_POST["withtemplate"]))
   $_POST["withtemplate"] = "";

$Room = new PluginRoomRoom();

if ($_POST["id"] > 0 && $Room->can($_POST["id"], READ)) {
   switch ($_REQUEST['glpi_tab']) {
      case - 1: // Onglet Tous
         $Room->showComputers($_POST['target'], $_POST["id"]);
         Reservation::showForItem($Room);
         break;
      default: // Logiquement Onglet Principal
         if ($_POST["id"]) {
            if (! CommonGLPI::displayStandardTab($Room, $_POST["id"], $_REQUEST['glpi_tab'])) {
               $Room->showComputers($_POST['target'], $_POST["id"]);
            }
         }
         break;
   }
}
?>