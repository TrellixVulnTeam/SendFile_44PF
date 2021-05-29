<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Usermail;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use SimpleXLSX;

class SendmailController extends Controller
{
    protected $admin_email = 'support@selectivetrades.com';
    protected $mailer;
    protected $toEmail = "";

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function index(Request $request) {

        $active = 'mailinfo';
        $allMessages = Message::orderBy("created", "desc")->paginate(10);
        $allMailers = Usermail::all();
        return view('admin.mailinfo.index', compact('active', 'allMailers', 'allMessages'));
    }

    public function createMailer(Request $request) {

        $active = 'mailinfo';
        return view('admin.mailinfo.create', compact('active'));
    }

    public function storeMailer(Request $request) {

        $needFields = [
            'email' => "required|unique:mailers"
        ];

        $validated = $request->validate($needFields);

        if($request->firstName) {
            $validated['firstName'] = $request->firstName;
        }

        if($request->lastName) {
            $validated['lastName'] = $request->lastName;
        }

        if($request->birth) {
            $validated['birth'] = $request->birth;
        }

        if($request->contactNumber) {
            $validated['contactNumber'] = $request->contactNumber;
        }

        if (Usermail::create($validated)) {
            return redirect()->route('mailinfo.index')->with('success', "Created new user mail infor successfully.");
        } else {
            return redirect()->route('mailinfo.index')->with('failure', "Failed to create new user mail infor.");
        }
    }

    public function bulkMailer(Request $request) {

        if(!file_exists($request->file('importFile'))) {
            return redirect()->back()->with("failure", "Not selected file.");
        }

        $realFile = $request->file('importFile');
        $extension = $realFile->getClientOriginalExtension();

        if($extension != 'xlsx' && $extension != 'csv') {
            return redirect()->back()->with("failure", "Not selected file.");
        }

        $destinationPath = 'upload/mail';
        $fileName = date("YmdHis").".".$extension;

        $realFile->move($destinationPath,$fileName);
        $filePath = $destinationPath . '/' . $fileName;
        $message = "Not found file.";
        $counter = 0;

        if ( $xlsx = SimpleXLSX::parse($filePath) ) {
            foreach($xlsx->rows() as $emapData) {
                $counter++;
                if($counter == 1 || !$emapData[0]) {
                    continue ;
                }

                $counter = Usermail::where('email', $emapData[0])->count();

                if($counter > 0) {
                    continue ;
                }

                $mailer = new Usermail();
                $mailer->email = $emapData[0];
                $mailer->firstName = $emapData[1] ? $emapData[1] : "";
                $mailer->lastName = $emapData[2] ? $emapData[2] : "";
                $mailer->birth = $emapData[3] ? $emapData[3] : "";
                $mailer->contactNumber = $emapData[4] ? $emapData[4] : "";
                $mailer->save();
            }
            $message = "Upload mails via bulk successfully.";
        } else {
            $message = SimpleXLSX::parseError();
        }

        return redirect()->back()->with("success", $message);
    }

    public function getMailer(Request $request) {
        $active = 'mailinfo';
        $mailer = Usermail::find($request->mailer_id);
        return view('admin.mailinfo.edit', compact('active', 'mailer'));
    }

    public function updateMailer(Request $request) {
        $active = 'mailinfo';

        $needFields = [
            'email' => "required"
        ];

        $validated = $request->validate($needFields);

        if($request->firstName) {
            $validated['firstName'] = $request->firstName;
        }

        if($request->lastName) {
            $validated['lastName'] = $request->lastName;
        }

        if($request->birth) {
            $validated['birth'] = $request->birth;
        }

        if($request->contactNumber) {
            $validated['contactNumber'] = $request->contactNumber;
        }

        if (Usermail::where('id', $request->mailer_id)->update($validated)) {
            return redirect()->route('mailinfo.index')->with('success', "Created new user mail infor successfully.");
        } else {
            return redirect()->route('mailinfo.index')->with('failure', "Failed to create new user mail infor.");
        }
    }

    public function deleteMailer(Request $request) {

        try {
            $id = $request->mailer_id;
            $item = Usermail::find($id);
            $item->delete();
            return redirect()->route('mailinfo.index')->with('success', "Deleted user mail info successfully.");
        } catch (\Exception $e) {
            return redirect()->route('mailinfo.index')->with('failure', $e->getMessage());
        }
    }

    public function sendMessage(Request $request) {
        $active = 'mailinfo';
        $allMailers = Usermail::all();
        return view('admin.mailinfo.sender', compact('active', 'allMailers'));
    }

    public function storeMessage(Request $request) {

        $active = 'mailinfo';

        try {

            $this->toEmail = $request->email;
            $contents = $request->contents;
            $filePath = "";

            $this->mailer->send('emails.lead', ['contents'=>$contents], function (Message $m){
                $m->from($this->admin_email)->to($this->toEmail)->subject('SelectiveTrades');
            });

            return redirect()->back()->with('success', 'Sent mail successfully.');

        } catch (\Exception $e) {

            return redirect()->back()->with('failure', "Did't send mail.");
        }
    }

    public function getMessage(Request $request) {
        $active = 'mailinfo';
        return view('admin.mailinfo.index', compact('active' ));
    }
}
