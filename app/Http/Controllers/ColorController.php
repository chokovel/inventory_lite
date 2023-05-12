<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Services\ColorService;
use App\Interfaces\ColorInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public $colorService;


    public function __construct()
    {
        $this->colorService = (new ColorService);
    }


    public function index()
    {
        $colors = $this->colorService->getAll();
        return view('colors.index', compact('colors'));
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
        $this->colorService->create($payload);

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

        $color = app(ColorService::class)->create($data);

        return redirect()->route('colors.index', $color);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        $colors = Color::get();
        return view('colors.create', compact('colors'));
        // return view('colors.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color = $this->colorService->getById($id);
        return view('colors.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
            $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:1000',
        ]);

        $updated = $this->colorService->update($id, $validatedData);

        if ($updated){
            return redirect()->route('colors.index')->with('success', 'Color updated successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to update color.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        if ($this->colorService->delete($color)) {
            return redirect()->route('colors.index')->with('success', 'Color deleted successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to delete color.');
        }
    }
}
