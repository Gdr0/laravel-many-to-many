<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Type;
use App\Models\technology;

class ProjectController extends Controller
{

    public function index() {

        $projects = Project :: all();

        return view('pages.project.index', compact('projects'));
    }
    public function create() {

        $types = Type :: all();
        $technologies = Technology :: all();

        return view('pages.project.create', compact('types', 'technologies'));
    }
    public function store(Request $request) {

        $data = $request -> all();

        $type = Type :: find($data['type_id']);

        $project = new Project();
        $project -> name = $data['name'];
        $project -> description = $data['description'];

        $project -> type() -> associate($type);

        $project -> save();

        $project -> technologies() -> attach($data['technology_id']);

        return redirect() -> route('project.index');
    }

    public function edit($id) {

        $types = Type :: all();
        $technologies = Technology :: all();

        $project = Project :: find($id);

        return view('pages.project.edit', compact('types', 'technologies', 'project'));
    }
    public function update(Request $request, $id) {

        $data = $request -> all();

        $type = Type :: find($data['type_id']);

        $project = Project :: find($id);
        $project -> name = $data['name'];
        $project -> description = $data['description'];

        $project -> type() -> associate($type);

        $project -> save();

        $project -> technologies() -> sync($data['technology_id']);

        return redirect() -> route('project.index');
    }
}