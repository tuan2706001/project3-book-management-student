<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookSub;
use App\Models\StatusRegisterBooks;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $idStudent = $request->session()->get('stu_id');
        // $idBookStudent = DB::table('booksubscription')->select(DB::raw('book_id as bookid'))->where('stu_id', '=', $idStudent)->get();
        $search = $request->get('search');
        $books = DB::table('books')->join('subject', 'subject.sub_id', '=', 'books.sub_id')
            ->leftjoin('booksubscription', 'booksubscription.bookid', '=', 'books.book_id')
            ->join('subjectinfo', 'subjectinfo.sub_id', '=', 'subject.sub_id')
            ->join('major', 'major.ma_id', '=', 'subjectinfo.ma_id')
            ->join('course', 'course.ma_id', '=', 'major.ma_id')
            ->join('classes', 'course.co_id', '=', 'classes.co_id')
            ->join('students', 'classes.cl_id', '=', 'students.cl_id')
            ->select('books.*', 'subject.sub_name', 'booksubscription.bookid')
            ->where('students.stu_id', '=', $idStudent)
            ->where('book_title', 'like', "%$search%")->orderBy('book_id', 'asc')->paginate(3);
        //SELECT books.book_title,subject.sub_name FROM books
        //JOIN subject ON books.sub_id = subject.sub_id 
        //JOIN subjectinfo ON subjectinfo.sub_id = subject.sub_id 
        //JOIN major ON subjectinfo.ma_id = major.ma_id 
        //JOIN course ON course.ma_id = major.ma_id 
        //JOIN classes ON classes.co_id = course.co_id 
        //JOIN students on students.cl_id = classes.cl_id WHERE students.stu_id = 1;
        // $books = Book::join()
        //     ->where('book_title', 'like', "%$search%")->orderBy('book_id', 'asc')->paginate(3);

        // return $idBookStudent . $idStudent;

        // $array_book[] = new StatusRegisterBooks();
        // $array_book[0]->idBook = 12;
        // $array_book[0]->nameBooks = 'abc';
        // $array_book[0]->nameSubject = 'php';
        // $array_book[0]->status = 1;
        //  $array_book[0] =
        // [
        //     "idBook" => 12,
        //     "nameBooks" => "ABC",
        //     "nameSubject" => "php",
        //     "status" => 1  
        // ];




        // foreach ($idBookStudent as $idbooks => $item) {
        //     $flag = true;
        //     foreach ($id as $idd => $value) {

        //         if ($item == $value) {
        //             $flag;
        //             break;
        //         }
        //     }
        //     if ($item != $value) {
        //         $flag = false;
        //     }
        // }
        // $flag1 = json_decode(json_encode($flag), false);



        return view('home.index', [
            "books" => $books,
            "search" => $search,

        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $idStudent = $request->session()->get('stu_id');
        $idBook = $request->get("idBook");

        $subBook = new BookSub();

        $subBook->bookid = $idBook;
        $subBook->stu_id = $idStudent;
        $subBook->status = 0;
        $subBook->save();
        $flag = "hai";
        return Redirect::route("home.index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
