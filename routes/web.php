<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Menampilkan seluruh isi tabel buku
$router->get('/books', 'BooksController@index');

// Menampilkan buku berdasarkan id dari tabel
$router->get('/books/{id}', 'BooksController@show');

// Menambahkan buku baru ke dalam tabel
$router->post('books', 'BooksController@store');

// Mengupdate buku berdasarkan id dari tabel
$router->put('books/{id}', 'BooksController@update');

//Menghapus buku berdasarkan id dari tabel
$router->delete('books/{id}', 'BooksController@destroy');

// Menampilkan seluruh isi tabel pengarang
$router->get('/authors', 'AuthorsController@index');

// Menampilkan pengarang berdasarkan id dari tabel
$router->get('/authors/{id}', 'AuthorsController@show');

// Menambahkan pengarang baru ke dalam tabel
$router->post('authors', 'AuthorsController@store');

// Mengupdate pengarang berdasarkan id dari tabel
$router->put('authors/{id}', 'AuthorsController@update');

//Menghapus pengarang berdasarkan id dari tabel
$router->delete('authors/{id}', 'AuthorsController@destroy');