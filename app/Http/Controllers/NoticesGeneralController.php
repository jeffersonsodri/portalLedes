<?php

namespace App\Http\Controllers;

use App\Notice;
use App\NoticeGeneral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class NoticesGeneralController extends Controller
{

    private $totalPage = 5;
    private $totalPageList = 8;


    public function __construct(){
        $this->middleware('auth');
    }


    /**
     *
     * @return table with notices general
     */
    public function tableNoticeGeneral()
    {

        $notices = DB::table('notices_general')
            ->join('notices', 'notices.id', '=', 'notices_general.notice_id')
            ->get();

        // dd($notices);

        return view('adm.notices.tableNoticeGeneral', compact('notices'));
    }

    /**
     * Display a listing of the resource
     * @param tamanho - número total de notícias do portal
     * @return view
     *
     * */
    public function paginationNotice()
    {

        $notices = DB::table('notices')
            ->join('notices_general', 'notices.id', '=', 'notices_general.notice_id')
            ->paginate($this->totalPageList);

        //Item representa
        return view('portal.noticePagination', compact('notices'));
    }

    /**
     * @param id - id da tabela NoticesGeneral
     * @return view
     */
    public function detailsNoticeGeneral($id)
    {

        $noticesGeneral = NoticeGeneral::find($id);
        // dd($noticesGeneral->notice_id);

        $notice = Notice::find($noticesGeneral->notice_id);
        // dd($notices);

        $arrayNotice = DB::table('notices')
            ->join('notices_general', 'notices.id', '=', 'notices_general.notice_id')
            ->paginate(3);

        return view('portal.detailNoticeGeneral', compact('notice', 'arrayNotice'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $arrayNotice = DB::table('notices')
            ->join('notices_general', 'notices.id', '=', 'notices_general.notice_id')
            ->get();
        // dd($arrayNotice);

        //Pega o tamanho do Array de Noticas
        $tamanho = sizeof($arrayNotice);

        // dd($tamanho);
        $cont = 0;

        $notices[0] = '';

        /**
         * Coloca notices numa variável do maior até o menor e limita a paginação para 5 na página principal
         */
        for ($i = $tamanho; $cont < $tamanho && $cont < $this->totalPage; $i--, $cont++) {
            $notices[$cont] = $arrayNotice[$i - 1];
        }


        // dd($notices);

        return view('home', compact('notices', 'tamanho'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adm.notices.registerNoticeGeneral');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Todos os dados da requisição do Registro das notícias
        $dados = $request->all();
        //dd($dados);

        //Id do usuário logado
        $user = DB::table('users')->where('id', '=', $dados['author_id'])->get();
        // dd($user[0]->id);

        /**Usuário de acordo com o ID */
        $people = DB::table('peoples')->where('id', '=', $user[0]->people_id)->get();
        //dd($people);

        //Pegando a date atual
        $date = date('d-m-Y');
        // ->join('people', 'people.id', '=', 'user.'.$idUser)->first();

        //Verificando o upload da imagem
        if ($request->hasfile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $extantion = $file->getClientOriginalExtension(); //Extenção da image
            $filename = time() . '.' . $extantion;
            $file->move('image/imageNotices', $filename);
            $dados['image'] = $filename;

            if (!$filename) {
                return redirect()->back()->with('errorImage', 'Falha ao fazer o upload da Imagem')->with('dados', $dados);
            }
        } else {
            //Colocar uma mensagem de erro
            return redirect()->back()->with('errorImage', 'Falha ao fazer o upload da Imagem')->with('dados', $dados);
        }

        //Cria um array para adicionar em notica
        $notices = [
            "title" => $dados['title'],
            "author" => $people[0]->name,
            "description" => $dados['description'],
            "image" => $dados['image'],
            "date" => $date
        ];

        //Colocando a notícia no Banco de dados
        $notices = Notice::create($notices);

        //Colocando a notíciaGeral no Banco de dados
        NoticeGeneral::create(['notice_id' => $notices['id']]);

        return redirect()->route('tableNoticeGeneral')->with('success', "A notícia foi criada com sucesso!");
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
        $noticesGeneral = NoticeGeneral::find($id);
        // dd($noticesGeneral->notice_id);

        $notice = Notice::find($noticesGeneral->notice_id);
        // dd($notices);

        return view('adm.notices.editNoticeGeneral', compact('notice'));
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
        //Todos os dados da requisição do Registro das notícias
        $dados = $request->all();
        //dd($dados);
        $noticesGeneral = NoticeGeneral::find($id);
        // dd($noticesGeneral->notice_id);

        $notices = Notice::find($noticesGeneral->notice_id);

        $user = DB::table('users')->where('id', '=', $dados['author_id'])->get();
        // dd($user[0]->id);

        $people = DB::table('peoples')->where('id', '=', $user[0]->people_id)->get();
        //dd($people);

        //
        if ($request->hasfile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $extantion = $file->getClientOriginalExtension(); //Extenção da image
            $filename = time() . '.' . $extantion;
            $file->move('image/imageNotices', $filename);
            $dados['image'] = $filename;

            if (!$filename) {
                return redirect()->back()->with('errorImage', 'Falha ao fazer o upload da Imagem')->with('dados', $dados);
            }
        } else {
            $dados['image'] = $notices['image'];
        }

        //Cria um array para adicionar em notica
        $dateNotice = [
            "title" => $dados['title'],
            "author" => $notices['author'],
            "description" => $dados['description'],
            "image" => $dados['image'],
            "date" => $notices['date'],
        ];

        $notices->update($dateNotice);


        //NoticeGeneral::update(['notice_id' => $notices['id']]);
        return redirect()->route('tableNoticeGeneral')->with('edited', "A notícia foi editada com sucesso!");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticesGeneral = NoticeGeneral::find($id);
        // dd($noticesGeneral->notice_id);

        $notices = Notice::find($noticesGeneral->notice_id);
        // dd($notices);

        $notices->delete();

        return redirect()->route('tableNoticeGeneral')->with('deleted', 'Notícia deletada Com sucesso!');
    }
}
