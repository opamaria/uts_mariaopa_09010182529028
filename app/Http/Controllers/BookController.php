<?php
namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
class BookController extends Controller {
    public function index(Request $request) {
        $books = Book::with('category')->when($request->q, fn($q,$term)=>$q->where('title','like',"%$term%")->orWhere('author','like',"%$term%"))->latest()->paginate(10);
        return view('books.index', compact('books'));
    }
    public function create() { return view('books.create', ['categories'=>Category::orderBy('name')->get()]); }
    public function store(Request $request) { $data=$request->validate(['category_id'=>'required|exists:categories,id','title'=>'required|max:255','author'=>'required|max:255','publisher'=>'required|max:255','year'=>'required|integer|min:1900|max:'.date('Y'),'stock'=>'required|integer|min:0']); Book::create($data); return redirect()->route('books.index')->with('success','Buku berhasil ditambahkan.'); }
    public function show(Book $book) { $book->load('category'); return view('books.show', compact('book')); }
    public function edit(Book $book) { return view('books.edit', ['book'=>$book,'categories'=>Category::orderBy('name')->get()]); }
    public function update(Request $request, Book $book) { $data=$request->validate(['category_id'=>'required|exists:categories,id','title'=>'required|max:255','author'=>'required|max:255','publisher'=>'required|max:255','year'=>'required|integer|min:1900|max:'.date('Y'),'stock'=>'required|integer|min:0']); $book->update($data); return redirect()->route('books.index')->with('success','Buku berhasil diperbarui.'); }
    public function destroy(Book $book) { $book->delete(); return redirect()->route('books.index')->with('success','Buku berhasil dihapus.'); }
}
