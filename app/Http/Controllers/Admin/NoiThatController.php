<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NoiThat;
use Illuminate\Http\Request;

class NoiThatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noithats = NoiThat::paginate(5);
        return view('Admin.NoiThat.index', compact('noithats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastNT = NoiThat::latest('maNT')->first();
        $newId = $lastNT ? $lastNT->maNT + 1 : 1;
        return view('Admin.NoiThat.create', compact('newId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nt = new NoiThat();
        $nt->maNT = $request->maNT;
        $nt->tenNT = $request->tenNT;
        $nt->giaNT = $request->giaNT;

        $nt->save();

        return redirect()->route('admin.noithat.index')->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nt = NoiThat::find($id);
        return view('Admin.NoiThat.edit', compact('nt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nt = NoiThat::find($id);

        $nt->tenNT = $request->tenNT;
        $nt->giaNT = $request->giaNT;

        $nt->save();

        // Redirect hoặc trả về thông báo sau khi cập nhật thành công
        return redirect()->route('admin.noithat.index')->with('success', 'Cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nt = NoiThat::find($id);
        if($nt){
            $nt->delete();
            return redirect()->route('admin.noithat.index')->with('success', 'xóa thành công.');
        }
    }
}
