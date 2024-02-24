<?php

$posts = [
    [

        "id" => 123,
        "title" => "Example Post",
        "content" => "This is the content of the post. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        "comments" => [
        [
            "id" => 1,
            "author" => "Alice",
            "comment" => "Great post! Thanks for sharing."
        ],
        [
            "id" => 2,
            "author" => "Bob",
            "comment" => "I enjoyed reading this."
        ],
        [
            "id" => 3,
            "author" => "Charlie",
            "comment" => "Looking forward to more content like this."
        ]
      ]

        ],


    [

        "id" => 124,
        "title" => "Example Second Post",
        "content" => "This is the content of the post. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        "comments" => [
        [
            "id" => 1,
            "author" => "Alice",
            "comment" => "Great post! Thanks for sharing."
        ],
        [
            "id" => 2,
            "author" => "Bob",
            "comment" => "I enjoyed reading this."
        ],
        [
            "id" => 3,
            "author" => "Charlie",
            "comment" => "Looking forward to more content like this."
        ]
      ]

    ]
    
];

foreach ($posts as $post) {

    echo "Post Title: {$post["title"]}<br>";
    echo "Post Content: {$post["content"]}<br><br>";
    echo "Comment ----";
    
    foreach ($post['comments'] as $comment) {

        echo "User : {$comment['author']}<br>, Message :  {$comment['comment']}<br><br>";

    }
}


?>