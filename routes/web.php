<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/login', function () {
    //echo 'funciona /';
    return view('login');
})->name('login');;


Route::get('/register', function () {
    echo "register";
})->name('register');



Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/sepultamentos', 'SepultamentoController');
    Route::post('/sepultamentos/pesquisar', 'SepultamentoController@pesquisar');
    Route::get('/sepultamentos/{sepultamento}/ver_certidao_obito', 'SepultamentoController@verCertidaoObito');
    Route::get('/sepultamentos/{sepultamento}/download_certidao_obito', 'SepultamentoController@downloadCertidaoObito');
    Route::get('/sepultamentos/{sepultamento}/deletar_certidao_obito', 'SepultamentoController@deletarCertidaoObito');
    
    Route::get('/sepultamentos/pesquisar/resultados/{offset?}/{limit?}', 'SepultamentoController@resultadoPesquisa');
    
    
});


