<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Post2Controller;


//Route::get('/', function () {
//    return view('welcome');
//});
//Pour chaque cas ci-dessous, écrire deux versions :
//          Avec Eloquent
//          Avec Query Builder
// Afficher tous les articles de blog
// Détails dʼun article avec auteur et catégorie
// Commentaires dʼun article avec auteurs
// Tags associés à un article
// Rôles dʼun utilisateur
// Utilisateurs avec leur profil
// Articles avec plus de 5 commentaires
// Créer un article pour un utilisateur
// Ajouter des tags à un article
// Les 5 derniers articles avec catégorie, tags et commentaires

// Blog routes
//Route::get('/', [BlogController::class, 'index'])->name('blog.index');
//Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
//Route::get('/blog/{id}/comments', [BlogController::class, 'comments'])->name('blog.comments');
//Route::get('/blog/{id}/tags', [BlogController::class, 'tags'])->name('blog.tags');
//Route::get('/user/{id}/roles', [BlogController::class, 'roles'])->name('blog.roles');
//Route::get('/users-with-profiles', [BlogController::class, 'withProfiles'])->name('blog.withProfiles');
//Route::get('/top-articles', [BlogController::class, 'topArticles'])->name('blog.topArticles');
//Route::get('/latest-articles', [BlogController::class, 'latest'])->name('blog.latest');

// Tag routes
Route::resource('tags', TagController::class);
// Post routes
//Route::resource('posts', PostController::class);

Route::resource('posts', Post2Controller::class);
