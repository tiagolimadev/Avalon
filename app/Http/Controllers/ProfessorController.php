<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Professor;
use App\Repositories\ProfessorRepository;
use App\Http\Requests\ProfessorRequest;

class ProfessorController extends Controller
{
    protected $professor;

    public function __construct(ProfessorRepository $professor)
    {
        $this->professor = $professor;
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
        return view('professores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessorRequest $request)
    {
        $professor = $request->except('_token');
        $professor['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $professor['data_nascimento'])->toDateString();

        if ($status = $this->professor->inserir($professor)) {
            session()->flash('success', 'Professor ' 
                . $request->nome . ' cadastrado com sucesso!');
        } else {
            session()->flash('fail', 'Não foi possível '
                . ' cadastrar o Professor ' . $request->nome);
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit(Professor $professor)
    {
        return view('professores.edit', compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessorRequest $request, Professor $professor)
    {
        $dadosProfessor = $request->except('_token', '_method');

        $dadosProfessor['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $request['data_nascimento'])->toDateString();

        if ($status = $this->professor->atualizar($dadosProfessor, $professor->id)) {
            session()->flash('success', 'Professor ' 
                . $request->nome . ' atualizado com sucesso!');
        } else {
            session()->flash('fail', 'Não foi possível '
                . ' atualizar o professor ' . $request->nome);
        }

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professor $professor)
    {
        //
    }
}
