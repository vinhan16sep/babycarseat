<?php

namespace App\Http\Controllers;

use App\Models\FormSafe;
use Illuminate\Http\Request;

class FormSafeController extends Controller
{
    public function index()
    {
        $forms = FormSafe::orderBy('created_at', 'desc')->paginate(20);
        return view('formsafe.index', compact('forms'));
    }

    public function create()
    {
        return view('formsafe.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'         => 'nullable|string|max:255',
            'phone'        => 'nullable|string|max:255',
            'email'        => 'nullable|email|max:255',
            'address'      => 'nullable|string|max:255',
            'content'      => 'nullable|string',
            'product_code' => 'nullable|string|max:255',
            'by_date'      => 'nullable|date',
            'report_images'=> 'nullable|string',
            'env_images'   => 'nullable|string',
            'code'         => 'nullable|string|max:255',
        ]);
        FormSafe::create($data);
        return redirect()->route('formsafe.index')->with('success', 'Tạo mới thành công!');
    }

    public function show($id)
    {
        $form = FormSafe::findOrFail($id);
        return view('formsafe.show', compact('form'));
    }

    public function edit($id)
    {
        $form = FormSafe::findOrFail($id);
        return view('formsafe.edit', compact('form'));
    }

    public function update(Request $request, $id)
    {
        $form = FormSafe::findOrFail($id);
        $data = $request->validate([
            'name'         => 'nullable|string|max:255',
            'phone'        => 'nullable|string|max:255',
            'email'        => 'nullable|email|max:255',
            'address'      => 'nullable|string|max:255',
            'content'      => 'nullable|string',
            'product_code' => 'nullable|string|max:255',
            'by_date'      => 'nullable|date',
            'report_images'=> 'nullable|string',
            'env_images'   => 'nullable|string',
            'code'         => 'nullable|string|max:255',
        ]);
        $form->update($data);
        return redirect()->route('formsafe.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $form = FormSafe::findOrFail($id);
        $form->delete();
        return redirect()->route('formsafe.index')->with('success', 'Xóa thành công!');
    }
}
