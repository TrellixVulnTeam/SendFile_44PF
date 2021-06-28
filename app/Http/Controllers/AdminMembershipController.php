<?php

namespace App\Http\Controllers;

use App\Models\Membercategory;
use App\Models\Membership;
use Illuminate\Http\Request;

class AdminMembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memberships = Membership::all();
        $active = 'membership';
        return view('admin.membership.index', compact('memberships', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = Membercategory::all();
        $active = 'membership';
        return view('admin.membership.create', compact('allCategories', 'active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    public function addMembership(Request $request)
    {
        try {
            $request->validate([
                'amount' => 'required',
                'month' => 'required',
                'category_id' => 'required'
            ]);

            $membership = null;

            if(isset($request->id)) {
                $membership = Membership::find($request->id);
            } else {
                $membership = new Membership();
            }

            $membership->amount = $request->amount;
            $membership->month = $request->month;
            $membership->category_id = $request->category_id;
            $membership->service_type = $request->service_type;
            $membership->googleplay_url = $request->googleplay_url;
            $membership->appstore_url = $request->appstore_url;

            if(!$request->features || count($request->features) == 0) {
                $membership->features = "";
            } else {
                $membership->features = json_encode($request->features);
            }
            $membership->save();

            return redirect('admin/membership')->with("success", "You create membership successfully");

        } catch (\Exception $e) {

            return redirect()->back()->with("failure", $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $active = 'membership';
        $membership = Membership::find($id);
        $allCategories = Membercategory::all();
        return view('admin.membership.edit', compact('membership', 'allCategories', 'active'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function deleteMembership(Request $request) {

        try {
            $membership = Membership::find($request->id);
            if(!$membership) {
                return redirect()->back()->withErrors("Cannot find membership");
            }

            $membership->delete();
            return redirect('admin/membership')->with('success', 'Delete membership');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }

    }
}
