<?php

namespace App\Http\Controllers\LK;


use App\Helpers\DomainHelper;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Project;
use App\Services\Page\ConsultPage\ConsultPageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    private $consultPageService;

    public function __construct(Request $request, ConsultPageService $consultPageService)
    {
        parent::__construct($request);
        $this->consultPageService = $consultPageService;
    }

    public function index()
    {
        return view('lk.home');
    }

    public function availableCourses()
    {
        return view('lk.available-courses');
    }

    //show page with products and comments
    public function product(Product $product, Request $request)
    {

        if (!$product->belongProject($request->project->id)) {
            abort(404);
        }

        if (!$request->client->hasProduct($product->id)) {
            return redirect()->to('/buy/'.$product->id);
        }

        $type = $request->get('type');

        return view('lk.product', compact('product', 'type'));
    }

    //show page with specific comment
    //request (project, client)
    public function comment(Comment $comment, Request $request)
    {
        $domain = $request->project->domain;
        $lk_route_name = $domain.'home';
        $product = $comment->product;
        $client = $request->client;

        //check if client has this comment via hasComment
        //check if comment is approved
        //if not redirect to current client's lk
        if (!$client->hasComment($comment->id)) {
            return redirect()->route($lk_route_name);
        }
        return view('lk.comment', compact('comment','product','client'));
    }

    public function buy(Product $product,  Request $request)
    {
        if (!$product->belongProject($request->project->id)) {
            abort(404);
        }

        if ($request->client->hasProduct($product->id)) {
            return redirect()->to('/product/'.$product->id);
        }

        return view('lk.buy', compact('product'));
    }

    public function constructor()
    {
        return view('lk.constructor');
    }

    public function consult(Request $request)
    {
        $pageSettings = $this->consultPageService->getSettingForProject($request->project);
        return view('lk.consult', compact('pageSettings'));
    }

    public function consultPrice(Request $request, string $gender)
    {
        $pageSettings = $this->consultPageService->getSettingForProject($request->project);

        if ($gender == 'woman') {
            $view = 'lk.consult-woman';
        } elseif ($gender == 'man') {
            $view = 'lk.consult-man';
        } else {
            abort(404);
        }

        return view($view, compact('pageSettings'));
    }

    public function consultVip(Request $request)
    {
        $consultVip = $this->consultPageService->getVipConsultForProject($request->project);
        return view('lk.consult-vip', compact('consultVip'));
    }

}
