<?php

namespace App\Http\Controllers\Crm;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Services\Tag\TagService;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    protected $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index()
    {
        $tags = Tag::paginate(20);

        return view('crm.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('crm.tags.create');
    }

    public function store(TagRequest $request)
    {
        $validated = $request->validated();
        $this->tagService->createFromAdminPanel($validated);

        return redirect('tags')->with('success', 'Запись успешно создана!');
    }

    public function edit(Tag $tag)
    {
        return view('crm.tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $validated = $request->validated();
        $this->tagService->updateFromAdminPanel($validated, $tag);

        return redirect('tags')->with('success', 'Изменения успешно применились!');
    }

}
