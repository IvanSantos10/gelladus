<?php

namespace Gelladus\Http\Controllers;

use Illuminate\Http\Request;
use Gelladus\Http\Requests\ProdutoRequest;
use Gelladus\Repositories\ProdutoRepository;


class ProdutoController extends Controller
{

    /**
     * @var ProdutoRepository
     */
    protected $repository;

    /**
     * @var ProdutoValidator
     */
    protected $validator;

    public function __construct(ProdutoRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $produtos = $this->repository->orderBy('nome')->paginate(10);

        return view('produtos.index', compact('produtos', 'search'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProdutoRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('produtos.index')->with('message', 'Produto cadastrado com sucesso');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = $this->repository->find($id);

        return view('produtos.show', compact('produto'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $produto = $this->repository->find($id);

        return view('produtos.edit', compact('produto'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ProdutoUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(ProdutoRequest $request, $id)
    {
        $this->repository->update($request->all(), $id);

        return redirect()->route('produtos.index')->with('message', 'Produto alterado com sucesso');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()->route('produtos.index')->with('message', 'Produto excluido com sucesso');
    }
}
