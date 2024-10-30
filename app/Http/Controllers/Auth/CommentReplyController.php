<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CommentReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'comment_id' => 'required|exists:comments,id',
            'comment' => 'required|min:2|max:255',
        ]);
        if ($request->reply) {
            $request->validate([
                'reply' => 'required|exists:comment_replies,id',
            ]);
            CommentReply::create([
                'comment' => $request->comment,
                'user_id' => Auth::user()->id,
                'comment_id' => $request->comment_id,
                'parent_reply_id' => $request->reply,
            ]);
        } else {
            CommentReply::create([
                'comment' => $request->comment,
                'user_id' => Auth::user()->id,
                'comment_id' => $request->comment_id,
            ]);
        }
        return redirect()->back()->with('success', 'komentar balasan berhasil dikirim');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'content' => 'required|min:2|max:255',
        ]);
        $commentReply = CommentReply::findOrFail($id);
        $commentReply->update([
            'comment' => $request->content,
        ]);
        return redirect()->back()->with('success', 'komentar balasan berhasil diubah');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commentReply = CommentReply::findOrFail($id)->load('parentReply');
        if ($commentReply->parentReply->count() > 0) {
            return redirect()->back()->with('error', 'Upps, Comment balasan tidak dapat dihapus');
        }
        $commentReply->delete();
        return redirect()->back()->with('success', 'komentar balasan berhasil dihapus');
    }
}
