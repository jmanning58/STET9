<?php

function add_invitation($email, $hash) {
    global $db;
    $query = 'INSERT INTO invitations (email, hash) VALUES (:e, :h)';
    $statement = $db->prepare($query);
    $statement->bindValue(':e', $email);
    $statement->bindValue(':h', $hash);
    $statement->execute();
    $statement->closeCursor();
}
function get_invitation_by_hash($hash) {
    global $db;
    $query = 'SELECT * FROM invitations WHERE hash = :h';
    $statement = $db->prepare($query);
    $statement->bindValue(':h', $hash);
    $statement->execute();
    $i = $statement->fetch();
    $statement->closeCursor();
    return $i;
}
function delete_invitation_by_hash($hash) {
    global $db;
    $query = 'DELETE FROM invitations WHERE hash = :h';
    $statement = $db->prepare($query);
    $statement->bindValue(':h', $hash);
    $statement->execute();
    $statement->closeCursor();
    return;
}
function delete_invitation_by_email($email) {
    global $db;
    $query = 'DELETE FROM invitations WHERE email = :e';
    $statement = $db->prepare($query);
    $statement->bindValue(':e', $email);
    $statement->execute();
    $statement->closeCursor();
    return;
}
