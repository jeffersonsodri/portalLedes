<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\People;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Member;
use App\User;
use App\Colleger; //Bolsista
use App\Teacher; //Professor
use App\Trainee; //Estagiari

class MembersController extends Controller
{

    /**
     * @return view listarTabelaMembros para o os adminsitradores
     */
    public function tableMembers(){

        $this->authorize('view', User::class);


        $members = DB::table('members')
                ->join('peoples', 'peoples.id','=','members.people_id')
                ->get();

        return view('adm.members.tableMembers', compact('members') );
    }


    /**
     * Display a listing of the resource.
     * Essa função lista na página para que todos possam ver
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


       $members = DB::table('peoples')->join('members', 'members.people_id','=','peoples.id')->get();
    //    dump($members);
       return view('portal.listMembers', compact('members'));

    }

    public function detailsMembers($id)
    {
        $member = DB::table('members')-> join('peoples', 'peoples.id','=','members.people_id')
        ->where('members.id', $id )->first();
        //  dump($member);
        return view('portal.detailMembers', compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('view', User::class);

        return view('adm.members.registerMembers');
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
        // Verifica se a imagem foi coloca e se ela é válida



        if($request->hasfile('photo') && $request->file('photo')->isValid() ){
            $file = $request->file('photo');
            $extantion = $file->getClientOriginalExtension(); //Extenção da imagem
            $filename = time() . '.' . $extantion;
            $file->move('image/photos', $filename);
            $dados['photo'] = $filename;

            if(!$filename){
                return redirect()->back()->with('errorImage', 'Falha ao fazer o upload da Imagem');
            }
        }
        else {
            return redirect()->back()->with('errorImage', 'Falha ao fazer o upload da Imagem');
        }



        $people = People::create($dados);
        $member = ["people_id" => $people['id'],
                "course" => $dados['course'],
                "description" => $dados['description'],
                "photo" => $dados['photo'],
            "office" => $dados['office']];


        $member = Member::create($member);
        // dd($dados['office']);
        //selecionando o office
        if($dados['office'] == 'bolsista'){
            Colleger::create(["member_id" => $member['id']]);
        }elseif($dados['office'] == 'estagiario'){
            Trainee::create(["member_id" => $member['id']]);
        }elseif($dados['office'] == 'professor'){
            Teacher::create(["member_id" => $member['id']]);
        }


        return redirect()->route('tableMembers')->with('success', 'Membro cadastrado com sucesso!');
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
        //dd($people);
        $member = Member::where('people_id', $people['id'])->first();
        //dd($member);
        $office =  Teacher::where('member_id', $member['id']);

        $query = DB::table('collegers')
        ->where('member_id', "=",[$member['id']])->get();

        if($query->isEmpty()) { //Verifica se o member é um Colleger

            $query = DB::table('treinees')
            ->where('member_id', "=",[$member['id']])->get();
            if($query->isEmpty()) { //Verifica se o member é um Trainee

                $query = DB::table('teachers')
                ->where('member_id', "=",[$member['id']])->get();
                if($query->isEmpty()) { //Verifica se o member é um Teacher


                } else{
                    $office = 'Professor';
                    // dd("Teacher");
                }

            } else{
                $office = 'Estagiário';
                // dd('Estagiário');
            }

        } else{
            $office = 'Bolsista';
            // dd("Colleger");
        }
        // dd($office);
        // dd($office , $people);
        return view('adm.members.editMembers', compact('member', 'people', 'office'));
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

        //$id = member.id
        // dd($id);
        $dados =  $request->all();
        $member = Member::find($id);


        if($request->hasfile('photo') && $request->file('photo')->isValid() ){
            $file = $request->file('photo');
            $extantion = $file->getClientOriginalExtension(); //Extenção da imagem
            $filename = time() . '.' . $extantion;
            $file->move('image/photos', $filename);
            $dados['photo'] = $filename;

            if(!$filename){
                return redirect()->back()->with('errorImage', 'Falha ao fazer o upload da Imagem');
            }
        }
        else {
            $dados['image'] = $member['photo'];
        }

        $member->update($dados);

        $people = People::where('id', $member['people_id'])->first();


        $people->update($dados);


        return redirect()->route('tableMembers')->with('edited', "Membro editado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id => id da tabela people
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->authorize('delete', User::class);


        $people = People::find($id);
        //dd($people);
        $people->delete();

        return redirect()->route('tableMembers')->with('deleted','Membro Deletado com suceeso!');

    }
}

