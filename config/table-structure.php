<?php

return [
    'title' => 'Post Information',
    'icon' => 'Profile',
    'actionButton' => [
        'label' => 'Edit',
        'icon' => 'EditOutline',
        'targetComponent' => 'Form',
        'placement' => 'top',
    ],
    'columns' => [
        [
            'title' => 'Title',
            'dataIndex' => 'title',
            'shorter' => true,
        ],
        [
            'title' => 'Description',
            'dataIndex' => 'description',
        ],
        [
            'title' => 'Status',
            'dataIndex' => 'status',
        ],
        // [
        //     'name' => 'Category',
        //     'dataIndex' => 'category_name',
        // ],
        [
            'title' => 'Action',
            'key' => 'action',
            'renderOptions' => [
                'action' => [
                    'type' => 'button',
                    'text' => 'Delete',
                    'icon' => 'Delete',
                    'style' => [
                        'color' => 'red',
                        'background' => 'lightred',
                    ],
                    'onClick' => [
                        'type' => 'delete',
                        'endpoint' => 'https://jsonplaceholder.typicode.com/posts/delete/{ID}',
                    ],
                ],
            ],
        ],
        [
            'title' => '...',
            'key' => '...',
            'renderOptions' => [
                'action' => [
                    'type' => 'button',
                    'icon' => 'Delete',
                    'menuItems' => [
                        [
                            'text' => 'Delete',
                            'onClick' => [
                                'type' => 'delete',
                                'endpoint' => 'https://jsonplaceholder.typicode.com/posts/delete/{ID}',
                            ],
                        ],
                        [
                            'text' => 'Edit',
                            'onClick' => [
                                'type' => 'edit',
                                'targetComponent' => 'Form',
                                'props' => [
                                    'id' => 'dataIndexofID',
                                    'email' => 'user_email', // dataIndexofEmail
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'props' => [
        'cellBorder' => false,
        'pagination' => [
            'position' => 'topLeft',
            'pageSize' => 10,
            'disabled' => false,
            'onChange' => 'onChange',
            'total' => 100,
        ],
        'footer' => 'Footer Text',
        'fixedHeader' => false,
        'size' => 'large',
        'rowSelection' => [
            'type' => 'checkbox',
        ],
        'style' => [
            'backgroundColor' => 'white',
        ],
    ]
];