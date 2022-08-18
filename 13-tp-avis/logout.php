<?php

require 'config/helpers.php';

unset($_SESSION['user']);

header('Location: index.php');
