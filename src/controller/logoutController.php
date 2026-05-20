<?php
require_once __DIR__ . '/../lib/Session.php';
Session::start();

$sid = Session::id();
require_once __DIR__ . '/../lib/SessionStorage.php';
SessionStorage::delete($sid);
Session::destroy();
require_once __DIR__ . '/../lib/App.php';
App::redirect('login');
