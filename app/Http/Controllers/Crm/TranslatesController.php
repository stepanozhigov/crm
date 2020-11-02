<?php


namespace App\Http\Controllers\Crm;


use App\Services\Language\TranslateManager;
use App\Services\Language\TranslatesService;
use Illuminate\Http\Request;


class TranslatesController extends Controller
{
    protected $translatesService;

    public function __construct(TranslatesService $translatesService)
    {
        $this->translatesService = $translatesService;
    }

    public function index()
    {
        return view('crm.translates.index');
    }

    public function apply()
    {
        $this->translatesService->applyChanges();
        return redirect('translates')->with('success', 'Изменения успешно применились!');
    }

    public function create()
    {
        return view('crm.translates.create');
    }

    public function store(Request $request)
    {
        $request->validate(['sources' => 'required|string']);
        $res = $this->translatesService->saveSources($request->sources);

        if ($res) {
            return redirect('translates')->with('success', 'Записи успешно добавлены!');
        } else {
            return redirect('translates')->with('error', 'Произошла ошибка, либо записи уже существуют!');
        }
    }

    public function scan()
    {
        $count = $this->translatesService->scanSources();

        return redirect('translates')->with('success', "Обновленно $count записей!");
    }
}
