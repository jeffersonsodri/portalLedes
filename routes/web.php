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

use Illuminate\Support\Facades\Route;

//Home
Route::get('/', "NoticesGeneralController@index")->name('home');

// Auth::routes();


// Rota para o Login
Route::get('/login', 'AutenticacaoController@login')->name('login');
Route::post('/logar', 'AutenticacaoController@logar')->name('logar');
Route::get('/logout', 'AutenticacaoController@logout')->name('logout');


//Membros
Route::get('/listarMembros', 'MembersController@index')->name('listMembers');
Route::get('/listaMembros/details/{id}','MembersController@detailsMembers')->name('detailMember');

//Projetos
Route::get('/listarProjetos', 'ProjectsController@index')->name('listProjects');
Route::get('/listaProjetos/details/{id}','ProjectsController@detailsProject')->name('detailProject');

//Sobre nós
Route::get('/sobrenos', 'AboutUsController@index')->name('aboutUs');

//Contato
Route::get('/contato', function () {
    return view('portal.contact');
})->name('contact');

//Noticia Paginação
Route::get('/paginaDeNoticia', 'NoticesGeneralController@paginationNotice')->name('noticePagination');
Route::get('/paginaDeNoticia/details/{id}','NoticesGeneralController@detailsNoticeGeneral')->name('detailsNoticeGeneral');

//Administrador
Route::group(['middleware' => 'admin'], function () {

    /**
     * Dashboard do Administrador
     */
    Route::get('/adm', 'AdmController@index')->name('dashboard');

    /**
     * Rotas para o registo de membros
     */
    Route::get('/adm/registrarMembros', 'MembersController@create')->name('registerMembers');
    Route::post('/adm/salvarMembros', 'MembersController@store')->name('saveMembers');
    Route::get('/adm/tabelaMembros', 'MembersController@tableMembers')->name('tableMembers'); //tabela de membros para gerenciar
    Route::get('/adm/tabelaMembros/{id}/editarMembro', 'MembersController@edit')->name('editMembers');
    Route::put('/adm/editarMembro/{id}', 'MembersController@update')->name('updateMembers');
    Route::get('adm/deletarMembro/{id}','MembersController@destroy')->name('deleteMember');



    /**
     * Rotas para o Usuario
     */
    Route::get('/adm/registrarUsuarios', 'UsersController@create')->name('registerUsers');
    Route::post('/adm/salvarUsuarios', 'UsersController@store')->name('saveUsers');
    Route::get('/adm/tabelaUsuarios', 'UsersController@tableUsers')->name('tableUsers');//tabela de usuarios para gerenciar
    Route::get('/adm/tabelaUsuarios/{id}/editarUsuario', 'UsersController@edit')->name('editUser');
    Route::put('/adm/editarUsuario/{id}', 'UsersController@update')->name('updateUser');
    Route::get('/adm/deletarUsuario/{id}', 'UsersController@destroy')->name('deleteUser');


    /**
     * Rotas para Projetos
     */
    Route::get('/adm/registrarProjetos', 'ProjectsController@create')->name('registerProjects');
    Route::post('/adm/salvarProjetos', 'ProjectsController@store')->name('saveProjects');
    Route::get('/adm/tabelaProjetos', 'ProjectsController@tableProjects')->name('tableProjects'); // tabela de projetos para gerenciar
    Route::get('/adm/tabelaProjetos/{id}/editarProjeto', 'ProjectsController@edit')->name('editProject');
    Route::put('/adm/editarProjeto/{id}', 'ProjectsController@update')->name('updateProject');
    Route::get('adm/deletarProjeto/{id}','ProjectsController@destroy')->name('deleteProject');
    Route::post('adm/registrarProjetos/addMembro', 'ProjectsController@membersToProject')->name('membersToProject');

    /**
     * Route for Notices General
     */
    Route::get('/adm/registrarNoticiaGeral', 'NoticesGeneralController@create')->name('registerNoticeGeneral');
    Route::post('/adm/salvarNoticiaGeral', 'NoticesGeneralController@store')->name('saveNoticeGeneral');
    Route::get('/adm/tabelaNoticiaGeral', 'NoticesGeneralController@tableNoticeGeneral')->name('tableNoticeGeneral'); // tabela de projetos para gerenciar
    Route::get('/adm/tabelaNoticiaGeral/{id}/editarNoticiaGeral', 'NoticesGeneralController@edit')->name('editNoticeGeneral');
    Route::put('/adm/editarNoticiaGeral/{id}', 'NoticesGeneralController@update')->name('updateNoticeGeneral');
    Route::get('adm/deletarNoticeGeneral/{id}','NoticesGeneralController@destroy')->name('deleteNoticeGeneral');

    /**
     * Route for Notices General
     */
    Route::get('/adm/registrarNoticiaGeral', 'NoticesGeneralController@create')->name('registerNoticeGeneral');
    Route::post('/adm/salvarNoticiaGeral', 'NoticesGeneralController@store')->name('saveNoticeGeneral');
    Route::get('/adm/tabelaNoticiaGeral', 'NoticesGeneralController@tableNoticeGeneral')->name('tableNoticeGeneral'); // tabela de projetos para gerenciar

    /**
     * Sobre nós Editar
     */
    Route::get('/adm/sonbrenos/editarSobreNos/{id}','AboutUsController@edit')->name('editAboutUs');
    Route::put('/adm/sobrenos/updateSobreNos/{id}', 'AboutUsController@update')->name('updateAboutUs');


});
