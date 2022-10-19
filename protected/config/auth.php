<?php

return array(
    'guest' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Guest',
        'bizRule' => null,
        'data' => null
    ),
    'user' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'User',
        'children' => array(
            'guest'
        ),
        'bizRule' => null,
        'data' => null
    ),
    'admin' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Admin',
        'children' => array(
            'user',
            'guest'
        ),
        'bizRule' => null,
        'data' => null
    ),
    'supervisor' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Supervisor',
        'children' => array(
            'admin',
            'user',
            'guest'
        ),
        'bizRule' => null,
        'data' => null,
    )
);
