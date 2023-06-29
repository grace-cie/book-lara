<?php

namespace App;

class Book
{
     public $id;
     public $title;
     public $author;
     public $publisher;
     public $publication_date;
     public $isbn;
     public $price;
     public $genre;
     public $quantity;

     public function __construct($id, $title, $author, $publisher, $publication_date, $isbn, $price, $genre, $quantity)
     {
          $this->id = $id;
          $this->title = $title;
          $this->author = $author;
          $this->publisher = $publisher;
          $this->publication_date = $publication_date;
          $this->isbn = $isbn;
          $this->price = $price;
          $this->genre = $genre;
          $this->quantity = $quantity;
     }

     public static function findAll()
     {
          $file = '../books1.json';
          $booksJson = file_get_contents($file);
          $booksData = json_decode($booksJson, true);

          $books = [];

          foreach ($booksData as $bookData) {
               $book = new self(
                    $bookData['id'],
                    $bookData['title'],
                    $bookData['author'],
                    $bookData['publisher'],
                    $bookData['publication_date'],
                    $bookData['isbn'],
                    $bookData['price'],
                    $bookData['genre'],
                    $bookData['quantity']
               );

               $books[] = $book;
          }

          return $books;
     }

     public static function findById($id)
     {
          $books = self::findAll();

          foreach ($books as $book) {
               if ($book->id == $id) {
                    return $book;
               }
          }

          return null;
     }


     public static function findByGenre($genre)
     {
          $books = self::findAll();

          $filteredBooks = array_filter($books, function ($book) use ($genre) {
               return $book->genre === $genre;
          });

          return array_values($filteredBooks);
     }
}