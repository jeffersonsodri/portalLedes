<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\People;
use App\Administrator;
use App\Editor;
use App\User;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return view listarTabelaUsuarios para o os adminsitradores
     */
    public function tableUsers(){

        $this->authorize('view', User::class);

        $users = DB::table('users')->join('peoples', 'peoples.id','=','users.people_id')->get();

        //Pegar a função de cada Usuário
        foreach ($users as $us) {
            # ou Seja não é um usuário Editor ou administrador
            if( DB::table('administrators')->where('user_id', '=', $us->id)->first() == null){
                $us = [$us, 'funcao' => 'Editor'];
                // dump($us);
            }
            else{
                $us = [$us, 'funcao' => 'Administrador'];
                // dump($us);
            }
        }
        // dump($users);

        return view('adm.users.tableUsers', compact('users') );
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->authorize('view', User::class);

        return view('adm.users.registerUsers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);

        $dados = $request->all();
        $dados['password'] = bcrypt($dados['password']);

        $people = People::create($dados);
        //dd($people);
        $user = User::create([ "people_id"=> $people['id'],"login" =>$dados['login'],
                            "email"=>$dados['email'] , "password"=>$dados['password']]);

        // dd($user);

        // Criar adminsitrardo ou Editor
        if( $dados['permission'] == 'Administrador'){
            Administrator::create([ "user_id" => $user['id'], "permission" => $dados['permission']]);
        }
        else{
            $dados['permission'] = 'Editor';
            Editor::create([ "user_id" => $user['id'], "permission" => $dados['permission']]);
        }

        // $user = [$people['id_people'], $login, $password];
        // Usuario::create($user);

        return redirect()->route('tableUsers')->with('success', 'Usuário criado com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $this->authorize('update', User::class);

        $people = People::find($id);
        // dd($people);
        $user = User::where('people_id', $people['id'])->first();
        // dd($user);
        $permission = '';
        if(Administrator::where('user_id', $user['id'])->first() != null){
            $permission = "Administrador";
        }
        else if (Editor::where('user_id', $user['id'])->first() != null){
            $permission = "Editor";
        }
        // dd($permission);



        return view('adm.users.edtUsers', compact('user', 'people', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', User::class);

        $dados = $request->all();
        $dados['password'] = bcrypt($dados['password']);

        $user = User::find($id);

        $user->update($dados);

        $people = People::where('id', $user['people_id'])->first();
        $people->update($dados);
        // dd($people);

        // dd($user, $people);

        // Editar adminsitrardo ou Editor
        if( $dados['permission'] == 'Administrador'){
            Administrator::create( ['user_id' => $user['id'], "permission" => $dados['permission']]);
            Editor::where( 'user_id' , $user['id'])->first()->delete();
        }
        else{
            $dados['permission'] = 'Editor';
            $edt = Editor::create( ['user_id'=> $user['id'], "permission" => $dados['permission'] ]);
            Administrator::where( 'user_id' , $user['id'])->first()->delete();
        }


        return redirect()->route('tableUsers')->with('edited', 'Usuário editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', User::class);

        $people = People::find($id);
        // dd($people);
        $people->delete();

        return redirect()->route('tableUsers')->with('deleted', 'Usuário deletado com sucesso!');
    }
}
