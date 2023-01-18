<?php
session_start();

// db
require_once __DIR__ . '/db.php';

require_once __DIR__ . '/database.php';

// class
require_once __DIR__ . '/class/DbObject.php';
require_once __DIR__ . '/class/ContactForm.php';

// db manager
require_once __DIR__ . '/class/DbManager.php';

$dbManager = new DbManager($db);

// utils
require_once __DIR__ . '/utils/errors.php';
