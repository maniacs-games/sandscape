<?php

/*
 * index.php
 *
 * (C) 2011, StaySimple team.
 *
 * This file is part of StaySimple.
 *
 * StaySimple is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * StaySimple is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with StaySimple.  If not, see <http://www.gnu.org/licenses/>.
 */

error_reporting(E_ALL);
ini_set('display_errors', true);

//------------- DON'T EDIT BELOW THIS LINE -------------//
session_start();
ini_set('magic_quotes_runtime', 0);
ini_set('log_errors', true);

include '_defs.php';

ini_set('error_log', DATAROOT . '/logs/stay.' . date('ymd') . '.log');
include APPROOT . '/core/helpers/autoload.php';

$app = new StaySimple();
$app->execute();