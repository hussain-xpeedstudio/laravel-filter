<?php

return [
    'fieldTypes' => [
        'string' => [
            'contains' => [
                'label' => 'Contains',
                'condition' => '$contains',
            ],
            'starts_with' => [
                'label' => 'Starts With',
                'condition' => '$startsWith',
            ],
            'does_not_contain' => [
                'label' => "Doesn't Contain",
                'condition' => ' $notContains',
            ],
            'ends_with' => [
                'label' => 'Ends With',
                'condition' => '$endsWith',
            ],
            'is_empty' => [
                'label' => 'Is Empty',
                'condition' => '$null',
            ],
            'is_not_empty' => [
                'label' => 'Is Not Empty',
                'condition' => '$notNull',
            ],
        ],
        'text' => [
            'contains' => [
                'label' => 'Contains',
                'condition' => '$contains',
            ],
            'starts_with' => [
                'label' => 'Starts With',
                'condition' => '$startsWith',
            ],
            'does_not_contain' => [
                'label' => "Doesn't Contain",
                'condition' => ' $notContains',
            ],
            'ends_with' => [
                'label' => 'Ends With',
                'condition' => '$endsWith',
            ],
            'is_empty' => [
                'label' => 'Is Empty',
                'condition' => '$null',
            ],
            'is_not_empty' => [
                'label' => 'Is Not Empty',
                'condition' => '$notNull',
            ],
        ],
        'textarea' => [
            'contains' => [
                'label' => 'Contains',
                'condition' => '$contains',
            ],
            'starts_with' => [
                'label' => 'Starts With',
                'condition' => '$startsWith',
            ],
            'does_not_contain' => [
                'label' => "Doesn't Contain",
                'condition' => ' $notContains',
            ],
            'ends_with' => [
                'label' => 'Ends With',
                'condition' => '$endsWith',
            ],
            'is_empty' => [
                'label' => 'Is Empty',
                'condition' => '$null',
            ],
            'is_not_empty' => [
                'label' => 'Is Not Empty',
                'condition' => '$notNull',
            ],
        ],
        'number' => [
            '=' => [
                'label' => 'Equal',
                'condition' => '$eq',
            ],
            '>' => [
                'label' => 'Greater Than',
                'condition' => '$gt',
            ],
            '<' => [
                'label' => 'Less Than',
                'condition' => '$lt',
            ],
            '>=' => [
                'label' => 'Greater Than or Equal To',
                'condition' => '$gte',
            ],
            '<=' => [
                'label' => 'Less Than or Equal To',
                'condition' => '$lte',
            ],
        ],
        'numeric' => [
            '=' => [
                'label' => 'Equal',
                'condition' => '$eq',
            ],
            '>' => [
                'label' => 'Greater Than',
                'condition' => '$gt',
            ],
            '<' => [
                'label' => 'Less Than',
                'condition' => '$lt',
            ],
            '>=' => [
                'label' => 'Greater Than or Equal To',
                'condition' => '$gte',
            ],
            '<=' => [
                'label' => 'Less Than or Equal To',
                'condition' => '$lte',
            ],
        ],
        'date' => [
            'equal' => [
                'label' => 'Equal',
                'condition' => '$eq',
            ],
            'before' => [
                'label' => 'Before',
                'condition' => '$lt',
            ],
            'before_or_equal' => [
                'label' => 'Before or Equal',
                'condition' => '$lte',
            ],
            'after' => [
                'label' => 'After',
                'condition' => '$gt',
            ],
            'after_or_equal' => [
                'label' => 'After or Equal',
                'condition' => '$gte',
            ],
            'between' => [
                'label' => 'Between',
                'condition' => '$between',
            ],
            'is_empty' => [
                'label' => 'Is Empty',
                'condition' => '$null',
            ],
            'is_not_empty' => [
                'label' => 'Is Not Empty',
                'condition' => '$notNull',
            ],
        ],
        'boolean' => [
            'true' => [
                'label' => 'True',
                'condition' => '$eq',
            ],
            'false' => [
                'label' => 'False',
                'condition' => '$eq',
            ],
        ],
        'select' => [
            'WhereIn' => [
                'label' => 'Where In',
                'condition' => '$in',
            ],

        ],
        'dropdown' => [
            'WhereIn' => [
                'label' => '',
                'condition' => '$in',
            ],

        ],
    ],
    'row_limit' => 5,
    'column_limit' => 3,
    'allRules' => [
        'text' => [
            '$eq' => [
                'label' => 'Is',
                'field' => [
                    'placeholder' => 'Enter value',
                    'type' => 'text',
                ],
            ],
            '$ne' => [
                'label' => 'Is Not',
                'field' => [
                    'placeholder' => 'Enter value',
                    'type' => 'text',
                ],
            ],
            '$contains' => [
                'label' => 'Contains',
                'field' => [
                    'placeholder' => 'Enter value',
                    'type' => 'text',
                ],
            ],
            '$notContains' => [
                'label' => 'Does Not Contain',
                'field' => [
                    'placeholder' => 'Enter value',
                    'type' => 'text',
                ],
            ],
            '$startsWith' => [
                'label' => 'Starts With',
                'field' => [
                    'placeholder' => 'Enter value',
                    'type' => 'text',
                ],
            ],
            '$endsWith' => [
                'label' => 'Ends With',
                'field' => [
                    'placeholder' => 'Enter value',
                    'type' => 'text',
                ],
            ],
            '$null' => [
                'label' => 'Is Empty',
                'field' => null,
            ],
            '$notNull' => [
                'label' => 'Is Not Empty',
                'field' => null,
            ],
        ],
        'number' => [
            '$eq' => [
                'label' => '=',
                'field' => [
                    'placeholder' => 'Enter value',
                    'type' => 'number',
                ],
            ],
            '$ne' => [
                'label' => '!=',
                'field' => [
                    'placeholder' => 'Enter value',
                    'type' => 'number',
                ],
            ],
            '$gt' => [
                'label' => '>',
                'field' => [
                    'placeholder' => 'Enter value',
                    'type' => 'number',
                ],
            ],
            '$lt' => [
                'label' => '<',
                'field' => [
                    'placeholder' => 'Enter value',
                    'type' => 'number',
                ],
            ],
            '$gte' => [
                'label' => '>=',
                'field' => [
                    'placeholder' => 'Enter value',
                    'type' => 'number',
                ],
            ],
            '$lte' => [
                'label' => '<=',
                'field' => [
                    'placeholder' => 'Enter value',
                    'type' => 'number',
                ],
            ],
            '$null' => [
                'label' => 'Is Empty',
                'field' => null,
            ],
            '$notNull' => [
                'label' => 'Is Not Empty',
                'field' => null,
            ],
        ],
        'date' => [
            '$eq' => [
                'label' => 'Equal',
                'field' => '',
            ],
            'before' => [
                'label' => 'Before',
                'condition' => '$lt',
            ],
            'before_or_equal' => [
                'label' => 'Before or Equal',
                'condition' => '$lte',
            ],
            'after' => [
                'label' => 'After',
                'condition' => '$gt',
            ],
            'after_or_equal' => [
                'label' => 'After or Equal',
                'condition' => '$gte',
            ],
            'between' => [
                'label' => 'Between',
                'condition' => '$between',
            ],
            'is_empty' => [
                'label' => 'Is Empty',
                'condition' => '$null',
            ],
            'is_not_empty' => [
                'label' => 'Is Not Empty',
                'condition' => '$notNull',
            ],
        ],

    ],

];
