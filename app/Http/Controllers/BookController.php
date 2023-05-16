<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Psy\Readline\Hoa\Console;

class BookController extends Controller
{
    // books
    private $books = [
        [
            'title' => 'To Kill a Mockingbird',
            "author" => "Harper Lee"
        ],
        [
            'title' => '1984',
            "author" => "George Orwell"
        ],
        [
            'title' => 'Pride and Prejudice',
            "author" => "Jane Austen"
        ],
        [
            'title' => 'The Catcher in the Rye',
            "author" => "J.D. Salinger"
        ],
        [
            'title' => 'The Great Gatsby',
            "author" => "F. Scott Fitzgerald"
        ]
    ];

    // GET
    public function books(Request $request): array {
        $limit = $request->query('limit', 0);

        if($limit == 0) {
            return $this->books;
        } else {
            return array_splice($this->books, 0, $limit);
        }

    }

    // GET
    public function getbook($id): array {
        $bookId = $id - 1;
        
        return $this->books[$bookId];
    }
    
    // GET
    public function getbookField($id, $field): string {
        $bookId = $id - 1;
        $book = $this->books[$bookId];

        return $book[$field];
    }

    // POST
    public function createBook(Request $request): string {
        $title = $request->get('title');
        $author = $request->get('author');
        return "title: {$title}. author: {$author}";
    }
    
    // POST
    public function getHeader(Request $request): string {
        $UserAgent = $request->header('User-Agent'); 
        $token = $request->header('token', 'deynai'); 
        return "User-Agent: {$UserAgent}. token {$token}";
    }
}
