<?php

namespace Modules\Ladmin\Http\Controllers;

use Ladmin\Engine\Helpers\ReadLog;
use Illuminate\Http\Request;
use Modules\Ladmin\Http\Controllers\Controller;

class SystemLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ladmin()->allows('system.log.index');

        $data['files'] = (new ReadLog)->get_files();
        $data['file'] = request()->get('log', (new ReadLog)->default_file());
        $data['logs'] = (new ReadLog)->json($data['file']);

        return ladmin()->view('logs.index', $data);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($file)
    {

        ladmin()->allows(['system.log.destroy']);

        $existsFile = storage_path('logs/' . $file);

        $message = $file . ' file not exists';
        if (file_exists($existsFile)) {
            if (unlink($existsFile)) {
                $message = $file . ' file has been deleted!';
            }
        }

        session()->flash('warning', $message);

        return redirect()->route('ladmin.systemlog.index');
    }
}
