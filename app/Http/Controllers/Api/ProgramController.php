<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $data = Program::all();

        return response([
            'status' => '200',
            'message' => 'Successfully fetch program data',
            'data' => $data
        ]);
    }

    public function guestIndex()
    {
        $data = Program::all();

        return response([
            'status' => '200',
            'message' => 'Successfully fetch program data guest',
            'data' => $data
        ]);
    }
}
