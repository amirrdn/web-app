<?php

namespace App\Clasess;

use Illuminate\Http\Request;
use App\Models\MLinks;

class LinkClass {
    public function insertLinks(Request $request)
    {
        $link               = new MLinks;

        $link->link_name    = $request->link_name;
        $link->link         = $request->link;
        $link->status       = 1;

        $link->save();

        return $link;
    }
    public function singleLink($id)
    {
        $links              = MLinks::find($id);
        if(!empty($links)){
            return $links;
        }
    }
    public function GetLinks()
    {
        $links              = MLinks::where('status', 1)->orderBy('created_at');
        if(!empty($links)){
            return $links;
        }
    }
    public function updateLinks(Request $request, $id)
    {
        $link               = MLinks::find($id);

        $link->link_name    = $request->link_name;
        $link->link         = $request->link;
        $link->status       = 1;

        $link->save();

        return $link;
    }
    public function deletelink($id)
    {
        $links              = MLinks::FindOrFail($id);
        
        $links->delete();
    }
    public function DeleteArray(Request $request)
    {
        $id                 = $request->get('id');

        $links              = MLinks::whereIn('id',explode(",",$id));

        return $links;
    }
}