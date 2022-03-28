<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDatabaseBackupRequest;
use App\Http\Requests\UpdateDatabaseBackupRequest;
use App\Models\DatabaseBackup;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;

class DatabaseBackupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $backups = DatabaseBackup::latest()->get();

        return view('admin.pages.database.database-backup', compact('backups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDatabaseBackupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Artisan::call('database:backup');

        return back();
    }

    public function storeBackup($name,$path){

        DatabaseBackup::create([
            'name' => $name,
            'file_path' => $path,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DatabaseBackup  $databaseBackup
     * @return \Illuminate\Http\Response
     */
    public function show(DatabaseBackup $databaseBackup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DatabaseBackup  $databaseBackup
     * @return \Illuminate\Http\Response
     */
    public function edit(DatabaseBackup $databaseBackup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDatabaseBackupRequest  $request
     * @param  \App\Models\DatabaseBackup  $databaseBackup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDatabaseBackupRequest $request, DatabaseBackup $databaseBackup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DatabaseBackup  $databaseBackup
     * @return \Illuminate\Http\Response
     */
    public function destroy(DatabaseBackup $databaseBackup)
    {
        //
    }
}
