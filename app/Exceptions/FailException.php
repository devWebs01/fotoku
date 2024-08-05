<?php

namespace App\Exceptions;

use Exception;
use RealRashid\SweetAlert\Facades\Alert;

class FailException extends Exception
{
    public function report()
    {
        \Log::debug($this->getMessage());
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        if (\Request::ajax()) {
            return response()->json(['success' => false, 'messages' => $this->getMessage()], 403);
        }
        Alert::error('Pemberitahuan', $this->getMessage())->toToast()->toHtml();

        return back();
    }
}
