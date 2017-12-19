<?php

namespace Gelladus\Http\Controllers;

use Gelladus\Repositories\EstoqueRepository;
use Gelladus\Repositories\ProdutoRepository;
use Illuminate\Http\Request;
use Gelladus\Http\Requests\EstoqueRequest;


class EstoqueController extends Controller
{

    /**
     * @var EstoqueRepository
     */
    protected $repository;
    /**
     * @var ProdutoRepository
     */
    private $produtoRepository;

    public function __construct(EstoqueRepository $repository, ProdutoRepository $produtoRepository)
    {
        $this->repository = $repository;
        $this->produtoRepository = $produtoRepository;
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
        $estoques = $this->repository->scopeQuery(function ($query) {
            return $query->join('produtos', 'estoques.produto_id', '=', 'produtos.id')
                ->orderBy('produtos.nome', 'asc');
        })->paginate(10);

        return view('estoques.index', compact('estoques', 'search'));
    }

    public function create()
    {
        $produtos = $this->produtoRepository->pluck('nome', 'id');

        return view('estoques.create', compact('produtos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EstoqueRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(EstoqueRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('estoques.index')->with('message', 'Estoque cadastrado com sucesso');
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
        $estoque = $this->repository->find($id);

        return view('estoques.show', compact('estoque'));
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

        $estoque = $this->repository->find($id);
        $produtos = $this->produtoRepository->pluck('nome', 'id');

        return view('estoques.edit', compact('estoque', 'produtos'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  EstoqueUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(EstoqueRequest $request, $id)
    {
        $this->repository->update($request->all(), $id);

        return redirect()->route('estoques.index')->with('message', 'Estoque alterado com sucesso');
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

        return redirect()->route('estoques.index')->with('message', 'Estoque excluido com sucesso');
    }
}
