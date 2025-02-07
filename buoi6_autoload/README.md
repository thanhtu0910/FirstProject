{
    "name": "hello/buoi6_autoload",
    "description": "hehe",
    "type": "library",
    "autoload": {
        "psr-4": {
            // "Hello\\Buoi6Autoload\\": "app/"
            "App\\": "app/"
        }
    },
    "authors": [
        {
            "name": "ThreeT"
        }
    ],
    "require": {}
}

Câu  lệnh composer -dump autoload nó nhẹ hơn install , nó chỉ reload autoload