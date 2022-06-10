<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'sport' => [
        'title' => 'Sports',

        'actions' => [
            'index' => 'Sports',
            'create' => 'New Sport',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'sport' => 'Sport',
            'description' => 'Description',
            'image' => 'Image',
            
        ],
    ],

    'award' => [
        'title' => 'Awards',

        'actions' => [
            'index' => 'Awards',
            'create' => 'New Award',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'award' => 'Award',
            'description' => 'Description',
            'image' => 'Image',
            
        ],
    ],

    'doc' => [
        'title' => 'Docs',

        'actions' => [
            'index' => 'Docs',
            'create' => 'New Doc',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'doc_type' => 'Doc type',
            
        ],
    ],

    'competence' => [
        'title' => 'Competences',

        'actions' => [
            'index' => 'Competences',
            'create' => 'New Competence',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'sport_id' => 'Sport',
            'categorie_id' => 'Categorie',
            'quantity_of_participants' => 'Quantity of participants',
            
        ],
    ],

    'score' => [
        'title' => 'Scores',

        'actions' => [
            'index' => 'Scores',
            'create' => 'New Score',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'participant' => [
        'title' => 'Participants',

        'actions' => [
            'index' => 'Participants',
            'create' => 'New Participant',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'number_id' => 'Number',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'birthday' => 'Birthday',
            'doc_id' => 'Doc',
            'force_id' => 'Force',
            'nationality_id' => 'Nationality',
            
        ],
    ],

    'nationality' => [
        'title' => 'Nationalities',

        'actions' => [
            'index' => 'Nationalities',
            'create' => 'New Nationality',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nationality' => 'Nationality',
            'flag_image' => 'Flag image',
            
        ],
    ],

    'category' => [
        'title' => 'Categories',

        'actions' => [
            'index' => 'Categories',
            'create' => 'New Category',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'categorie' => 'Categorie',
            'description' => 'Description',
            'image' => 'Image',
            
        ],
    ],

    'force' => [
        'title' => 'Forces',

        'actions' => [
            'index' => 'Forces',
            'create' => 'New Force',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'force' => 'Force',
            'description' => 'Description',
            'image' => 'Image',
            
        ],
    ],

    'doc' => [
        'title' => 'Docs',

        'actions' => [
            'index' => 'Docs',
            'create' => 'New Doc',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'doc_type' => 'Doc type',
            
        ],
    ],

    'sport' => [
        'title' => 'Sports',

        'actions' => [
            'index' => 'Sports',
            'create' => 'New Sport',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'sport' => 'Sport',
            'description' => 'Description',
            'image' => 'Image',
            
        ],
    ],

    'award' => [
        'title' => 'Awards',

        'actions' => [
            'index' => 'Awards',
            'create' => 'New Award',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'award' => 'Award',
            'description' => 'Description',
            'image' => 'Image',
            
        ],
    ],

    'category' => [
        'title' => 'Categories',

        'actions' => [
            'index' => 'Categories',
            'create' => 'New Category',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'categorie' => 'Categorie',
            'description' => 'Description',
            'image' => 'Image',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];