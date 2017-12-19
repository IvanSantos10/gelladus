<?php

namespace Gelladus\Http\Controllers;

use Gelladus\Models\Estoque;
use Gelladus\Models\Pedido;
use Gelladus\Models\PedidoProduto;
use Gelladus\Models\Produto;
use Gelladus\Repositories\EstoqueRepository;
use Gelladus\Repositories\ProdutoRepository;
use Illuminate\Http\Request;
use Gelladus\Http\Requests\PedidoRequest;
use Gelladus\Repositories\PedidoRepository;


class PedidoController extends Controller
{

    /**
     * @var PedidoRepository
     */
    protected $repository;

    /**
     * @var PedidoValidator
     */
    protected $validator;
    /**
     * @var ProdutoRepository
     */
    private $produtoRepository;
    /**
     * @var EstoqueRepository
     */
    private $estoqueRepository;

    public function __construct(PedidoRepository $repository, ProdutoRepository $produtoRepository, EstoqueRepository $estoqueRepository)
    {
        $this->repository = $repository;
        $this->produtoRepository = $produtoRepository;
        $this->estoqueRepository = $estoqueRepository;
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
        $pedidos = $this->repository->scopeQuery(function ($query) {
            return $query->where('status', 1);
        })->paginate(10);

        return view('pedidos.index', compact('pedidos', 'search'));
    }

    public function fechado(Request $request)
    {
        $search = $request->get('search');
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $pedidos = $this->repository->scopeQuery(function ($query) {
            return $query->where('status', 2);
        })->paginate(10);

        return view('pedidos.fechados', compact('pedidos', 'search'));
    }

    public function create(Request $request)
    {
        $search = $request->get('search');
        $this->produtoRepository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        $estoques = $this->estoqueRepository->scopeQuery(function ($query) {
            return $query->join('produtos', 'estoques.produto_id', '=', 'produtos.id')
                ->orderBy('produtos.nome', 'asc');
        })->paginate(100);

        return view('pedidos.create', compact('estoques', 'search'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PedidoRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PedidoRequest $request)
    {
        $pedido = $this->repository->create([
            'user_id' => \Auth::user()->id,
        ]);

        foreach ($request->get('produto') as $pedidoProduto) {
            if ($pedidoProduto['quatidade'] > 0) {
                $produto = Produto::find($pedidoProduto['produto_id']);
                PedidoProduto::forceCreate([
                    'pedido_id' => $pedido->id,
                    'produto_id' => $produto->id,
                    'preco' => $produto->preco,
                    'quantidade' => $pedidoProduto['quatidade']
                ]);
            }
        }

        return redirect()->route('pedidos.show', ['id' => $pedido->id])->with('message', 'Pedido cadastrado com sucesso');
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
        $pedido = $this->repository->find($id);

        return view('pedidos.show', compact('pedido'));
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
        $pedido = $this->repository->find($id);
        if($pedido->status == 1) {
            $estoques = $this->estoqueRepository->scopeQuery(function ($query) use ($pedido) {
                return $query->join('produtos', 'estoques.produto_id', '=', 'produtos.id')
                    ->orderBy('produtos.nome', 'asc')
                    ->whereNotIn('produtos.id', $pedido->produtos->pluck('produto_id'));
            })->paginate(100);

            return view('pedidos.edit', compact('pedido', 'estoques'));
        }

        return redirect()->route('home')->with('message', 'Pedido finalizado');

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PedidoUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(PedidoRequest $request, $id)
    {
        $this->repository->delPedidoPoduto($id);

        foreach ($request->get('produto') as $pedidoProduto) {
            if ($pedidoProduto['quatidade'] > 0) {
                $produto = Produto::find($pedidoProduto['produto_id']);
                PedidoProduto::forceCreate([
                    'pedido_id' => $id,
                    'produto_id' => $produto->id,
                    'preco' => $produto->preco,
                    'quantidade' => $pedidoProduto['quatidade']
                ]);
            }
        }

        return redirect()->route('pedidos.show', ['id' => $id])->with('message', 'Pedido alterado com sucesso');
    }


    public function finalizar($id)
    {
        $pedido = $this->repository->find($id);

        if($pedido->status != 1){
            return redirect()->route('home')->with('message', 'Pedido já finalizado');
        }

        $estoq = [];
        $bortar = false;
        foreach ($pedido->produtos as $pedidoProduto) {
            $estoque = Estoque::where('produto_id', $pedidoProduto['produto_id'])->where('quantidade', '>=', $pedidoProduto['quantidade'])->first();

            if ($estoque) {
                $estoq[] = [
                    'id' => $estoque->id,
                    'produto_id' => $estoque->produto_id,
                    'quantidade' => $estoque->quantidade - $pedidoProduto['quantidade'],
                ];
            } else {
                $bortar = true;
            }
        }
        //dd($estoq);
        if (!$bortar) {
            foreach ($estoq as $est) {
                Estoque::where('id', $est['id'])->where('produto_id', $est['produto_id'])->update(['quantidade' => $est['quantidade']]);

            }

            $pedido->update(['status' => 2]);

            return redirect()->route('home')->with('message', 'Pedido finalizado com sucesso, OBRIGADO');
        }

        return redirect()->route('pedidos.update', ['pedido' => $id])->with('error', 'Produto sem estoque');

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

        return redirect()->route('pedidos.index')->with('message', 'Pedido excluido com sucesso');
    }
}
