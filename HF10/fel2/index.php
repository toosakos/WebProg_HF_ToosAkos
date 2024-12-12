<?php
$jsonData = '[
    {
        "title": "The Catcher in the Rye",
        "author": "J.D. Salinger",
        "publication_year": 1951,
        "category": "Fiction"
    },
    {
        "title": "To Kill a Mockingbird",
        "author": "Harper Lee",
        "publication_year": 1960,
        "category": "Fiction"
    },
    {
        "title": "1984",
        "author": "George Orwell",
        "publication_year": 1949,
        "category": "Dystopian"
    },
    {
        "title": "The Great Gatsby",
        "author": "F. Scott Fitzgerald",
        "publication_year": 1925,
        "category": "Fiction"
    },
    {
        "title": "Brave New World",
        "author": "Aldous Huxley",
        "publication_year": 1932,
        "category": "Dystopian"
    }
]';

$books = json_decode($jsonData, true);

$categorizedBooks = [];
foreach ($books as $book) {
    $category = $book['category'];
    if (!isset($categorizedBooks[$category])) {
        $categorizedBooks[$category] = [];
    }
    $categorizedBooks[$category][] = $book;
}

echo "<table border='1'>";
foreach ($categorizedBooks as $category => $books) {
    echo "<tr><th colspan='3'>" . $category . "</th></tr>";
    echo "<tr><th>Title</th><th>Author</th><th>Publication Year</th></tr>";
    foreach ($books as $book) {
        echo "<tr>";
        echo "<td>" . $book['title'] . "</td>";
        echo "<td>" . $book['author'] . "</td>";
        echo "<td>" . $book['publication_year'] . "</td>";
        echo "</tr>";
    }
}
echo "</table>";
?>