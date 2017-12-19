<?php

namespace Gelladus\Http\Controllers\Auth;

use Gelladus\Http\Controllers\Controller;
use Gelladus\Repositories\UserRepository;
use Illuminate\Http\Request;
use Gelladus\Http\Requests\UserRequest;


class RegistroController extends Controller
{

    /**
     * @var UserRepository
     */
    protected $repository;

    public function __construct(UserRepository $repository)
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
        $users = $this->repository->paginate(10);

        return view('auth.registros.index', compact('users', 'search'));
    }

    public function create()
    {
        return view('auth.registros.create', compact('produtos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $this->repository->create($data);

        return redirect()->route('registros.index')->with('message', 'Usuário cadastrado com sucesso');
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
        $user = $this->repository->find($id);

        return view('auth.registros.show', compact('user'));
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

        $user = $this->repository->find($id);

        return view('auth.registros.edit', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {

        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        if(!$request->password)
            unset($data['password']);

        $this->repository->update($data, $id);

        return redirect()->route('registros.index')->with('message', 'Usuário alterado com sucesso');
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
        //$this->repository->delete($id);

        return redirect()->route('auth.registros.index')->with('message', 'Usuário excluido com sucesso');
    }
}
