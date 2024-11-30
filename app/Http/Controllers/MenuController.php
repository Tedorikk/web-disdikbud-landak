<?php

namespace App\Http\Controllers;

use App\Models\page;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Exception;

class MenuController extends Controller
{
    public function index()
    {
        try {
            $menus = Menu::whereNull('parent_id')->with('children')->orderBy('position')->get();
            return view('header', compact('menus'));
        } catch (QueryException $e) {
            // Jika terjadi kesalahan query database
            return back()->withErrors(['error' => 'Database error occurred while fetching menus.']);
        } catch (Exception $e) {
            // Menangani error umum lainnya
            return back()->withErrors(['error' => 'An unexpected error occurred.']);
        }
    }

    public function store(Request $request)
    {
        try {
            // Validasi input request
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:menus',
                'parent_id' => 'nullable|exists:menus,id',
                'position' => 'nullable|integer',
                'content' => 'nullable|string',
            ]);

            $menu = Menu::create($request->only(['name', 'slug', 'parent_id', 'position']));

            if ($request->filled('content')) {
                Page::create(['menu_id' => $menu->id, 'content' => $request->content]);
            }

            return redirect()->back()->with('success', 'Menu berhasil dibuat.');
        } catch (QueryException $e) {
            // Menangani kesalahan database (misal, duplikat slug)
            return back()->withErrors(['error' => 'Database error occurred while creating menu.']);
        } catch (Exception $e) {
            // Menangani error umum lainnya
            return back()->withErrors(['error' => 'An unexpected error occurred while creating menu.']);
        }
    }

    public function update(Request $request, Menu $menu)
    {
        try {
            // Validasi input request
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:menus,slug,' . $menu->id,
                'parent_id' => 'nullable|exists:menus,id',
                'position' => 'nullable|integer',
                'content' => 'nullable|string',
            ]);

            $menu->update($request->only(['name', 'slug', 'parent_id', 'position']));

            if ($menu->page) {
                $menu->page->update(['content' => $request->content]);
            } else if ($request->filled('content')) {
                Page::create(['menu_id' => $menu->id, 'content' => $request->content]);
            }

            return redirect()->back()->with('success', 'Menu berhasil diperbarui.');
        } catch (QueryException $e) {
            // Menangani kesalahan query database saat update
            return back()->withErrors(['error' => 'Database error occurred while updating menu.']);
        } catch (Exception $e) {
            // Menangani error umum lainnya
            return back()->withErrors(['error' => 'An unexpected error occurred while updating menu.']);
        }
    }

    public function destroy(Menu $menu)
    {
        try {
            $menu->delete();
            return redirect()->back()->with('success', 'Menu berhasil dihapus.');
        } catch (QueryException $e) {
            // Menangani kesalahan database saat menghapus
            return back()->withErrors(['error' => 'Database error occurred while deleting menu.']);
        } catch (Exception $e) {
            // Menangani error umum lainnya
            return back()->withErrors(['error' => 'An unexpected error occurred while deleting menu.']);
        }
    }
}
