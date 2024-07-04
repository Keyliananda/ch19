<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Create Note';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    $body = trim($_POST['body']);

    if (strlen($body) === 0) {

        $errors['body'] = 'A Body is required';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }


}

require 'views/note-create.view.php';