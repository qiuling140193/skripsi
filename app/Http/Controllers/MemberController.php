<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Redirect;
use PDF;

class MemberController extends Controller
{
   public function index()
   {
      return view('member.index'); 
   }

   public function listData()
   {
   
     $member = Member::orderBy('id_member', 'desc')->get();
     $no = 0;
     $data = array();
     foreach($member as $list){
       $no ++;
       $row = array();
       $row[] = $no;
       $row[] = $list->id_member;
       $row[] = $list->nama;
       $row[] = $list->alamat;
       $row[] = $list->telepon;
       $row[] = '<div class="btn-group">
               <a onclick="editForm('.$list->id_member.')" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
               <a onclick="deleteData('.$list->id_member.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
       $data[] = $row;
     }

     $output = array("data" => $data);
     return response()->json($output);
   }

   public function store(Request $request)
   {
      $member = new Member;
      $member->nama   = $request['nama'];
      $member->alamat = $request['alamat'];
      $member->telpon = $request['telpon'];
      $member->save();
       return Redirect::route('member.index');
   }

   public function edit($id)
   {
     $member = Member::find($id);
     echo json_encode($member);
   }

   public function update(Request $request, $id)
   {
      $member = Member::find($id);
      $member->nama = $request['nama'];
      $member->alamat = $request['alamat'];
      $member->telpon = $request['telpon'];
      $member->update();
   }

   public function destroy($id)
   {
      $member = Member::find($id);
      $member->delete();
   }

}
