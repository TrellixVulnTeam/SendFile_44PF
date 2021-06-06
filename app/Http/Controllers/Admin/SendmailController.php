<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mailercategory;
use App\Models\Message;
use App\Models\User;
use App\Models\Usermail;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
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
        $allMessages = Message::orderBy("created_at", "desc")->paginate(10);
        $allMailers = Usermail::all();
        $mailerCategories = Mailercategory::all();
        return view('admin.mailinfo.index', compact('active', 'allMailers', 'allMessages', 'mailerCategories'));
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

                $categoryId = $emapData[5] ? $emapData[5] : 3 ;
                $sameCount = Usermail::where("category_id", $categoryId)->where('email', $emapData[0])->count();

                if($sameCount > 0) {
                    continue ;
                }

                $mailer = new Usermail();
                $mailer->email = $emapData[0];
                $mailer->firstName = $emapData[1] ? $emapData[1] : "";
                $mailer->lastName = $emapData[2] ? $emapData[2] : "";
                $mailer->birth = $emapData[3] ? $emapData[3] : "";
                $mailer->contactNumber = $emapData[4] ? $emapData[4] : "";
                $mailer->category_id = $categoryId;
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
        $allCategories = Mailercategory::where("id", "<>", 2)->get();
        return view('admin.mailinfo.edit', compact('active', 'mailer', 'allCategories'));
    }

    public function updateMailer(Request $request) {

        $needFields = [
            'email' => "required",
            'category_id' => "required"
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

        $oldMailer = Usermail::find($request->mailer_id);

        $flag = false;

        if($oldMailer->email != $request->email || $oldMailer->category_id != $request->category_id) {
            $flag = true;
        }
        $sameMailerCount = Usermail::where('email', $request->email)->where('category_id', $request->category_id)->count();

        if($sameMailerCount > 0 && $flag) {
            return redirect()->route('mailinfo.index')->with('failure', "Mailer who is same email and category is unique.");
        }

        if (Usermail::where('id', $request->mailer_id)->update($validated)) {
            return redirect()->route('mailinfo.index')->with('success', "Updated user mail infor successfully.");
        } else {
            return redirect()->route('mailinfo.index')->with('failure', "Failed to update user mail infor.");
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

        $mailerCategories = Mailercategory::all();
        $defaultCategoryId = Mailercategory::first()->id;

        if($request->category_id) {
            $defaultCategoryId = $request->category_id;
        }

        $active = 'mailinfo';
        $allMailers = null;

        if($defaultCategoryId == 2) {
            $allMailers = User::where('role_id', '<>', 0)->where('membership_id', '<>', 0)->where('is_membership', '<>', 0)->pluck('email')->toArray();
        }
        else {
            $allMailers = Usermail::where('category_id', $defaultCategoryId)->pluck('email')->toArray();
        }

        return view('admin.mailinfo.sender', compact('active', 'allMailers', 'mailerCategories', 'defaultCategoryId'));
    }

    public function storeMessage(Request $request) {

        try {

            $contents = $request->contents;

            $multiEmails = $request->emailList;

            $multiEmails = array_filter($multiEmails, 'strlen');

            $mailerLists = array_values($multiEmails);

            Mail::send('emails.mailer', ['contents' => $contents], function($message) use ($mailerLists)
            {
                $message->from($this->admin_email)->to($mailerLists)->subject('SelecitiveTrades');
            });

            $notRecipients = Mail::failures();

            $notRecipientsHtml = "<p class='color:red'>" . json_encode($notRecipients) . "</p>";

            $contents .= $notRecipientsHtml;

            $newMessage = new Message();
            $newMessage->fromEmail = $this->admin_email;
            $newMessage->toEmail = json_encode($mailerLists);
            $newMessage->contents = $contents;
            $newMessage->subject = $request->subject;
            $newMessage->save();

            return redirect()->route('mailinfo.send-message')->with('success', "Bulk Mail success");

        } catch (\Exception $e) {

            return redirect()->back()->with('failure', $e->getMessage());
        }
    }

    public function showMessage(Request $request) {

        $message_id = $request->message_id;
        $message = Message::find($message_id);
        $active = 'mailinfo';
        return view('admin.mailinfo.message', compact('active' , 'message'));
    }

    public function createCategory() {
        $active = 'mailinfo';
        return view('admin.mailinfo.createCategory', compact('active' ));
    }

    public function getCategory(Request $request) {

        $active = 'mailinfo';
        $id = $request->category_id;
        $category = Mailercategory::find($id);
        return view('admin.mailinfo.editCategory', compact('active', 'category'));
    }

    public function storeCategory(Request $request) {
        $needFields = [
            'title' => "required|unique:mailer_categories"
        ];

        $validated = $request->validate($needFields);

        if (Mailercategory::create($validated)) {
            return redirect()->route('mailinfo.index')->with('success', "Created new category successfully.");
        } else {
            return redirect()->route('mailinfo.index')->with('failure', "Failed to create new category.");
        }
    }

    public function updateCategory(Request $request) {

        $needFields = [
            'title' => "required"
        ];

        $validated = $request->validate($needFields);

        if (Mailercategory::where('id', $request->category_id)->update($validated)) {
            return redirect()->route('mailinfo.index')->with('success', "Updated category successfully.");
        } else {
            return redirect()->route('mailinfo.index')->with('failure', "Failed to update category.");
        }
    }

    public function deleteCategory(Request $request) {
        try {
            $id = $request->category_id;
            $item = Mailercategory::find($id);
            $item->delete();
            return redirect()->route('mailinfo.index')->with('success', "Deleted category successfully.");
        } catch (\Exception $e) {
            return redirect()->route('mailinfo.index')->with('failure', $e->getMessage());
        }
    }
}
