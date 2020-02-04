<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutUs;
class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $aboutUs = AboutUs::all();
        // dd($aboutUs);  
        return view('portal.sobreNos', compact('aboutUs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $aboutUs = AboutUs::find($id);

        return view('adm.aboutUs.editAboutUs', compact('aboutUs'));
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

        $dados = $request->all();
        $aboutUs = AboutUs::find($id);

        if($request->hasfile('image') && $request->file('image')->isValid() ){
            $file = $request->file('image');
            $extantion = $file->getClientOriginalExtension(); //Extenção da imagem
            $filename = time() . '.' . $extantion;
            $file->move('image/aboutUs/', $filename);
            $dados['image'] = $filename;
            
            if(!$filename){
                return redirect()->back()->with('error', 'Falha ao fazer o upload da Imagem');
            }
        }
        else {
           $dados['image'] = $aboutUs['image'];
            
        }
        

        $aboutUs->update($dados);


        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
