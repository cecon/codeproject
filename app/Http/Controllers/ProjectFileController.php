<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Services\ProjectService;
use Illuminate\Support\Facades;
use Illuminate\Http\Request;
use CodeProject\Http\Requests;

class ProjectFileController extends Controller
{
    private $projectService;

    public function __construct(ProjectService $service)
    {
        $this->projectService = $service;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        $data['file'] = $file;
        $data['extension'] = $extension;
        $data['name'] = $request->name;
        $data['project_id'] = $request->project_id;
        $data['description'] = $request->description;

        $this->projectService->createFile($data);


    }
}