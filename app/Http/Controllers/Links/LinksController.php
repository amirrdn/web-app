<?php

namespace App\Http\Controllers\Links;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Clasess\LinkClass;

use MetaTag;

class LinksController extends Controller
{
    public function __construct()
    {
        $this->links                = new LinkClass;
    }
    public function index()
    {
        MetaTag::set('title', 'Index Link | Amir Rudin');
        $links                      = '';
        return view('links.index', compact('links'));
    }
    public function getLink(Request $request)
    {
        $links                      = $this->links->GetLinks();

        $data = \DataTables::eloquent($links);
        $data->addIndexColumn();

        $data->addColumn('checkbox', function($links) {
            return '<input type="checkbox" name="id[]" value="'.$links->id.'">' ;
        })
        ->addColumn('action', function ($links) {
            $tub                    = '<a href="javascript:void(0)" class="btn btn-primary btn-sm Editlinks" value="'.$links->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a> <button class="btn btn-danger btn-sm" value="'.$links->id.'" id="delete"><i class="glyphicon glyphicon-trash"></i> Delete</button> <button class="btn btn-info btn-sm" value="'.$links->id.'" id="viewlink"><i class="glyphicon glyphicon-eye"></i> View</button>   ';
            return $tub;
        })
        ->addColumn('linkaddress', function ($links) {
            return '<a target="_blank" href="'.$links->link.'">'.$links->link.'</a>';
        })
        ->order(function($query) use ($request) {
            $query->orderBy('created_at', 'desc');
        });
        $data->rawColumns(['action', 'linkaddress', 'checkbox']);
        return $data->toJson();
    }
    public function create()
    {
        MetaTag::set('title', 'Create Link | Amir Rudin');
        return view('links.create');
    }
    public function store(Request $request)
    {
        $linkd                      = $this->links->insertLinks($request);

        return redirect()->route('detaillink', [$linkd->id]);   
    }
    public function destroy(Request $request)
    {
        $links                      = $this->links->DeleteArray($request);
        $links->delete();
        return response(['msg' => 'deleted']);
    }
    public function edit($id)
    {

    }
    public function detail($id)
    {
        $links                      = $this->links->singleLink($id);
        MetaTag::set('title', 'Detail '.$links->link_name.' | Amir Rudin');

        return view('links.detail', compact('links'));
    }
    public function update(Request $request, $id)
    {
        $links                      = $this->links->updateLinks($request, $id);
        return $links;
    }
    public function delete($id)
    {
        $links                      = $this->links->deletelink($id);
        return response(['msg' => 'deleted']);
    }
    public function modaledit($id)
    {
        $links                      = $this->links->singleLink($id);

        return view('links.modal_edit', compact('links'))->render();
    }
    public function views($id)
    {
        $links                      = $this->links->singleLink($id);

        return view('links.view', compact('links'));
    }
}
