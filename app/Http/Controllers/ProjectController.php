<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repositories\ProjectRepository;
use CodeProject\Services\ProjectService;
use Illuminate\Http\Request;
use CodeProject\Http\Requests;

class ProjectController extends Controller
{
    /**
     * @var ClientRepository
     */
    private $repository;
    /**
     * @var ClientService
     */
    private $projectService;

    /**
     * @param ProjectRepository $repository
     * @param ProjectService $service
     * @internal param ClientService $clientService
     */
    public function __construct(ProjectRepository $repository, ProjectService $service)
    {
        $this->repository = $repository;
        $this->projectService = $service;
    }

    public function index()
    {
        return $this->repository->findWhere(['owner_id'=> \Authorizer::getResourceOwnerId()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        return $this->projectService->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        if($this->checProjectPermission($id) == false){
            return ['error'=>'Access Forbiden'];
        }
        return$this->repository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if($this->CheckProjectOwnerId($id) == false){
            return ['error'=>'Access Forbiden'];
        }
        return $this->projectService->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->CheckProjectOwnerId($id) == false){
            return ['error'=>'Access Forbiden'];
        }
        $this->repository->delete($id);
    }

    private function CheckProjectOwnerId($projectId)
    {
        $userId = \Authorizer::getResourceOwnerId();
        return $this->repository->isOwner($projectId, $userId);
    }

    private function CheckProjectMember($projectId)
    {
        $userId = \Authorizer::getResourceOwnerId();
        return $this->repository->hasMember($projectId, $userId);
    }

    private function checProjectPermission($projectId)
    {
        if($this->CheckProjectOwnerId($projectId) or $this->CheckProjectMember($projectId)){
            return true;
        }
        return false;
    }
}