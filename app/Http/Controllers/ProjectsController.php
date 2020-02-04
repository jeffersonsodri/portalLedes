<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use App\Member;
use App\User;
use Dotenv\Validator;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProjectsController extends Controller
{

    public function tableProjects()
    {
        $this->authorize('view', User::class);

        $projects = Projects::all();

        return view('adm.projects.tableProjects', compact('projects'));
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $projects = Projects::all();
        // dd($projects);
        return view('portal.listProjects', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->authorize('view', User::class);

        $members = DB::table('members')->join('peoples', 'peoples.id', '=', 'members.people_id')->get();

        // dd($members);

        return view('adm.projects.registerProjects', compact('members'));
    }
    /**
     * @param $id do project
     */
    public function detailsProject($id)
    {

        $project = Projects::find($id);

        return view('portal.detailProject', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->authorize('update', User::class);

        $dados = $request->all();

        // dd($dados);

        if ($request->hasfile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $extantion = $file->getClientOriginalExtension(); //Extenção da image
            $filename = time() . '.' . $extantion;
            $file->move('image/imageProjects', $filename);
            $dados['image'] = $filename;

            if (!$filename) {

                return redirect()->back()->with('errorImage', 'Falha ao fazer o upload da Imagem')->with('dados', $dados);
            }
        } else {
            //Colocar uma mensagem de erro
            return redirect()->back()->with('errorImage', 'Falha ao fazer o upload da Imagem')->with('dados', $dados);
        }

        //Colcoando o projeto no banco de dados
        Projects::create($dados);

        // dd($projects);
        return redirect()->route('tableProjects')->with('success', 'Projeto criado com sucesso!');
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function membersToProject(Request $request){

        if($request->ajax()){
            return response()->json($request->all(), 200);
        }


        $validation = $request->validate($request->all(), [
            'nameMember' => 'required',
            'functionMember' => 'required'
        ]);

        $error_array = array();
        $success_output = '';

        if($validation->fails()){
            foreach($validation->messages()->getMessages() as $field_name => $messages){
                $error_array[] = $messages;
            }
        } else{
            if($request->get('button_action') == 'insert'){
                $success_output = '<div class="alert alert-sucess>Sucesso! </div>';
                dd("Cheguei até aqui");
                // $member = new Member([
                //     'name' => $request->get('nameMember'),
                //     'function' => $request->get('functionMember'),
                // ]);

            }
        }
        $output = array(
            'error' => $error_array,
            'success' => $success_output,
        );
        echo json_encode($output);

        return;

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

        $project = Projects::find($id);
        // dd($project);

        return view('adm.projects.editProjects', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *'
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->authorize('update', User::class);

        $dados = $request->all();
        $project = Projects::find($id);

        if ($request->hasfile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $extantion = $file->getClientOriginalExtension(); //Extenção da image
            $filename = time() . '.' . $extantion;
            $file->move('image/imageProjects', $filename);
            $dados['image'] = $filename;

            if (!$filename) {

                return redirect()->back()->with('errorImage', 'Falha ao fazer o upload da Imagem')->with('dados', $dados);
            }
        } else {
            $dados['image'] = $project['image'];
        }


        $project->update($dados);

        return redirect()->route('tableProjects')->with('edited', 'Projeto editado com sucesso!');
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

        $project = Projects::find($id);

        $project->delete();

        return redirect()->route('tableProjects')->with('deleted', 'Projeto deletado com sucesso!');
    }
}
