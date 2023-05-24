<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Services\SizeService;
use App\Interfaces\SizeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $sizeService;


    public function __construct()
    {
        $this->sizeService = (new SizeService);
    }


    public function index()
    {
        $sizes = $this->sizeService->getAll();
        return view('sizes.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $payload = [
            'name' => $request->name,
        ];
        $this->sizeService->create($payload);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $size = app(sizeService::class)->create($data);

        return redirect()->route('sizes.index', $size);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        $sizes = Size::get();
        return view('sizes.create', compact('sizes'));
        // return view('sizes.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $size = Size::findOrFail($id);
        return view('sizes.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|max:255',
    //         'description' => 'nullable|max:1000',
    //     ]);

    //     $updated = $this->sizeService->update($id, $validatedData);

    //     if ($updated) {
    //         return redirect()->route('sizes.index')->with('success', 'Size updated successfully.');
    //     } else {
    //         return back()->withInput()->with('error', 'Failed to update size.');
    //     }
    // }
    public function update(Request $request, Size $size)
    {
        $data = $request->validate([
            'name' => 'required|string',
        ]);

        $size->update($data);

        return redirect()->route('sizes.index')->with('success', 'Size updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        if ($this->sizeService->delete($size)) {
            return redirect()->route('sizes.index')->with('success', 'Size deleted successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to delete size.');
        }
    }
}
